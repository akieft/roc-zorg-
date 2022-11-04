<?php

namespace App\Http\Controllers;

use App\Models\CoreTask;
use App\Models\CoreWorkProcess;
use App\Models\User;
use App\Models\UserWorkProcess;
use App\Models\WorkProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentWorkProcessOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;
        // Make $finals an array
        $finals = [];
        // When logged in as student this function works
        if(Auth::user()->hasRole('student')) {
            $coreworkprocesses = CoreWorkProcess::where('core_task_id', $id)->get('work_process_id');
            $userworkprocesses = UserWorkProcess::whereIn('work_process_id', $coreworkprocesses)->where('user_id', Auth::id())->get();
            // For each loop
            foreach($userworkprocesses as $key => $userworkproces) {
                $workprocess = WorkProcess::where('id', $userworkproces->work_process_id)->first();
                $user = User::where('id', $userworkproces->user_id)->first();
                $coretask = CoreTask::where('id', $workprocess->core_task_id)->first();
                $finals[$key]['work_process_id']=$workprocess->id;
                $finals[$key]['work_process_title']=$workprocess->title;
                $finals[$key]['work_process_description']=$workprocess->description;
                $finals[$key]['user_id']=$user->id;
                $finals[$key]['first_name']=$user->first_name;
                $finals[$key]['last_name']=$user->last_name;
                $finals[$key]['core_task_id']=$coretask->core_task_id;
                $finals[$key]['core_task_title']=$coretask->title;
                $finals[$key]['done']=$userworkproces->done;
                $finals[$key]['id']=$userworkproces->id;
            }
            return view('studentworkprocessoverview', compact('userworkprocesses', 'finals', 'id'));
        } else {
            return redirect('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

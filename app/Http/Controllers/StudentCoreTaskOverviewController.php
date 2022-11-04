<?php

namespace App\Http\Controllers;

use App\Models\CoreTask;
use App\Models\User;
use App\Models\UserCoreTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentCoreTaskOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Make $finals an array
        $finals = [];
        // When logged in as student this function works
        if(Auth::user()->hasRole('student')) {
            // Grab all UserCoreTask
            $usercoretasks = UserCoreTask::where('user_id', Auth::id())->get();
            // For each loop
            foreach($usercoretasks as $key => $usercoretask) {
                $coretask = CoreTask::where('id', $usercoretask->core_task_id)->first();
                $user = User::where('id', $usercoretask->user_id)->first();
                $finals[$key]['core_task_id']=$coretask->id;
                $finals[$key]['title']=$coretask->title;
                $finals[$key]['description']=$coretask->description;
                $finals[$key]['user_id']=$user->id;
                $finals[$key]['first_name']=$user->first_name;
                $finals[$key]['last_name']=$user->last_name;
                $finals[$key]['user_core_task_id']=$usercoretask->id;
                $finals[$key]['done']=$usercoretask->done;
            }
            return view('studentcoretaskoverview', compact('usercoretasks', 'finals'));
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

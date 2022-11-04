<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\User;
use App\Models\UserCompetence;
use App\Models\UserWorkProcess;
use App\Models\WorkCompetence;
use App\Models\WorkProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompetenceOverviewController extends Controller
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
        // When logged in as teacher|admin this function works
        if(Auth::user()->hasRole('teacher|admin')) {
            $workcompetenceses = WorkCompetence::where('work_process_id', $id)->get('competence_id');
            $usercompetences = UserCompetence::whereIn('competence_id', $workcompetenceses)->get();
            // Fill array with required data
            foreach($usercompetences as $key => $usercompetence) {
                $competence = Competence::where('id', $usercompetence->competence_id)->first();
                $user = User::where('id', $usercompetence->user_id)->first();
                $workprocess = WorkProcess::where('id', $competence->work_process_id)->first();
                $finals[$key]['competence_id']=$competence->id;
                $finals[$key]['competence_title']=$competence->title;
                $finals[$key]['user_id']=$user->id;
                $finals[$key]['first_name']=$user->first_name;
                $finals[$key]['last_name']=$user->last_name;
                $finals[$key]['work_process_id']=$workprocess->id;
                $finals[$key]['work_process_title']=$workprocess->title;
                $finals[$key]['done']=$usercompetence->done;
            }
            return view('competenceoverview', compact('usercompetences', 'finals', 'id'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function done(Request $request)
    {
        // Function for changing boolean to true
        $id = $request->id;
        $pageid = $request->pageid;
        $usercompetence = UserCompetence::find($id);
        $usercompetence->done = 1;
        $usercompetence->save();
        return redirect()->route('competenceoverview', $pageid);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function undone(Request $request)
    {
        // Function for changing boolean to false
        $id = $request->id;
        $pageid = $request->pageid;
        $usercompetence = UserCompetence::find($id);
        $usercompetence->done = 0;
        $usercompetence->save();
        return redirect()->route('competenceoverview', $pageid);
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

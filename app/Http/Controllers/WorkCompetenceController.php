<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\WorkCompetence;
use App\Models\WorkProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkCompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // When logged in as teacher|admin this function works
        if(Auth::user()->hasRole('teacher|admin')) {
        // Grab all WorkProcess
        $workprocess = WorkProcess::all();
        // Grab all Competence
        $competences = Competence::all();
        return view('workcompetence', compact('workprocess','competences'));
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
        // When logged in as teacher|admin this function works
        if (Auth::user()->hasRole('teacher|admin')) {
        $workcompetence = new WorkCompetence();
        $workcompetence->work_process_id = $request->work_process_id;
        $workcompetence->competence_id = $request->competence_id;
        $workcompetence->save();
        return redirect('workcompetence');
        } else {
            return redirect('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkCompetence  $workCompetence
     * @return \Illuminate\Http\Response
     */
    public function show(WorkCompetence $workCompetence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkCompetence  $workCompetence
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkCompetence $workCompetence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkCompetence  $workCompetence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkCompetence $workCompetence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkCompetence  $workCompetence
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkCompetence $workCompetence)
    {
        //
    }
}

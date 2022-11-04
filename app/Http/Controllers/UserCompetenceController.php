<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\UserCompetence;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class UserCompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('teacher|admin')){
            // Grab all Competences
            $usercompetences = Competence::all();
            // All user id's from students
            $studentid = array();
            $users = User::all();
            foreach ($users as $user) {
                if($user->hasRole('student')) {
                    array_push($studentid, $user->id);
                } else {}
            }
            // Get info from students
            $students = User::whereIn('id', $studentid)->get();
            return view('usercompetence', compact('usercompetences', 'students'));
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
        // When logged in as teacher|admin this function works
        if(Auth::user()->hasRole('teacher|admin')) {
            $usercompetence = new UserCompetence();
            $usercompetence->user_id = $request->user_id;
            $usercompetence->competence_id = $request->competence_id;
            $usercompetence->done = 0;
            $usercompetence->save();
            return redirect('usercompetence');
        } else {
            return redirect('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCompetence  $userCompetence
     * @return \Illuminate\Http\Response
     */
    public function show(UserCompetence $userCompetence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCompetence  $userCompetence
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCompetence $userCompetence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCompetence  $userCompetence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCompetence $userCompetence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCompetence  $userCompetence
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCompetence $userCompetence)
    {
        //
    }
}

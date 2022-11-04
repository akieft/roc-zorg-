<?php

namespace App\Http\Controllers;

use App\Models\UserWorkProcess;
use App\Models\WorkProcess;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class UserWorkProcessController extends Controller
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
            // Grab all WorkProcesses
            $workprocesses = WorkProcess::all();
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
            return view('userworkproces', compact('workprocesses', 'students'));
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
            $userworkproces = new UserWorkProcess();
            $userworkproces->user_id = $request->user_id;
            $userworkproces->work_process_id = $request->work_process_id;
            $userworkproces->done = 0;
            $userworkproces->save();
            return redirect('userworkproces');
        } else {
            return redirect('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserWorkProcess  $userWorkProcess
     * @return \Illuminate\Http\Response
     */
    public function show(UserWorkProcess $userWorkProcess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserWorkProcess  $userWorkProcess
     * @return \Illuminate\Http\Response
     */
    public function edit(UserWorkProcess $userWorkProcess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserWorkProcess  $userWorkProcess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserWorkProcess $userWorkProcess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserWorkProcess  $userWorkProcess
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserWorkProcess $userWorkProcess)
    {
        //
    }
}

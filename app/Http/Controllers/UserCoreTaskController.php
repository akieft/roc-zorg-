<?php

namespace App\Http\Controllers;

use App\Models\CoreTask;
use App\Models\User;
use App\Models\UserCoreTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class UserCoreTaskController extends Controller
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
            // Grab all CoreTasks
            $coretasks = CoreTask::all();
            // All user id's from students
            $studentsid = array();
            $users = User::all();
            foreach ($users as $user){
                if($user->hasRole('student')){
                    array_push($studentsid, $user->id);
                } else {}
            }
            // Get info from students
            $students = User::whereIn('id', $studentsid)->get();
            return view('usercoretask', compact('coretasks', 'students'));
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
            $usercoretask = new UserCoreTask();
            $usercoretask->user_id = $request->user_id;
            $usercoretask->core_task_id = $request->core_task_id;
            $usercoretask->done = 0;
            $usercoretask->save();
            return redirect('usercoretask');
        } else {
            return redirect('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCoreTask  $userCoreTask
     * @return \Illuminate\Http\Response
     */
    public function show(UserCoreTask $userCoreTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCoreTask  $userCoreTask
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCoreTask $userCoreTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCoreTask  $userCoreTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCoreTask $userCoreTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCoreTask  $userCoreTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCoreTask $userCoreTask)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CoreTask;
use App\Models\CoreWorkProcess;
use App\Models\WorkProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoreWorkProcessController extends Controller
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
        $workprocess = WorkProcess::all();
        $coretasks = CoreTask::all();
            return view('coreworkprocess', compact('workprocess', 'coretasks'));
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
        if (Auth::user()->hasRole('teacher|admin')) {
        $coreworkprocess = new CoreWorkProcess();
        $coreworkprocess->core_task_id = $request->core_task_id;
        $coreworkprocess->work_process_id = $request->work_process_id;
        $coreworkprocess->save();
        return redirect('coreworkprocess');
        } else {
            return redirect('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoreWorkProcess  $coreWorkProcess
     * @return \Illuminate\Http\Response
     */
    public function show(CoreWorkProcess $coreWorkProcess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoreWorkProcess  $coreWorkProcess
     * @return \Illuminate\Http\Response
     */
    public function edit(CoreWorkProcess $coreWorkProcess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoreWorkProcess  $coreWorkProcess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoreWorkProcess $coreWorkProcess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoreWorkProcess  $coreWorkProcess
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoreWorkProcess $coreWorkProcess)
    {
        //
    }
}

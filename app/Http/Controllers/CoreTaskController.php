<?php

namespace App\Http\Controllers;

use App\Models\CoreTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoreTaskController extends Controller
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
            return view('coretask');
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
        // Store information in table
        $coretask = new CoreTask;
        $coretask->title = $request->title;
        $coretask->description = $request->description;
        $coretask->save();
            return redirect('coretask');
        } else {
            return redirect('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoreTask  $coreTask
     * @return \Illuminate\Http\Response
     */
    public function show(CoreTask $coreTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoreTask  $coreTask
     * @return \Illuminate\Http\Response
     */
    public function edit(CoreTask $coreTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoreTask  $coreTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoreTask $coreTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoreTask  $coreTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoreTask $coreTask)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsOverviewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

//This will display / load all users from the database into the studentsOverview page
    public function index()
    {
        if(Auth::check()) {
            $users = User::all();
            $companies = Internship::where('company_id', Auth::id())->where('coach_permission', 1)->get('student_id');
            $students = User::whereIn('id', $companies)->get();
            return view('studentenoverzicht', compact('users', 'students'));
        } else {
            return redirect('home');
        }
    }
}



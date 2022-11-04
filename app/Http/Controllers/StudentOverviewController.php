<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentOverviewController extends Controller
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

    public function index()
    {
        return redirect('/home');
    }

//This displays / loads the data of the selected user / student from the database into the studentOverview page
    public function detail(Request $request)
    {
        if(Auth::check()) {
            $student = $request->student;
            $users = User::where('id', $student)->first();

            return view('studentoverzicht', compact('users'));
        } else {
            return redirect('home');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Internship;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesOverviewController extends Controller
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

//This will display / load all users from the database into the companiesOverview page
    public function index()
    {
        if(Auth::check()) {
            $companyids = array();
            $users = User::all();
            foreach ($users as $user) {
                if ($user->hasRole('company')) {
                    array_push($companyids, $user->id);
                } else {
                }
            }
            //Get info from companies
            $companies = User::whereIn('id', $companyids)->get();
            return view('companiesoverview', compact('companies'));
        } else {
            return redirect('home');
        }
    }

    public function store(Request $request)
    {
        //In $coach we use the student id to get the coach id
        $coach = Coach::where('student_id', Auth::id())->first();
        //In $student_name put the first name of current user
        $student_name = Auth::user()->first_name;
        //In $company_name we put the name of the company
        $company_name = User::where('id', $request->companyid)->first();
        //In $coach_name we put the first name of the students coach
        $coach_name = User::where('id', $coach->docent_id)->first();
        $internship = new Internship;
        $internship->student_id = Auth::id();
        $internship->student_name = $student_name;
        $internship->company_id = $request->companyid;
        $internship->company_name = $company_name->name_company;
        $internship->coach_id = $coach->docent_id;
        $internship->coach_name = $coach_name->first_name;
        $internship->coach_permission = 0;
        $internship->save();
        return redirect('companiesoverview');
    }
}

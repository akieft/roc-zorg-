<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyOverviewController extends Controller
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

//This displays / loads the data of the selected user / company from the database into the companyOverview page
    public function detail(Request $request)
    {
        if(Auth::check()) {
            $company = $request->company;
            $users = User::where('id', $company)->first();

            return view('companyoverview', compact('users'));
        } else {
            return redirect('home');
        }
    }
}

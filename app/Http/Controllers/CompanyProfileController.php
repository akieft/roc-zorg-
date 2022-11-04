<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Illuminate\Support\Facades\Auth;

class CompanyProfileController extends Controller
{
//This allows only a user with role company to get to companyprofile if not it wil return view home.
    public function index() {
        if(Auth::user()->hasRole('company')){
            $roles = Role::all();
            return view('companyprofile', compact('roles'));
        } else {
            return redirect('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileCompany $profilecompany
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileCompany $profilecompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileCompany $profilecompany
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileCompany $profilecompany)
    {
        //
    }

    /**
     * Inserts the given data into the form with data from database and gives the
     * possibility to update/edit the data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileCompany $profilecompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::id());
        $user->phone = $request->phone;
        $user->name_company = $request->name_company;
        $user->type_company = $request->type_company;
        $user->save();
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileCompany $profilecompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileCompany $profilecompany)
    {
        //
    }
}

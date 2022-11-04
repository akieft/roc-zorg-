<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Illuminate\Support\Facades\Auth;

class CompanyRegisterController extends Controller
{
//This allows you to get to register only if you have the role company
    public function index() {
        if(Auth::user()->hasRole('teacher')){
            $roles = Role::all();
            return view('companyregister', compact('roles'));
        } else {
            return redirect('home');
        }
    }
//This gives the company the possibility to register so that the given info is saved in the database
    public function store(Request $request) {
            $companyRole = Role::where('slug', 'company')->first();
            $user = new User;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->name_company = $request->name_company;
            $user->address_company = $request->address_company;
            $user->type_company = $request->type_company;
            $user->password = Hash::make($request->password);
            $user->save();
            // Attach role to user
            $user->attachRole($companyRole);
            return redirect('companyregister');
    }
}

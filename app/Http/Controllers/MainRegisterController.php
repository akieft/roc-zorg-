<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Illuminate\Support\Facades\Auth;

class MainRegisterController extends Controller
{
//This only allows you to get to register only if you are an admin
    public function index() {
        if(Auth::user()->hasRole('admin')){
            $roles = Role::all();
            return view('auth/register', compact('roles'));
        } else {
            return redirect('home');
        }
    }
//This specifies which data has to be entered if an admin wants to register a specific person which can give you a role(teacher, student, company, admin)
    public function store(Request $request) {
        $role = $request->role;
        if($role == 'teacher') {
            $teacherRole = Role::where('slug', 'teacher')->first();
            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->study = $request->study;
            $user->phone = $request->phone;
            $user->teacher_function = $request->teacher_function;
            $user->teacher_availability = $request->teacher_availability;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->attachRole($teacherRole);
            return redirect('register');}
        elseif($role == 'company'){
            $companyRole = Role::where('slug', 'company')->first();
            $user = new User;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->name_company = $request->name_company;
            $user->address_company = $request->address_company;
            $user->type_company = $request->type_company;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->attachRole($companyRole);
            return redirect('register');}
        elseif($role == 'student'){
            $studentRole = Role::where('slug', 'student')->first();
            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->study = $request->study;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->attachRole($studentRole);
            return redirect('register');}
        elseif($role == 'admin'){
            $adminRole = Role::where('slug', 'admin')->first();
            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->attachRole($adminRole);
            return redirect('register');}
    }
}

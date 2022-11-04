<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Illuminate\Support\Facades\Auth;

class TeacherRegisterController extends Controller
{
//This allows you to get to register only if you are a teacher
    public function index() {
        if(Auth::user()->hasRole('teacher')){
            $roles = Role::all();
            return view('docentregister', compact('roles'));
        } else {
            return redirect('home');
        }
    }
//This allows a teacher to register a student and save the information in the database
    public function store(Request $request) {
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
    }
}

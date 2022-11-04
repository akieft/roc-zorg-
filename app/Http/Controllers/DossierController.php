<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class DossierController extends Controller
{
    /**
     * Checkt if user is logged in
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $id = Auth::id();
            $dossier = Dossier::where('student_id', $id)->first();
            return view('dossier', compact('dossier','user'));
        } else {
            return redirect('home');
        }
    }

    /**
     * Live updates the grade list.
     */
    public function update(Request $request)
    {
        $kd = Dossier::find($request->dossier);
        $kd->test_dutch = $request->dutch;
        $kd->test_care = $request->care;
        $kd->test_essay = $request->essay;
        $kd->test_math = $request->math;
        $kd->save();

        return redirect('dossier');
    }
}

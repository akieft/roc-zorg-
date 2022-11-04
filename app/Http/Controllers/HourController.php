<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Hour;

class HourController extends Controller
{

    /**
     * select first user from database with the user hour information from the database
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function index()
    {
        if (Auth::check()) {
            $user = Auth::id();
            $current = Auth::user();
            $hours = Hour::where('student_id', $user)->get()->sortBy('calendar');
            $totalPresent = 0;
            $totalAbsent = 0;
            $totalSick = 0;
            $totalSchool = 0;
            foreach ($hours as $key => $score) {
                $totalPresent = $totalPresent + $score->present;
                $totalAbsent = $totalAbsent + $score->absent;
                $totalSick = $totalSick + $score->sick;
                $totalSchool = $totalSchool + $score->school;
            }
            return view('hour', compact('hours', 'user', 'current', 'totalPresent', 'totalAbsent', 'totalSick', 'totalSchool'));
        } else {
            return redirect('home');
        }
    }


    /**
     * get everything from a form and insert it into the database
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function insert(Request $request)
    {
        if (Hour::where('calendar', $request->calendar)->where('student_id', Auth::id())->count() > 0)
        {
            // update calendar if the data of the calendar already exist from the current user. Get id what is given
            $hour = Hour::where('calendar', $request->calendar)->where('student_id', Auth::id())->first('id');
        } //insert data if there is no data yet from the current user.
        elseif (Hour::where('calendar', $request->calendar)->where('student_id', Auth::id())->count() == 0) {
            $hour = new Hour;
        }

        $hour->calendar = $request->calendar;
        $hour->present = $request->present;
        $hour->absent = $request->absent;
        $hour->sick = $request->sick;
        $hour->school = $request->school;
        $hour->student_id = Auth::id();
        $hour->save();
        return redirect('/hour');
        }
}




<?php

namespace App\Http\Controllers;

use App\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
        $user = Auth::user(); //Authenticated User
        $goals = Goal::where('user_id', $user->id)->with('user')->paginate(5); //Goals from the Auth User, and paginated 10 by 10
        //Add supposed and diference to every Goal on the list
        $goals = $this->calculateValues($goals);
        return view('home', ['goals' => $goals]);
    }

    /**
     * Add sapaces of Supposed and Difference to the Goals, calculating the amount of days and getting the difference betewwn the values
     */
    private function calculateValues(Object $goals)
    {
        foreach ($goals as $goal) {
            //Get the amount of days between the created goal and the current day
            $days = date_diff($goal->created_at, now())->days;
            //Calculate and save the supposed value til the day
            $supposed = (int) ($days + 1) * $goal->daily_pay;
            $goal->supposed = $supposed;

            //Calculate the difference and save it
            $difference = $goal->saved - $goal->supposed;
            $goal->difference = $difference;

        }
        return $goals;
    }
}

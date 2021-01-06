<?php

namespace App\Http\Controllers;

use App\Goal;
use ArrayObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Array_;

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
        $goals = Goal::where('user_id', $user->id)->with('user')->orderBy('limit_day')->paginate(5); //Goals from the Auth User, and paginated 10 by 10
        //Add supposed and diference to every Goal on the list
        $goals = $this->calculateValues($goals);
        $completed = $this->getCompleted($goals);
        return view('home', ['goals' => $goals, 'completed' => $completed]);
    }

    /**
     * Test method
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function test()
    {
        $user = Auth::user(); //Authenticated User
        $goals = Goal::where('user_id', $user->id)->with('user')->orderBy('limit_day')->paginate(5); //Goals from the Auth User, and paginated 10 by 10
        //Add supposed and diference to every Goal on the list
        $goals = $this->calculateValues($goals);
        $completed = $this->getCompleted($goals);
        return view('forms.completed', ['goals' => $goals, 'completed' => $completed]);
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

    /**
     * Get the goals that have reached the limit day
     */
    private function getCompleted(Object $goals)
    {
        $data = new ArrayObject();
        foreach ($goals as $goal) {
            if ($goal->limit_day <= date_format(now(), 'Y-m-d')) {
                $data->append($goal);
            }
        }
        return $data;
    }
}

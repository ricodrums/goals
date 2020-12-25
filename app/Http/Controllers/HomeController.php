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
        $goals = Goal::where('user_id', $user->id)->with('user')->paginate(11); //Goals from the Auth User, and paginated 10 by 10
        return view('home', ['goals' => $goals]);
    }
}

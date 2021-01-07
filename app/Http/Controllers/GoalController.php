<?php

namespace App\Http\Controllers;

use App\Goal;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|max:64',
            'goal' => 'required|integer',
            'limit_day' => 'required|date|after:'.date('Y-m-d')
        ]);
        try {
            $goal = new Goal($request->except('_method', '_token'));
            $goal->daily_pay = (int) $goal->saveDailyPay();
            $goal->user_id = Auth::user()->id;
            $goal->save();
        } catch (Exception $exception) {
            return view('errors.exception', ['exception' => $exception]);
        }
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function show(Goal $goal)
    {
        return redirect('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function edit(Goal $goal)
    {
        if ($goal->user_id != Auth::user()->id) {
            return view('auth.hacker');
        }
        return view('forms.edit', ['goal' => $goal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goal $goal)
    {
        $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|max:64',
            'goal' => 'required|integer',
            'limit_day' => 'required|date'
        ]);
        try {
            $goal = Goal::findOrFail($goal->id);
            $goal->title = $request->title;
            $goal->description = $request->description;
            $goal->goal = $request->goal;
            $goal->limit_day = $request->limit_day;
            $goal->daily_pay = (int) $goal->saveDailyPay();
            $goal->user_id = Auth::user()->id;
            $goal->save();
        } catch (Exception $exception) {
            return view('errors.exception', ['exception' => $exception]);
        }

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Validate the goal id received from the request belongs to the actual user
        $goal = Goal::findOrFail($request->goal_id);
        if ($goal->user_id != Auth::user()->id) {
            return view('auth.hacker');
        }
        $goal->delete();
    }

    /**
     * Update the payment on a Goal
     * 
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {

        //Validate the goal id received from the request belongs to the actual user
        $goal = Goal::findOrFail($request->goal_id);
        if ($goal->user_id != Auth::user()->id) {
            return view('auth.hacker');
        }

        //Update the Goal saved and Latest update
        $goal->saved += (int)($request->save_amount);
        $goal->last = (int)($request->save_amount);
        $goal->save();
        return redirect('home');
    }

    /**
     * Show the form for renew the specified resource.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function renew(Goal $goal)
    {
        if ($goal->user_id != Auth::user()->id) {
            return view('auth.hacker');
        }
        return view('forms.renew', ['goal' => $goal]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, Goal $goal)
    {
        $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|max:64',
            'goal' => 'required|integer',
            'limit_day' => 'required|date'
        ]);
        try {
            $goal = Goal::findOrFail($goal->id);
            $goal->title = $request->title;
            $goal->description = $request->description;
            $goal->goal = $request->goal;
            $goal->saved = 0;
            $goal->limit_day = $request->limit_day;
            $goal->daily_pay = (int) $goal->saveDailyPay();
            $goal->user_id = Auth::user()->id;
            $goal->created_at = now();
            $goal->save();
        } catch (Exception $exception) {
            return view('errors.exception', ['exception' => $exception]);
        }

        return redirect('home');
    }

    /**
     * Only admin can goes here, or at least thats what I am trying to do
     */
    public function admin(){
        if(Auth::user()->email != 'jdrico59@misena.edu.co'){
            return ('You cannot be here, how did you do to get in here .-.');
        }
        return Goal::all();
    }
}

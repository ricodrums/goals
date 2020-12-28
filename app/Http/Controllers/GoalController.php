<?php

namespace App\Http\Controllers;

use App\Goal;
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
        //
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
        $goal = new Goal($request->except('_method', '_token'));
        $goal->daily_pay = $goal->saveDailyPay();
        $goal->user_id = Auth::user()->id;
        $goal->save();

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
        //
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
        $goal = Goal::findOrFail($goal->id);
        $goal->title = $request->title;
        $goal->description = $request->description;
        $goal->goal = $request->goal;
        $goal->limit_day = $request->limit_day; 
        $goal->daily_pay = $goal->saveDailyPay();
        $goal->user_id = Auth::user()->id;
        $goal->save();
        
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
        if ($goal->user_id != Auth::user()->id){
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
    public function payment(Request $request){

        //Validate the goal id received from the request belongs to the actual user
        $goal = Goal::findOrFail($request->goal_id);
        if ($goal->user_id != Auth::user()->id){
            return view('auth.hacker');
        }

        //Update the Goal saved and Latest update
        $goal->saved += (int)($request->save_amount);
        $goal->last = (int)($request->save_amount);
        $goal->save();
        return redirect('home');
    }
}

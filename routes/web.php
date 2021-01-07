<?php

use App\Goal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * Auth routes for login, register, etc
 */
Auth::routes();

/**
 * Home route
 */
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Goals routes
 */
Route::resource('goals', 'GoalController')->middleware('auth');
Route::post('/goal/payment', 'GoalController@payment')->middleware('auth');
Route::get('/goal/{goal}/renew', 'GoalController@renew')->middleware('auth');
Route::put('/goal/{goal}/renew', 'GoalController@restore')->middleware('auth');

/**
 * Testing route
 */
Route::get('/completed', 'HomeController@test');

/**
 * Admini route
 */
Route::get('/admin', 'GoalController@admin')->middleware('auth');
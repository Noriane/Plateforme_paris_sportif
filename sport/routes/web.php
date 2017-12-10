<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function(){
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::name('language')->get('language/{lang}', 'HomeController@language');

Route::get('players', 'PlayerController@index')->name('players');
Route::get('players/{id}', 'PlayerController@index')->name('player_stats');

Route::get('teams', 'TeamController@index')->name('teams');
Route::get('teams/{id}', 'TeamController@index')->name('team_stats');

Route::get('match', 'MatchController@index')->name('match');
Route::get('match/{id}/stats', 'MatchController@displayStats')->name('match_stats');

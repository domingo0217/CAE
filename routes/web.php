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

Route::get('/', function (){
    return view('welcome');
});

Route::get('dashboard', function(){
    return view('dashboard');
});

Route::resource('member', 'MemberController');


Route::resource('city', 'CityController');

Route::resource('delegation', 'DelegationController');

Route::resource('charge', 'ChargeController');


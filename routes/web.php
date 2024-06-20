<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});



Route::get("register","App\Http\Controllers\Login_Controller@register");

Route::post("register","App\Http\Controllers\Login_Controller@do_register");

Route::get("login","App\Http\Controllers\Login_Controller@login"); 

Route::post("login","App\Http\Controllers\Login_Controller@do_login");

Route::get("logout","App\Http\Controllers\Login_Controller@logout"); 

Route::get("WeatherHub","App\Http\Controllers\WeatherHub_controller@get_available_capitals");

Route::post("WeatherHub","App\Http\Controllers\WeatherHub_controller@get_json");




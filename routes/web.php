<?php

use App\Http\Controllers\customAuthC;


Route::get('login','customAuthC@login');
Route::get('register','customAuthC@register');
Route::POST('register','customAuthC@registeruser');
Route::POST('loginUser','customAuthC@loginuser');
Route::get('dashboard','customAuthC@dashboard')->middleware('isloggedIn');
Route::get('logout','customAuthC@logout');


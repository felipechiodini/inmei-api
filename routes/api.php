<?php

use Illuminate\Support\Facades\Route;

Route::post('/singin', \App\Http\Controllers\SingIn::class);
Route::post('/singup', \App\Http\Controllers\SingUp::class);
Route::post('/subscribe', \App\Http\Controllers\Subscribe::class);

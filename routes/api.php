<?php

use Illuminate\Support\Facades\Route;

Route::prefix('app')
    ->group(function() {
        Route::post('sing-in', App\Http\Controllers\SingIn::class);
        Route::post('sing-up', App\Http\Controllers\SingUp::class);
        Route::post('subscribe', App\Http\Controllers\Subscribe::class);
    });

<?php

use Illuminate\Support\Facades\Route;

Route::prefix('app')
    ->group(function () {
        Route::prefix('auth')
            ->group(function () {
                Route::post('login', App\Http\Controllers\SingIn::class);
                Route::post('register', App\Http\Controllers\SingUp::class);
            });
    });

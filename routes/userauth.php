<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::prefix("user")->middleware("guest")->group(function() {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', function() {
        return App::call('App\Http\Controllers\Auth\RegisteredUserController@create', ['guard' => 'web']);
    });

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('u-login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('u-login');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');

});

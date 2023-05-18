<?php

use App\Http\Controllers\FavoriteListController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/userauth.php';


Route::get('profile', [UserController::class, 'index'])->name("profile");
Route::post('fav/add/{id}', [FavoriteListController::class, 'store'])->name("addToFavourites");

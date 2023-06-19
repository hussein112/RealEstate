<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::post("add/property/{property_id}", [PropertyController::class, 'insertImage'])
    ->middleware('auth.admin_or_employee:admin,employee')
    ->name('a-insertPropertyImage');

// Special case (Due to the fact that this route is accessed through axios).
Route::post("edit/property/{property_id}/{image_id}", [PropertyController::class, 'updateImage'])
    ->middleware('auth.admin_or_employee:admin,employee')
    ->name('a-updateImage');

Route::delete("delete/images/{id}", [ImageController::class, 'destroy'])
    ->middleware('auth.admin_or_employee:admin,employee')
    ->name("a-deleteImage");

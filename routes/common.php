<?php

use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::post("add/property/{property_id}", [PropertyController::class, 'insertImage'])
    ->middleware('auth.admin_or_employee:admin,employee')
    ->name('c-insertPropertyImage');

// Special case (Due to the fact that this route is accessed through axios).
Route::post("edit/property/{property_id}/{image_id}", [PropertyController::class, 'updateImage'])
    ->middleware('auth.admin_or_employee:admin,employee')
    ->name('c-updateImage');

Route::delete("delete/images/{id}", [ImageController::class, 'destroy'])
    ->middleware('auth.admin_or_employee:admin,employee')
    ->name("c-deleteImage");


Route::patch("remove/features/{id}/{property_id}", [FeatureController::class, 'remove'])
    ->middleware('auth.admin_or_employee:admin,employee')
    ->name("c-removeFeature");


Route::delete("delete/features/{id}", [FeatureController::class, 'destroy'])
    ->middleware('auth.admin_or_employee:admin,employee')
    ->name("c-deleteFeature");

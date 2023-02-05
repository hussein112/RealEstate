<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointementController;
use App\Http\Controllers\EnquiriesController;
use App\Http\Controllers\ValuationController;

Route::prefix('/admin')->group(function(){
    /**
     *  View Routes
     */
    Route::get("dashboard", [EmployeeController::class, 'index'])->name('u-dashboard');


    Route::get("appointements", [AppointementController::class, 'index'])->name('u-appointements');
    Route::get("appointement/{id}", [AppointementController::class, 'details'])->name('u-appointementDetails');


    Route::get("customers", [CustomerController::class, 'index'])->name('u-customers');


    Route::get("enquiries", [EnquiriesController::class, 'index'])->name('u-enquiries');
    Route::get("enquiry/{id}", [EnquiriesController::class, 'show'])->name('u-enquiryDetails');

    Route::get("properties", [PropertyController::class, 'index'])->name('u-properties');


    Route::get("valuations", [ValuationController::class, 'index'])->name("u-valuations");

    Route::get("valuation/{id}", [ValuationController::class, 'show'])->name("u-valuationDetails");

    // Edit & index will return the same form
    Route::get("profile", [EmployeeController::class, 'edit'])->name('u-profile');

    /**
     * Edit Routes
     */
    Route::prefix("edit")->group(function(){
        Route::get("property/{id}", [PropertyController::class, 'edit'])->name("u-editProperty");
        Route::patch("property/{id}", [PropertyController::class, 'update'])->name("u-editProperty");

        Route::get("user/{id}", [UserController::class, 'edit'])->name("u-editUser");
        Route::patch("user/{id}", [UserController::class, 'update'])->name("u-editUser");

        Route::get("valuation/{id}", [ValuationController::class, 'edit'])->name("u-editValuation");
        Route::patch("valuation/{id}", [ValuationController::class, 'update'])->name("u-editValuation");

        Route::get("enquiries/{id}", [EnquiriesController::class, 'edit'])->name("u-editEnquiry");
        Route::patch("enquiries/{id}", [EnquiriesController::class, 'update'])->name("u-editEnquiry");
    });


    /**
     * Delete Routes
     */
    Route::prefix("delete")->group(function(){
        Route::delete("property/{id}", [PropertyController::class, 'destroy'])->name("u-deleteProperty");

        Route::delete("user/{id}", [UserController::class, 'destroy'])->name("u-deleteUser");

        Route::delete("valuation/{id}", [ValuationController::class, 'destroy'])->name("u-deleteValuation");

        Route::delete("enquiries/{id}", [EnquiriesController::class, 'destroy'])->name("u-deleteEnquiry");
    });
})->middleware("auth:employee");

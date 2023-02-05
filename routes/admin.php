<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointementController;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\EnquiriesController;
use App\Http\Controllers\ValuationController;

Route::prefix('/admin')->group(function(){
    /**
     *  View Routes
     */
    Route::get("", [AdminController::class, 'index'])->name('a-dashboard');
    Route::get("dashboard", [AdminController::class, 'index'])->name('a-dashboard');

    Route::get("admins", [AdminController::class, 'admins'])->name('a-admins');

    Route::get("appointements", [AppointementController::class, 'index'])->name('a-appointements');
    Route::get("appointement/{id}", [AppointementController::class, 'details'])->name('a-appointementDetails');

    Route::get("branches", [BranchesController::class, 'index'])->name('a-branches');

    Route::get("customers", [CustomerController::class, 'index'])->name('a-customers');

    Route::get("employees", [EmployeeController::class, 'index'])->name("a-employees");

    Route::get("enquiries", [EnquiriesController::class, 'index'])->name('a-enquiries');
    Route::get("enquiry/{id}", [EnquiriesController::class, 'show'])->name('a-enquiryDetails');

    Route::get("properties", [PropertyController::class, 'index'])->name('a-properties');

    Route::get("users", [UserController::class, 'index'])->name('a-users');

    Route::get("valuations", [ValuationController::class, 'index'])->name("a-valuations");

    Route::get("valuation/{id}", [ValuationController::class, 'show'])->name("a-valuationDetails");

    // Edit & index will return the same form
    Route::get("profile", [AdminController::class, 'edit'])->name('a-profile');


    /**
     * Insert Routes
     */
    Route::prefix("add")->group(function(){
        Route::get("admin", [AdminController::class, 'create'])->name('a-newAdmin');
        Route::post("admin", [AdminController::class, 'store'])->name('a-newAdmin');

        Route::get("appointement", [AppointementController::class, 'create'])->name("a-newAppointemtn");
        Route::post("appointement", [AppointementController::class, 'store'])->name("a-newAppointemtn");

        Route::get("customer", [CustomerController::class, 'create'])->name("a-newCustomer");
        Route::post("customer", [CustomerController::class, 'store'])->name("a-newCustomer");

        Route::get("employee", [EmployeeController::class, 'create'])->name("a-newEmployee");
        Route::post("employee", [EmployeeController::class, 'store'])->name("a-newEmployee");

        Route::get("property", [PropertyController::class, 'create'])->name("a-newProperty");
        Route::post("property", [PropertyController::class, 'store'])->name("a-newProperty");

        Route::get("user", [UserController::class, 'create'])->name("a-newUser");
        Route::post("user", [UserController::class, 'store'])->name("a-newUser");

        Route::get("valuation", [ValuationController::class, 'create'])->name("a-newValuation");
        Route::post("valuation", [ValuationController::class, 'store'])->name("a-newValuation");

        Route::get("enquiries", [EnquiriesController::class, 'create'])->name("a-newEnquiry");
        Route::post("enquiries", [EnquiriesController::class, 'store'])->name("a-newEnquiry");
    });



    /**
     * Edit Routes
     */
    Route::prefix("edit")->group(function(){
        Route::get("admin/{id}", [AdminController::class, 'edit'])->name('a-editAdmin');
        Route::patch("admin/{id}", [AdminController::class, 'update'])->name('a-editAdmin');

        Route::get("appointement/{id}", [AppointementController::class, 'edit'])->name("a-editAppointemtn");
        Route::patch("appointement/{id}", [AppointementController::class, 'update'])->name("a-editAppointemtn");

        Route::get("employee/{id}", [EmployeeController::class, 'edit'])->name("a-editEmployee");
        Route::patch("employee/{id}", [EmployeeController::class, 'update'])->name("a-editEmployee");

        Route::get("property/{id}", [PropertyController::class, 'edit'])->name("a-editProperty");
        Route::patch("property/{id}", [PropertyController::class, 'update'])->name("a-editProperty");

        Route::get("user/{id}", [UserController::class, 'edit'])->name("a-editUser");
        Route::patch("user/{id}", [UserController::class, 'update'])->name("a-editUser");

        Route::get("valuation/{id}", [ValuationController::class, 'edit'])->name("a-editValuation");
        Route::patch("valuation/{id}", [ValuationController::class, 'update'])->name("a-editValuation");

        Route::get("customers/{id}", [CustomerController::class, 'edit'])->name("a-editCustomer");
        Route::patch("customers/{id}", [CustomerController::class, 'update'])->name("a-editCustomer");

        Route::get("enquiries/{id}", [EnquiriesController::class, 'edit'])->name("a-editEnquiry");
        Route::patch("enquiries/{id}", [EnquiriesController::class, 'update'])->name("a-editEnquiry");
    });


    /**
     * Delete Routes
     */
    Route::prefix("delete")->group(function(){
        Route::delete("admin/{id}", [AdminController::class, 'destroy'])->name('a-deleteAdmin');

        Route::delete("appointement/{id}", [AppointementController::class, 'destroy'])->name("a-deleteAppointemtn");

        Route::delete("employee/{id}", [EmployeeController::class, 'destroy'])->name("a-deleteEmployee");

        Route::delete("property/{id}", [PropertyController::class, 'destroy'])->name("a-deleteProperty");

        Route::delete("user/{id}", [UserController::class, 'destroy'])->name("a-deleteUser");

        Route::delete("valuation/{id}", [ValuationController::class, 'destroy'])->name("a-deleteValuation");

        Route::delete("customers/{id}", [CustomerController::class, 'destroy'])->name("a-deleteCustomer");

        Route::delete("enquiries/{id}", [EnquiriesController::class, 'destroy'])->name("a-deleteEnquiry");
    });
})->middleware("auth:admin");
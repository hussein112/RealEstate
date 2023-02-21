<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointementController;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\EnquiriesController;
use App\Http\Controllers\ValuationController;

require __DIR__ . '/employeeauth.php';
Route::prefix('/employee')->middleware("auth:employee")->group(function(){

    /**
     *  View Routes
     */
    Route::get("", [EmployeeController::class, 'index'])->name('e-dashboard');
    Route::get("dashboard", [EmployeeController::class, 'index'])->name('e-dashboard');

    Route::get("posts", [PostController::class, 'employeeIndex'])->name('e-posts');

    Route::get("appointements", [AppointementController::class, 'employeeIndex'])->name('e-appointements');
    Route::get("appointement/{id}", [AppointementController::class, 'details'])->name('e-appointementDetails');

    Route::get("customers", [CustomerController::class, 'employeeIndex'])->name('e-customers');

    Route::get("enquiries", [EnquiriesController::class, 'employeeIndex'])->name('e-enquiries');
    Route::get("enquiry/{id}", [EnquiriesController::class, 'employeeShow'])->name('e-enquiryDetails');

    Route::get("properties", [PropertyController::class, 'employeeGetProperties'])->name('e-properties');
    Route::get("property/{id}", [PropertyController::class, 'getProperty'])->name('e-property');

    Route::get("users", [UserController::class, 'employeeDisplayUsers'])->name('e-users');

    Route::get("valuations", [ValuationController::class, 'employeeIndex'])->name("e-valuations");

    Route::get("valuation/{id}", [ValuationController::class, 'employeeShow'])->name("e-valuationDetails");

    // Edit & index will return the same form
    Route::get("profile/{id}", [EmployeeController::class, 'edit'])->name('e-profileShow');


    /**
     * Insert Routes
     */
    Route::prefix("add")->group(function(){
        Route::get("post", [PostController::class, 'employeeCreate'])->name("e-newPost");
        Route::post("post", [PostController::class, 'store'])->name("e-newPost");

        Route::get("appointement", [AppointementController::class, 'create'])->name("e-newAppointement");
        Route::post("appointement", [AppointementController::class, 'store'])->name("e-newAppointement");

        Route::get("customer", [CustomerController::class, 'employeeCreate'])->name("e-newCustomer");
        Route::post("customer", [CustomerController::class, 'store'])->name("e-newCustomer");

        Route::get("property", [PropertyController::class, 'employeeCreate'])->name("e-newProperty");
        Route::post("property", [PropertyController::class, 'store'])->name("e-newProperty");

        Route::get("user", [UserController::class, 'employeeCreate'])->name("e-newUser");
        Route::post("user", [UserController::class, 'store'])->name("e-newUser");
    });



    /**
     * Edit Routes
     */
    Route::prefix("edit")->group(function(){
        Route::get("post/{id}", [PostController::class, 'employeeEdit'])->name('e-editPost');
        Route::patch("post/{id}", [PostController::class, 'update'])->name('e-editPost');

        Route::get("appointement/{id}", [AppointementController::class, 'edit'])->name("e-editAppointement");
        Route::patch("appointement/{id}", [AppointementController::class, 'update'])->name("e-editAppointemtn");

        Route::get("property/{id}", [PropertyController::class, 'edit'])->name("e-editProperty");
        Route::patch("property/{id}", [PropertyController::class, 'update'])->name("e-editProperty");

        Route::get("user/{id}", [UserController::class, 'employeeEdit'])->name("e-editUser");
        Route::patch("user/{id}", [UserController::class, 'update'])->name("e-editUser");

        Route::get("valuation/{id}", [ValuationController::class, 'employeeEdit'])->name("e-editValuation");
        Route::patch("valuation/{id}", [ValuationController::class, 'update'])->name("e-editValuation");

        Route::get("customers/{id}", [CustomerController::class, 'employeeEdit'])->name("e-editCustomer");
        Route::patch("customers/{id}", [CustomerController::class, 'update'])->name("e-editCustomer");

        Route::get("enquiries/{id}", [EnquiriesController::class, 'edit'])->name("e-editEnquiry");
        Route::patch("enquiries/{id}", [EnquiriesController::class, 'update'])->name("e-editEnquiry");

        Route::patch("profile/{id}", [EmployeeController::class, 'update'])->name('e-profile');
    });


    /**
     * Delete Routes
     */
    Route::prefix("delete")->group(function(){
        Route::delete("appointement/{id}", [AppointementController::class, 'destroy'])->name("e-deleteAppointemtn");

        Route::delete("property/{id}", [PropertyController::class, 'destroy'])->name('e-deleteProperty');

        Route::delete("user/{id}", [UserController::class, 'destroy'])->name("e-deleteUser");

        Route::delete("valuation/{id}", [ValuationController::class, 'destroy'])->name("e-deleteValuation");

        Route::delete("customers/{id}", [CustomerController::class, 'destroy'])->name("e-deleteCustomer");

        Route::delete("enquiries/{id}", [EnquiriesController::class, 'destroy'])->name("e-deleteEnquiry");
    });
});

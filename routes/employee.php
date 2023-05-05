<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostImagesController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use App\Models\Appointement;
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


    Route::get("appointements", [AppointementController::class, 'employeeIndex'])->name('e-appointements');
    Route::get("appointement/{id}", [AppointementController::class, 'details'])->name('e-appointementDetails');

    Route::get("customers", [CustomerController::class, 'employeeIndex'])->name('e-customers');

    Route::get("enquiries", [EnquiriesController::class, 'employeeIndex'])->name('e-enquiries');
    Route::get("enquiry/{id}/{notification_id?}", [EnquiriesController::class, 'employeeShow'])->name('e-enquiryDetails');

    Route::get("properties", [PropertyController::class, 'employeeIndex'])->name('e-properties');
    Route::get("property/{id}", [PropertyController::class, 'employeeProperty'])->name('e-property');

    Route::get("users", [UserController::class, 'employeeIndex'])->name('e-users');

    Route::get("valuations", [ValuationController::class, 'employeeIndex'])->name("e-valuations");

    Route::get("valuation/{id}/{notification_id?}", [ValuationController::class, 'employeeShow'])->name("e-valuationDetails");

    // Edit & index will return the same form
    Route::get("profile/{id}", [EmployeeController::class, 'edit'])->name('e-profileShow');


    /**
     * Insert Routes
     */
    Route::prefix("add")->group(function(){
        Route::post("image", [PostImagesController::class, 'store'])->name('e-newPostImage');

        Route::get("property", [PropertyController::class, 'employeeCreate'])->name("e-newProperty");
        Route::post("property", [PropertyController::class, 'store'])->name("e-newProperty");

        Route::get("user", [UserController::class, 'employeeCreate'])->name("e-newUser");
        Route::post("user", [UserController::class, 'superUsersStore'])->name("e-newUser");

        Route::get("customer", [CustomerController::class, 'employeeCreate'])->name("e-newCustomer");
        Route::post("customer", [CustomerController::class, 'store'])->name("e-newCustomer");

        Route::get("appointement", [AppointementController::class, 'employeeCreate'])->name("e-newAppointement");
        Route::post("appointement", [AppointementController::class, 'employeeStore'])->name("e-newAppointement");
    });



    /**
     * Edit Routes
     */
    Route::prefix("edit")->group(function(){
        Route::get("property/{id}", [PropertyController::class, 'employeeEdit'])->name("e-editProperty");
        Route::patch("property/{id}", [PropertyController::class, 'update'])->name("e-editProperty");

        Route::get("user/{id}", [UserController::class, 'employeeEdit'])->name("e-editUser");
        Route::patch("user/{id}", [UserController::class, 'update'])->name("e-editUser");

        Route::get("customer/{id}", [CustomerController::class, 'employeeEdit'])->name("e-editCustomer");
        Route::patch("customer/{id}", [CustomerController::class, 'update'])->name("e-editCustomer");

//        Route::get("valuation/{id}", [ValuationController::class, 'employeeEdit'])->name("e-editValuation");
        // Mark Valuation As done
        Route::patch("valuation/{id}", [ValuationController::class, 'done'])->name("e-editValuation");

        Route::get("enquiries/{id}", [EnquiriesController::class, 'edit'])->name("e-editEnquiry");
        // Mark Enquiry As done
        Route::patch("enquiries/{id}", [EnquiriesController::class, 'update'])->name("e-editEnquiry");

        Route::patch("profile/{id}", [EmployeeController::class, 'update'])->name('e-editEmployee');

        Route::patch("enquiries/done/{id}", [EnquiriesController::class, 'markAsDone'])->name("e-markAsDone");


        Route::get("appointement/{id}", [AppointementController::class, 'employeeEdit'])->name("e-editAppointement");
        Route::patch("appointement/{id}", [AppointementController::class, 'employeeUpdate'])->name("e-editAppointement");
    });


    /**
     * Delete Routes
     */
    Route::prefix("delete")->group(function(){

        Route::delete("property/{id}", [PropertyController::class, 'destroy'])->name('e-deleteProperty');

        Route::delete("user/{id}", [UserController::class, 'destroy'])->name("e-deleteUser");

        Route::delete("valuation/{id}", [ValuationController::class, 'destroy'])->name("e-deleteValuation");

        Route::delete("enquiries/{id}", [EnquiriesController::class, 'destroy'])->name("e-deleteEnquiry");

        Route::delete("customer/{id}", [CustomerController::class, 'destroy'])->name("e-deleteCustomer");

        Route::delete("appointement/{id}", [AppointementController::class, 'destroy'])->name("e-deleteAppointement");
    });

    /**
     * Notifications Routes
     */
    Route::delete("notifications/delete", [AdminController::class, 'deleteNotifications'])->name("e-deleteNotifications");
    Route::post("notifications/mark_as_read", [AdminController::class, 'readNotifications'])->name("e-readNotifications");
});

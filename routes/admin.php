<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostImagesController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValuationApprovalController;
use App\Http\Controllers\ValuationRequestedController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointementController;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\EnquiriesController;
use App\Http\Controllers\ValuationController;

require __DIR__ . '/adminauth.php';
Route::prefix('/admin')->middleware("auth:admin")->group(function(){
    /**
     * AJax Routes
     *
     */


    /**
     *  View Routes
     */
    Route::get("", [AdminController::class, 'index'])->name('a-dashboard');
    Route::get("dashboard", [AdminController::class, 'index'])->name('a-dashboard');

    Route::get("admins", [AdminController::class, 'admins'])->name('a-admins');

    Route::get("posts", [PostController::class, 'adminIndex'])->name('a-posts');


    Route::get("appointements", [AppointementController::class, 'adminIndex'])->name('a-appointements');
    Route::get("appointement/{id}", [AppointementController::class, 'details'])->name('a-appointementDetails');

    Route::get("branches", [BranchesController::class, 'adminIndex'])->name('a-branches');

    Route::get("customers", [CustomerController::class, 'adminIndex'])->name('a-customers');

    Route::get("employees", [EmployeeController::class, 'adminIndex'])->name("a-employees");

    Route::get("enquiries", [EnquiriesController::class, 'adminIndex'])->name('a-enquiries');
    Route::get("enquiry/{id}", [EnquiriesController::class, 'adminShow'])->name('a-enquiryDetails');

    Route::get("properties", [PropertyController::class, 'adminIndex'])->name('a-properties');
    Route::get("property/{id}", [PropertyController::class, 'adminProperty'])->name('a-property');

    Route::get("users", [UserController::class, 'adminIndex'])->name('a-users');

    Route::get("valuations", [ValuationController::class, 'adminIndex'])->name("a-valuations");

    Route::get("valuation/{id}", [ValuationController::class, 'adminShow'])->name("a-valuationDetails");
    // Review the valuation
    Route::get("valuation/request/{id}/{notification_id}", [ValuationApprovalController::class, 'index'])->name("valuationRequest");

    // Edit & index will return the same form
    Route::get("profile/{id}", [AdminController::class, 'edit'])->name('a-profileShow');


    /**
     * Insert Routes
     */
    Route::prefix("add")->group(function(){
        Route::get("admin", [AdminController::class, 'create'])->name('a-newAdmin');
        Route::post("admin", [AdminController::class, 'store'])->name('a-newAdmin');

        Route::post("image", [PostImagesController::class, 'store'])->name('a-newPostImage');

        Route::get("post", [PostController::class, 'adminCreate'])->name("a-newPost");
        Route::post("post", [PostController::class, 'store'])->name("a-newPost");

        Route::get("appointement", [AppointementController::class, 'create'])->name("a-newAppointement");
        Route::post("appointement", [AppointementController::class, 'store'])->name("a-newAppointement");

        Route::get("customer", [CustomerController::class, 'adminCreate'])->name("a-newCustomer");
        Route::post("customer", [CustomerController::class, 'store'])->name("a-newCustomer");

        Route::get("employee", [EmployeeController::class, 'create'])->name("a-newEmployee");
        Route::post("employee", [EmployeeController::class, 'store'])->name("a-newEmployee");

        Route::get("property", [PropertyController::class, 'createAdmin'])->name("a-newProperty");
        Route::post("property", [PropertyController::class, 'store'])->name("a-newProperty");

        Route::get("user", [UserController::class, 'adminCreate'])->name("a-newUser");
        Route::post("user", [UserController::class, 'store'])->name("a-newUser");
    });



    /**
     * Edit Routes
     */
    Route::prefix("edit")->group(function(){
        Route::get("admin/{id}", [AdminController::class, 'edit'])->name('a-editAdmin');
        Route::patch("admin/{id}", [AdminController::class, 'update'])->name('a-editAdmin');

        Route::get("post/{id}", [PostController::class, 'adminEdit'])->name('a-editPost');
        Route::patch("post/{id}", [PostController::class, 'update'])->name('a-editPost');


        Route::get("appointement/{id}", [AppointementController::class, 'edit'])->name("a-editAppointement");
        Route::patch("appointement/{id}", [AppointementController::class, 'update'])->name("a-editAppointemtn");

        Route::get("employee/{id}", [EmployeeController::class, 'adminEdit'])->name("a-editEmployee");
        Route::patch("employee/{id}", [EmployeeController::class, 'update'])->name("a-editEmployee");

        Route::get("property/{id}", [PropertyController::class, 'edit'])->name("a-editProperty");
        Route::patch("property/{id}", [PropertyController::class, 'update'])->name("a-editProperty");

        Route::get("user/{id}", [UserController::class, 'adminEdit'])->name("a-editUser");
        Route::patch("user/{id}", [UserController::class, 'update'])->name("a-editUser");

        Route::get("valuation/{id}", [ValuationController::class, 'adminEdit'])->name("a-editValuation");
        Route::patch("valuation/{id}", [ValuationController::class, 'update'])->name("a-editValuation");

        Route::get("customers/{id}", [CustomerController::class, 'adminEdit'])->name("a-editCustomer");
        Route::patch("customers/{id}", [CustomerController::class, 'update'])->name("a-editCustomer");

        Route::get("enquiries/{id}", [EnquiriesController::class, 'edit'])->name("a-editEnquiry");
        Route::patch("enquiries/{id}", [EnquiriesController::class, 'update'])->name("a-editEnquiry");

        Route::patch("profile/{id}", [AdminController::class, 'update'])->name('a-profile');

        // Approve a Valuation Request
        Route::patch("valuation/request/approve/{id}", [ValuationApprovalController::class, 'approve'])->name('a-approveValuation');
    });


    /**
     * Delete Routes
     */
    Route::prefix("delete")->group(function(){
        Route::delete("admin/{id}", [AdminController::class, 'destroy'])->name('a-deleteAdmin');

        Route::delete("appointement/{id}", [AppointementController::class, 'destroy'])->name("a-deleteAppointemtn");

        Route::delete("employee/{id}", [EmployeeController::class, 'destroy'])->name("a-deleteEmployee");

        Route::delete("property/{id}", [PropertyController::class, 'destroy'])->name('a-deleteProperty');

        Route::delete("user/{id}", [UserController::class, 'destroy'])->name("a-deleteUser");

        Route::delete("valuation/{id}", [ValuationController::class, 'destroy'])->name("a-deleteValuation");

        Route::delete("customers/{id}", [CustomerController::class, 'destroy'])->name("a-deleteCustomer");

        Route::delete("enquiries/{id}", [EnquiriesController::class, 'destroy'])->name("a-deleteEnquiry");

        // Reject a Valuation Request
        Route::delete("valuation/request/reject/{id}", [ValuationApprovalController::class, 'reject'])->name('a-rejectRequest');
    });



    /**
     * Notifications Routes
     */
    Route::delete("notifications/delete", [AdminController::class, 'deleteNotifications'])->name("deleteNotifications");
    Route::post("notifications/mark_as_read", [AdminController::class, 'readNotifications'])->name("readNotifications");
});

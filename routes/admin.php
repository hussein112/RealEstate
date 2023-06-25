
<?php

use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostImagesController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValuationApprovalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointementController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ValuationController;

require __DIR__ . '/adminauth.php';
Route::prefix('/admin')->middleware("auth:admin")->group(function(){

    /**
     *  View Routes
     */
    Route::get("", [AdminController::class, 'index'])->name('a-dashboard');
    Route::get("dashboard", [AdminController::class, 'index'])->name('a-dashboard');

    Route::get("settings", [SettingsController::class, 'index'])->name('settings');

    Route::get("admins", [AdminController::class, 'admins'])->name('a-admins');

    Route::get("posts", [PostController::class, 'adminIndex'])->name('a-posts');


    Route::get("appointements", [AppointementController::class, 'adminIndex'])->name('a-appointements');
    Route::get("appointement/{id}", [AppointementController::class, 'details'])->name('a-appointementDetails');

    Route::get("branches", [BranchController::class, 'adminIndex'])->name('a-branches');

    Route::get("customers", [CustomerController::class, 'adminIndex'])->name('a-customers');

    Route::get("employees", [EmployeeController::class, 'adminIndex'])->name("a-employees");

    Route::get("enquiries", [EnquiryController::class, 'adminIndex'])->name('a-enquiries');
    Route::get("enquiry/{id}", [EnquiryController::class, 'adminShow'])->name('a-enquiryDetails');

    Route::get("properties", [PropertyController::class, 'adminIndex'])->name('a-properties');


    Route::get("users", [UserController::class, 'adminIndex'])->name('a-users');

    Route::get("valuations", [ValuationController::class, 'adminIndex'])->name("a-valuations");

    Route::get("valuation/{id}", [ValuationController::class, 'adminShow'])->name("a-valuationDetails");

    // Review the valuation
    Route::get("valuation/request/{id}/{notification_id?}", [ValuationApprovalController::class, 'index'])->name("valuationRequest");



    // Edit & index will return the same form
    Route::get("profile/{id}", [AdminController::class, 'edit'])->name('a-profileShow');



    Route::get("advertisements", [AdvertiseController::class, 'adminIndex'])->name('a-advertisements');
    Route::get("advertise/{id}/{notification_id?}", [AdvertiseController::class, 'adminShow'])->name("a-advertiseDetails");
    Route::patch("advertisement/approve/{id}", [AdvertiseController::class, 'approve'])->name("a-approveAdvertisement");
    Route::patch("advertisement/reject/{id}", [AdvertiseController::class, 'reject'])->name("a-rejectAdvertisement");
    Route::patch("advertisement/done/{id}", [AdvertiseController::class, 'done'])->name("a-markAsDoneAdvertisement");

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
        Route::post("user", [UserController::class, 'superUsersStore'])->name("a-newUser");

        // Assign Valuation to an Employee
        Route::post("valuation/request/assign/{valuation_id}/{employee_id}", [ValuationApprovalController::class, 'assign'])->name('a-assignValuationTo');
        // Manually Assign Enquiry to an Employee
        // Review the enquiry
        Route::get("enquiry/assign/{enquiry_id}/{notification_id?}", [EnquiryController::class, 'review'])->name('a-assignEnquiry');
        Route::post("enquiry/assign/{enquiry_id}/{employee_id}", [EnquiryController::class, 'assignByForce'])->name('a-assignEnquiryTo');

        Route::get("advertise/assign/{advertisement_id}/{notification_id?}", [AdvertiseController::class, 'showUnassigned'])->name('a-assignAdvertisement');

        Route::post("advertise/assign/{advertisement_id}/{employee_id}", [AdvertiseController::class, 'assignByForce'])->name('a-assignAdvertisementTo');
    });



    /**
     * Edit Routes
     */
    Route::prefix("edit")->group(function(){
        Route::get("admin/{id}", [AdminController::class, 'edit'])->name('a-editAdmin');
        Route::patch("admin/{id}", [AdminController::class, 'update'])->name('a-editAdmin');
        Route::patch("admin/password/{id}", [AdminController::class, 'updatePassword'])->name('a-editAdminPassword');

        Route::get("post/{id}", [PostController::class, 'adminEdit'])->name('a-editPost');
        Route::patch("post/{id}", [PostController::class, 'update'])->name('a-editPost');


        Route::get("appointement/{id}", [AppointementController::class, 'edit'])->name("a-editAppointement");
        Route::patch("appointement/{id}", [AppointementController::class, 'update'])->name("a-editAppointement");

        Route::get("employee/{id}", [EmployeeController::class, 'adminEdit'])->name("a-editEmployee");
        Route::patch("employee/{id}", [EmployeeController::class, 'update'])->name("a-editEmployee");

        Route::get("property/{id}", [PropertyController::class, 'edit'])->name("a-editProperty");
        Route::patch("property/{id}", [PropertyController::class, 'update'])->name("a-editProperty");

        Route::get("user/{id}", [UserController::class, 'adminEdit'])->name("a-editUser");
        Route::patch("user/{id}", [UserController::class, 'update'])->name("a-editUser");

        Route::get("valuation/{id}", [ValuationController::class, 'adminEdit'])->name("a-editValuation");
        Route::patch("valuation/{id}", [ValuationController::class, 'update'])->name("a-editValuation");
        Route::patch("valuation/{id}", [ValuationController::class, 'done'])->name("a-editValuation");


        Route::get("customers/{id}", [CustomerController::class, 'adminEdit'])->name("a-editCustomer");
        Route::patch("customers/{id}", [CustomerController::class, 'update'])->name("a-editCustomer");

        Route::get("enquiries/{id}", [EnquiryController::class, 'edit'])->name("a-editEnquiry");
        Route::patch("enquiries/{id}", [EnquiryController::class, 'update'])->name("a-editEnquiry");
        Route::patch("enquiries/done/{id}", [EnquiryController::class, 'markAsDone'])->name("a-markAsDone");



        // Approve a Valuation Request
        Route::get("valuation/request/approve/{id}", [ValuationApprovalController::class, 'approve'])->name('a-approveValuation');


        // ----------- Website Settings
        Route::get("settings/about", [SettingsController::class, 'editAbout'])->name('edit-about');
        Route::patch("settings/about", [SettingsController::class, 'updateAbout'])->name('edit-about');

        Route::get("settings/services", [SettingsController::class, 'editServices'])->name('edit-services');
        Route::patch("settings/services", [SettingsController::class, 'updateServices'])->name('edit-services');

        Route::get("settings/privacy", [SettingsController::class, 'editPrivacy'])->name('edit-privacy');
        Route::patch("settings/privacy", [SettingsController::class, 'updatePrivacy'])->name('edit-privacy');

        Route::get("settings/terms", [SettingsController::class, 'editTerms'])->name('edit-terms');
        Route::patch("settings/terms", [SettingsController::class, 'updateTerms'])->name('edit-terms');

        Route::get("settings/advertise", [SettingsController::class, 'editAdvertise'])->name('edit-advertise');
        Route::patch("settings/advertise", [SettingsController::class, 'updateAdvertise'])->name('edit-advertise');

        Route::get("settings/contact", [SettingsController::class, 'editContact'])->name('edit-contact');
        Route::patch("settings/contact", [SettingsController::class, 'updateContact'])->name('edit-contact');

        Route::get("settings/email", [SettingsController::class, 'editEmails'])->name('edit-emails');
        Route::get("settings/email/edit/{email}", [SettingsController::class, 'editEmail'])->name('edit-email');
        Route::patch("settings/email/edit/{email}", [SettingsController::class, 'updateEmail'])->name('edit-email');

        Route::patch("settings/employee_capacity", [SettingsController::class, 'updateEmployeeCapacity'])->name('a-updateEmployeeCapacity');

        Route::patch("settings/max_images", [SettingsController::class, 'updatePropertyMaxImages'])->name('a-updatePropertyMaxImages');
        Route::patch("settings/max_features", [SettingsController::class, 'updatePropertyMaxFeatures'])->name('a-updatePropertyMaxFeatures');
    });


    /**
     * Delete Routes
     */
    Route::prefix("delete")->group(function(){
        Route::delete("admin/{id}", [AdminController::class, 'destroy'])->name('a-deleteAdmin');

        Route::delete("appointement/{id}", [AppointementController::class, 'destroy'])->name("a-deleteAppointement");

        Route::delete("employee/{id}", [EmployeeController::class, 'destroy'])->name("a-deleteEmployee");

        Route::delete("property/{id}", [PropertyController::class, 'destroy'])->name('a-deleteProperty');

        Route::delete("user/{id}", [UserController::class, 'destroy'])->name("a-deleteUser");

        Route::delete("post/{id}", [PostController::class, 'destroy'])->name("a-deletePost");

        Route::delete("valuation/{id}", [ValuationController::class, 'destroy'])->name("a-deleteValuation");

        Route::delete("customers/{id}", [CustomerController::class, 'destroy'])->name("a-deleteCustomer");

        Route::delete("enquiries/{id}", [EnquiriesController::class, 'destroy'])->name("a-deleteEnquiry");

        // Reject a Valuation Request
        Route::delete("valuation/request/reject/{id}", [ValuationApprovalController::class, 'reject'])->name('a-rejectRequest');
    });



    /**
     * Notifications Routes
     */
    Route::delete("notifications/delete", [AdminController::class, 'deleteNotifications'])->name("a-deleteNotifications");
    Route::post("notifications/mark_as_read", [AdminController::class, 'readNotifications'])->name("a-readNotifications");
});

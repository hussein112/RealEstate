<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValuationController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', [WebsiteController::class, 'home'])->name("home");
Route::get('contact', [WebsiteController::class, 'contact'])->name("contact");
Route::get('about', [WebsiteController::class, 'about'])->name("about");
Route::get('terms/partner', [WebsiteController::class, 'partnerTerms'])->name("partnerTerms");
Route::get('policy', [WebsiteController::class, 'policy'])->name("policy");
Route::get('services', [WebsiteController::class, 'services'])->name("services");
Route::get('team', [WebsiteController::class, 'team'])->name("team");
Route::get('terms', [WebsiteController::class, 'terms'])->name("terms");


Route::get('register', [UserController::class, 'create'])->name('register');
Route::post("register", [UserController::class, 'store'])->name("register");
Route::get("logout", [AuthenticatedSessionController::class, 'destroy'])->name("logout");

require __DIR__.'/auth.php';

Route::get("valuation", [ValuationController::class, 'create'])->name("newValuation");
Route::post("valuation/new", [ValuationController::class, 'store'])->name("createValuation");

Route::post("enquiry/new/{propertyId}", [EnquiryController::class, 'store'])->name("createEnquiry");
// Assign enquiry to an employee
Route::patch("enquiry/assign/{enquiry_id}/{employee_id}", [EnquiryController::class, 'assign'])->name("assignEnquiry");
/**
 *
 * Properties Routes
 */

Route::prefix("properties")->group(function(){
    Route::get("all", [PropertyController::class, 'index'])->name('properties');
    Route::get("featured", [PropertyController::class, 'featured'])->name('featuredProperties');
    Route::get("property/{id}", [PropertyController::class, 'show'])->name('property');
    Route::get("buy", [PropertyController::class, 'buy'])->name('propertiesForBuy');
    Route::get("rent", [PropertyController::class, 'rent'])->name('propertiesForRent');
    Route::get("s", [PropertyController::class, 'search'])->name('propertiesSearch');
    Route::get("/sell", [PropertyController::class, 'sell'])->name("sell");
});




/**
 * Posts Routes
 * Display Posts Based on a Criteria
 */
Route::prefix('posts')->group(function(){
    Route::get('/all', [PostController::class, 'index'])->name('blog');
    Route::get('/post/{id}', [PostController::class, 'show'])->name('post');
    Route::get("/date/{date}", [PostController::class, 'getByDate'])->name('post_dates');
    Route::get("/author/{id}", [AdminController::class, 'posts'])->name('author_posts');
    Route::get("/category/category", [PostController::class, 'getByCategory'])->name('category_posts');
});

require __DIR__ .'/user.php';

/**
 * Company Routes
 */
require __DIR__ . '/employee.php';

require __DIR__ . '/admin.php';

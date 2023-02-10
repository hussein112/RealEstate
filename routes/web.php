<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PostController;
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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';


Route::get("valuation", [ValuationController::class, 'create'])->name("newValuation");


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
});




/**
 * Posts Routes
 * Display Posts Based on a Criteria
 */
Route::prefix('posts')->group(function(){
    Route::get('/all', [PostController::class, 'index'])->name('blog');
    Route::get('{id}', [PostController::class, 'show'])->name('post');
    Route::get("/date/{date}", [PostController::class, 'getByDate'])->name('post_dates');
    Route::get("/author/{id}", [AdminController::class, 'posts'])->name('author_posts');
    Route::get("/category/category", [PostController::class, 'getByCategory'])->name('category_posts');
});


/**
 * Company Routes
 */
require __DIR__ . '/employee.php';

require __DIR__ . '/admin.php';


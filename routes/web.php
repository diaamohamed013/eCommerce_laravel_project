<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ShopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('site.pages.home');
// });

// require_once 'admin.php';

Auth::routes();
Route::as('site.')->group(function(){
    Route::middleware('auth')->group(function(){

    });
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('contact-us', [HomeController::class, 'contact'])->name('contact');
    Route::post('contact-us', [HomeController::class, 'sendMessage'])->name('contact.store');
    Route::get('forbidden', [HomeController::class, 'inCorrectRole'])->name('forbidden');
    Route::get('shop', [ShopController::class, 'index'])->name('shop');
    Route::post('shop/filter', [ShopController::class, 'filter'])->name('filter');
});

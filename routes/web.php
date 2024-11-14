<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;

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
    Route::get('forbidden', [HomeController::class, 'inCorrectRole'])->name('forbidden');
});

<?php

// use App\Http\Controllers\admin\auth\LoginController;
// use App\Http\Controllers\admin\auth\LogoutController;
// use App\Http\Controllers\admin\DashboardController;
// use App\Http\Controllers\admin\DoctorController;
// use App\Http\Controllers\admin\MajorController;
use Illuminate\Support\Facades\Route;


// Route::prefix('admin/')->as('admin.')->group(function () {

//     Route::middleware('auth')->group(function(){
//         Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
//         Route::post('logout', LogoutController::class)->name('auth.logout');
//         Route::resource('majors', MajorController::class);
//         Route::resource('doctors', DoctorController::class);

//     });
//     Route::get('login', [LoginController::class, 'login'])->name('auth.login.show');
//     Route::post('login', [LoginController::class, 'authentication'])->name('auth.login');

// });


Route::group(['middleware' => ['isAdmin']], function () {

    Route::get('dashboard', function () {
        return view('admin.pages.home');
    })->name('admin.dashboard');
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

    Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);
    Route::resource('users', App\Http\Controllers\UserController::class);
});

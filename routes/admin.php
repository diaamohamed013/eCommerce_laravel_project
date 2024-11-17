<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['isAdmin']], function () {

    Route::get('dashboard', function () {
        return view('admin.pages.home');
    })->name('admin.dashboard');
    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);

    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);

    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

    Route::get('messages', [ContactController::class, 'index'])->name('admin.message.show');
    Route::delete('messages/{messageId}', [ContactController::class, 'destroy'])->name('admin.message.destroy');

    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
});

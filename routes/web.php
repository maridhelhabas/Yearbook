<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\yearbookController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StaffManagementController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RouteController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['web'])->group(function () {
    Route::controller(RouteController::class)->group(function () {
        Route::get('/admin-login', 'AdminLogin')->name('admin-login');
        Route::get('/dashboard', 'dashboardBlade')->name('dashboard');
        Route::get('/alumni', 'alumniBlade')->name('alumni');
        Route::get('/template', 'templateBlade')->name('template');
        Route::get('/reports', 'reportBlade')->name('reports');
        Route::get('/user_profile', 'userProfileBlade')->name('user.profile');
    });
});

// Route::middleware(['web'])->group(function () {
//     Route::controller(StaffManagementController::class)->group(function () {
//         Route::get('/staff', 'index')->name('staff');
//         Route::post('/staff/registration', 'createStaff')->name('staff.register');
//     });
// });

Route::resource('staff', StaffController::class)->names([
    'index' => 'staff.index',
    'create' => 'staff.create',
    'store' => 'staff.store',
    'show' => 'admin.staff.show',
    'edit' => 'admin.staff.edit',
    'update' => 'admin.staff.update',
    'destroy' => 'admin.staff.destroy',
]);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





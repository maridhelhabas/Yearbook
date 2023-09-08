<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\yearbookController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StaffManagementController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin-login', function () {
    return view('yearbook_pages.index');
});
Route::post('/admin-login',[loginController::class, 'login']);

Route::get('/staff-login', function () {
    return view('yearbook_pages.index');
});

Route::get('/dashboard', function () {
    return view('yearbook_pages.dashboard');
})->name('dashboard');

Route::get('/registration', function () {
    return view('yearbook_pages.registration');
})->name('registration');

Route::get('/reports', function () {
    return view('yearbook_pages.reports');
})->name('reports');

Route::get('/upload', function () {
    return view('yearbook_pages.upload');
})->name('upload');

Route::get('/template', function () {
    return view('yearbook_pages.template');
})->name('template');

Route::get('/staff', function () {
    return view('yearbook_pages.staff');
})->name('staff');

Route::get('/alumni', function () {
    return view('yearbook_pages.alumni');
})->name('alumni');

Route::post('/staff/registration', [StaffManagementController::class, 'createStaff'])->name('staff.register');



Route::get('login', function () {
    return view('login');
});

Route::get('/logout', function () {
    return view('yearbook_pages.index');
})->name('logout');


//  Route::post('/staff/register', [RegisterController::class, 'create'])->name('staff.register');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





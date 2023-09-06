<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\yearbookController;


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

Route::get('/', [yearbookController::class, 'staff']);
Route::post('/store', [yearbookController::class, 'store'])->name('store');
Route::get('/fetchall', [yearbookController::class, 'fetchAll'])->name('fetchAll');
Route::delete('/delete', [yearbookController::class, 'delete'])->name('delete');
Route::get('/edit', [yearbookController::class, 'edit'])->name('edit');
Route::post('/update', [yearbookController::class, 'update'])->name('update');
















Route::resource('login', loginController::class);

Route::get('login', function () {
    return view('login');
});

Route::get('/logout', function () {
    return view('yearbook_pages.index');
})->name('logout');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


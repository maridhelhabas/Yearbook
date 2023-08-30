<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;

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

Route::get('/', function () {
    return view('yearbook_pages.userlogin');
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


Route::resource('login', loginController::class);

//Route::get('login2', [loginController::class, 'login']);

Route::get('login', function () {
    return view('login');
});

Route::get('/logout', function () {
    return view('yearbook_pages.index');
})->name('logout');

Auth::routes();


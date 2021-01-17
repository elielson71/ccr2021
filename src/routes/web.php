<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\Dashboard;

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

Route::get('/', function () {
    return view('landingpage.index');
});

Route::prefix('user')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('user.login');
    Route::post('/login', [AuthController::class, 'login'])->name('user.login');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('user.register');
    Route::post('/register', [AuthController::class, 'register'])->name('user.register');
});

Route::prefix('dashboard')->middleware('loginCheck')->group(function () {
    Route::get('/', [Dashboard::class, 'showIndex'])->name('dashboard.index');
});

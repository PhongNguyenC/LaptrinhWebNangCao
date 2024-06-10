<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Login\AuthController;

Route::get('/Register', [AuthController::class, 'showRegistrationForm'])->name('Register');
Route::post('/Register', [AuthController::class, 'register']);

Route::get('/', [AuthController::class, 'showLoginForm'])->name('Login');
Route::post('/Login', [AuthController::class, 'login']);

Route::post('/Logout', [AuthController::class, 'logout'])->name('Logout');

Route::get('/Home', function () {
    return view('Home.Home');
})->name('Home')->middleware('Auth');

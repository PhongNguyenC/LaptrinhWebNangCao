<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;

Route::get('/', [LoginController::class, 'login']);

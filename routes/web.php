<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('throttle:10,1');

Route::prefix('dashboard')->controller(DashboardController::class)->name('dashboard.')->group(function () {
    Route::get('/', 'index')->name('index');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThreadController;

Route::get('/', HomeController::class)->name('home');
Route::get('/dashboard', DashboardController::class)->name('dashboard');

Route::resource('threads', ThreadController::class);

require __DIR__.'/auth.php';

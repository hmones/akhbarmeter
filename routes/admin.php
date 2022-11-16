<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::resource('videos', VideoController::class)->except('show');

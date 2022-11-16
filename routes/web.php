<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::resource('contact', ContactController::class)->only(['index', 'store']);
Route::resource('videos', VideoController::class)->only(['index', 'show']);

Route::get('/', fn () => view('welcome'))->name('home');
Route::post('/lang', [LanguageController::class, 'store'])->name('lang');

Route::get('/dashboard', fn () => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

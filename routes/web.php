<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::resource('contact', ContactController::class)->only(['index', 'store']);
Route::resource('videos', VideoController::class)->only(['index', 'show']);
Route::resource('publications', PublicationController::class)->only(['index']);
Route::resource('topics', TopicController::class)->only(['index', 'show']);

Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/dashboard', fn () => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

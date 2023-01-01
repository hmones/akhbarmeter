<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::resource('contact', ContactController::class)->only(['index', 'store']);
Route::resource('videos', VideoController::class)->only(['index', 'show']);
Route::resource('publications', PublicationController::class)->only(['index']);
Route::resource('topics', TopicController::class)->only(['index', 'show']);
Route::resource('articles', ArticleController::class)->only('index', 'show');
Route::resource('publishers', PublisherController::class)->only('index', 'show');

Route::get('/', fn() => view('welcome'))->name('home');
Route::get('about', fn() => view('pages.about.main'))->name('about');
Route::get('akhbarmeter', fn() => view('pages.about.akhbarmeter'))->name('akhbarmeter');
Route::get('methodology', fn() => view('pages.about.methodology'))->name('methodology');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('reviews/{article}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

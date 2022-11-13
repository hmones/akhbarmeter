<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

Route::resource('contact', ContactController::class)->only(['index', 'store']);
Route::resource('videos', VideoController::class)->only(['index', 'show']);

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::group(['prefix' => 'admin-panel'], function () {
    Voyager::routes();
});

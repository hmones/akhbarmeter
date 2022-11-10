<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

Route::resource('contact', ContactController::class)->only(['index', 'store']);

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::group(['prefix' => 'admin-panel'], function () {
    Voyager::routes();
});

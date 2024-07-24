<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\PageController::class, 'index'])->name('home');

Route::prefix('me')->group(function () {
    Route::get('/register', [App\Http\Controllers\PageController::class, 'index']);
    Route::get('/subscriptions', [App\Http\Controllers\PageController::class, 'subscriptions']);
    Route::get('/reservar', [App\Http\Controllers\PageController::class, 'index']);
});

Route::prefix('support')->group(function () {
    Route::get('/contact', [App\Http\Controllers\PageController::class, 'index']);
});

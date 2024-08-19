<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


//Route::group(['prefix' => 'auth'], function () {
//    Route::post('/login', [LoginController::class, 'login']);
//});
//

Route::prefix('assinatura')->group(function () {
    Route::post('/criar', [App\Http\Controllers\AssinaturaController::class, 'assinar']);
    Route::post('/cancelar', [App\Http\Controllers\AssinaturaController::class, 'cancelar']);
    Route::get('/sucesso', [App\Http\Controllers\AssinaturaController::class, 'success']);
    Route::get('/failed', [App\Http\Controllers\AssinaturaController::class, 'error']);
});

Route::prefix('me')->group(function () {
    Route::post('/reservar', [App\Http\Controllers\ReservaController::class, 'reservar']);
});

//
//
//Route::group(['middleware' => 'auth:api'], function () {
//    Route::post('/auth/logout', [LoginController::class, 'logout']);
//});

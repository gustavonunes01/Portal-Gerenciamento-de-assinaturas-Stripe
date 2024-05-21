<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Common\PaisController;


Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [LoginController::class, 'login']);
});


Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/auth/logout', [LoginController::class, 'logout']);
    
    Route::apiResource('paises', PaisController::class);

});

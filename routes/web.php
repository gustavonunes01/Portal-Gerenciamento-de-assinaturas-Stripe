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


//
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('home');
Route::get('/sucesso', [App\Http\Controllers\PageController::class, 'sucesso'])->name('sucesso');


Route::prefix('admin')->group(function () {
    Route::get('/cadastrados', [App\Http\Controllers\PageController::class, 'cadastros'])->name("admin-cadastro");
    Route::get('/reservas', [App\Http\Controllers\PageController::class, 'reservas_admin'])->name("admin-reservas");
    Route::get('/cadastrados-stripe', [App\Http\Controllers\PageController::class, 'cadastros_stripe'])->name("admin-cadastro-stripe");

    Route::get('/api-cadastrados/all/json', [App\Http\Controllers\UsuariosController::class, 'listAll'])->name("api-list-ll-cadastros");
    Route::get('/api-cadastrados/stripe/all/json', [App\Http\Controllers\UsuariosController::class, 'listAllSubscriptions'])->name("api-stripe-cadastros");
    Route::get('/api-reservas/all/json', [App\Http\Controllers\ReservaController::class, 'adminReservasList'])->name("api-reservas-list-all");
});


Route::prefix('me')->group(function () {
    Route::get('/register', [App\Http\Controllers\UsuariosController::class, 'editUser'])->name("cadastro");
    Route::get('/subscriptions', [App\Http\Controllers\PageController::class, 'subscriptions'])->name("minhas_assinaturas");
    Route::get('/reservar', [App\Http\Controllers\PageController::class, 'reservar'])->name("reservar");

    Route::put('/register', [App\Http\Controllers\UsuariosController::class, 'updateUser'])->name("cadastro_update_user");
});

Route::prefix('support')->group(function () {
    Route::get('/contact', [App\Http\Controllers\PageController::class, 'index'])->name("contact");
});

Route::prefix('api-me')->group(function () {
    Route::post('/cadeiras-disponiveis', [App\Http\Controllers\ReservaController::class, 'cadeiras'])->name("api-cadeiras");
    Route::post('/cadeira-disponivel/{cadeira_id}', [App\Http\Controllers\ReservaController::class, 'cadeiraMostrarHorarios'])->name("api-cadeira-disponival");
    Route::post('/cadeira-disponivel-na-semana/{cadeira_id?}', [App\Http\Controllers\ReservaController::class, 'cadeiraMostrarHorariosSemenal'])->name("api-cadeira-disponivel-na-semana");
    Route::post('/reservar', [App\Http\Controllers\ReservaController::class, 'reservar'])->name("api-cadeira-reservar");
});

Route::prefix('api-assinatura')->group(function () {
    Route::post('/criar', [App\Http\Controllers\AssinaturaController::class, 'assinar'])->name("sub-new");
    Route::post('/cancelar', [App\Http\Controllers\AssinaturaController::class, 'cancelar'])->name("sub-cancelar");
    Route::get('/sucesso', [App\Http\Controllers\AssinaturaController::class, 'success'])->name("sub-sucesso");
    Route::get('/failed', [App\Http\Controllers\AssinaturaController::class, 'error'])->name("sub-failed");
});

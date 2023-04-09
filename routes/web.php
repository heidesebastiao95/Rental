<?php

use App\Http\Controllers\CarrosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ReservasController;
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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/',function(){
        return "Navega em 127.0.0.1/painel";
    });
    
    Route::get('/painel', function () {
        return view('painel.home');
    })->name('painel');
    Route::resource('/funcionarios',FuncionarioController::class);
    Route::resource('/reservas',ReservasController::class);
    Route::resource('/categorias',CategoriasController::class);
    Route::resource('/carros',CarrosController::class);
    Route::resource('/clientes',ClienteController::class);
    Route::get('pesquisar-carros',[CarrosController::class,'pesquisar'])->name('carros.pesquisar');
});

<?php

use App\Http\Controllers\CarrosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\PagamentosController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\Web\CarrosController as WebCarrosController;
use App\Http\Controllers\Web\ContactoController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ServicosController;
use App\Http\Controllers\Web\SobreController;
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

    Route::get('/',function (){
        return redirect()->route('home');
    });

    Route::get('/home',[HomeController::class,'index'])->name('home');
    Route::get('/servicos',[ServicosController::class,'servicos'])->name('servicos');
    Route::get('/carros',[WebCarrosController::class,'index'])->name('carros');
    Route::get('/sobre',[SobreController::class,'sobre'])->name('sobre');
    Route::get('/contacto',[ContactoController::class,'contacto'])->name('contacto');
    Route::post('/enviar-mensagem',[MensagemController::class,'enviar_mensagem'])->name('enviar.mensagem');
    ////admin rotas
    Route::group(['prefix'=> 'admin'],function(){
        Route::get('/painel',[PainelController::class,'index'])->name('painel');
        Route::resource('/funcionarios',FuncionarioController::class);
        Route::resource('/reservas',ReservasController::class);
        Route::resource('/categorias',CategoriasController::class);
        Route::resource('/carros',CarrosController::class);
        Route::resource('/clientes',ClienteController::class);
        Route::get('pesquisar-carros',[CarrosController::class,'pesquisar'])->name('carros.pesquisar');
        Route::resource('/pagamentos',PagamentosController::class);
        Route::get('/pagamentos/{id}/anexo',[PagamentosController::class,'anexo'])->name('pagamentos.anexo');
        Route::put('/pagamento/{id}/atualizar',[PagamentosController::class,'atualizar'])->name('pagamentos.atualizar');
    });
    
});

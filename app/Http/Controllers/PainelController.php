<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Models\Pagamento;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;

class PainelController extends Controller
{
    public function index()
    {
        $cleintesCount = User::where('role','cliente')->count();
        $reservasCount = Reserva::all()->count();
        $carrosCount = Carro::all()->count();
        $pagamentos = Pagamento::where('estado','validado')->sum('quantia');

        return view('painel.home',[
            'clientes' => $cleintesCount,
            'reservas' => $reservasCount,
            'carros' => $carrosCount,
            'pagamento' => $pagamentos
        ]);
    }
}

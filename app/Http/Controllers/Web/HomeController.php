<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Carro;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $carros = Carro::all();

        return view('web.home',[
            'carros' => $carros,
            'cover'=> [
                'titulo' => 'Rent-Fácil',
                'descricao' => 'Dirija com confiança - alugue conosco!'
            ]
        ]);
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Carro;
use Illuminate\Http\Request;

class CarrosController extends Controller
{
    public function index()
    {
        $carros = Carro::all();

        return view('web.carros',[
            'carros' => $carros,
            'cover'=> [
                'titulo' => 'Carros',
                'descricao' => 'Verifeque nossos Carros!'
            ]
        ]);
    }

    public function detalheCarro($id)
    {
        $carro = Carro::find($id);
        return view('web.detalhe-carro',[
            'cover'=> [
                'titulo' => 'Carros',
                'descricao' => 'Verifeque nossos Carros!'
            ],
            'carro' => $carro
        ]);
    }
}

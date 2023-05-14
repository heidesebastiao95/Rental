<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicosController extends Controller
{
    public function servicos()
    {
        return view('web.servicos',[
            'cover'=> [
                'titulo' => 'Serviços',
                'descricao' => 'Nossos Serviços de Qualidade Para Você!'
            ]
        ]);
    }
}

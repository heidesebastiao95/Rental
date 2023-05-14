<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SobreController extends Controller
{
    public function sobre()
    {
        $equipa = \App\Models\User::where('role','funcionario')->orWhere('role','admin')->get();
        return view('web.sobre',[
            'cover'=> [
                'titulo' => 'Sobre',
                'descricao' => 'Saiba Mais sobre nós!'
            ],
            'equipa' => $equipa
        ]);
    }
}

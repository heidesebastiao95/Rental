<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function contacto()
    {
        return view('web.contacto',[
            'cover'=> [
                'titulo' => 'Contacto',
                'descricao' => 'Nossa linha está 24/24!'
            ]
        ]);
    }
}

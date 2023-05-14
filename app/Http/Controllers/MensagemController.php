<?php

namespace App\Http\Controllers;

use App\Models\Mensagem;
use Illuminate\Http\Request;

class MensagemController extends Controller
{
    public function enviar_mensagem(Request $request)
    {
        $nome = $request->primeiro_nome . $request->segundo_nome;
        $email = $request->email;
        $mensagem = $request->mensagem;

        Mensagem::create([
            'nome' => $nome,
            'email' => $email,
            'mensagem' => $mensagem
        ]);

        return redirect()->back();
    }
}

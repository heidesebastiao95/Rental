<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Carro;
use App\Models\Pagamento;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagamentoController extends Controller
{
    public function pagamento(Request $request)
    {
        $request->validate([
            'banco' => 'required',
            'anexo' => 'required|file', // Exemplo de validação de campo obrigatório e arquivo
        ]);
        
        $anexo = $request->file('anexo');
        $nomeAnexo = time().'.'.$anexo->getClientOriginalExtension();
        $caminhoAnexo = public_path('anexos');
        $anexo->move($caminhoAnexo, $nomeAnexo);

        $reserva = Reserva::create([
            'user_id' => Auth::user()->id,
            'carro_id' => $request->carro
        ]);

        Pagamento::create([
            'user_id' => Auth::user()->id,
            'reserva_id' => $reserva->id,
            'banco' => $request->banco,
            'quantia' => Carro::find($request->carro)->preco,
            'anexo' => $nomeAnexo
        ]);

        $reserva->update(['estado' => 'pendente']);
        Carro::where('id',$request->carro)->update(['estado'=> 'reservado']);


        return redirect()->back();
    }
}

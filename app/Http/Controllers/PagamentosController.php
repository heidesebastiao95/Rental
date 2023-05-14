<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;

class PagamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagamentos = Pagamento::all();
        $reservas = Reserva::all();
        $clientes = User::where('role','cliente')->get();

        return view('painel.pagamentos.index',[
            'pagamentos' => $pagamentos,
            'clientes' => $clientes,
            'reservas' => $reservas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $anexo = $request->file('anexo');
        $nomeAnexo = time().'.'.$anexo->getClientOriginalExtension();
        $caminhoAnexo = public_path('anexos');
        $anexo->move($caminhoAnexo, $nomeAnexo);

        Pagamento::create([
            'user_id' => $request->cliente,
            'reserva_id' => $request->reserva,
            'banco' => $request->banco,
            'quantia' => $request->quantia,
            'anexo' => $nomeAnexo
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reservas = Reserva::all();
        $clientes = User::where('role','cliente')->get();
        $pagamento = Pagamento::find($id);

        return view('painel.pagamentos.edit',[
            'reservas' => $reservas,
            'clientes' => $clientes,
            'pagamento' => $pagamento
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $anexo = $request->file('anexo');
        $nomeAnexo = time().'.'.$anexo->getClientOriginalExtension();
        $caminhoAnexo = public_path('anexos');
        $anexo->move($caminhoAnexo, $nomeAnexo);

        Pagamento::where('id',$id)->update([
            'user_id' => $request->cliente,
            'reserva_id' => $request->reserva,
            'banco' => $request->banco,
            'quantia' => $request->quantia,
            'anexo' => $nomeAnexo
        ]);

        return redirect()->back()->with('mensagem','Pagamento actualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pagamento::where('id',$id)->delete();

        return redirect()->back();
    }

    public function anexo($id)
    {
        $pagamento = Pagamento::findOrFail($id);
        $pathToFile = public_path('anexos/'.$pagamento->anexo);
        return response()->file($pathToFile);
    }

    public function atualizar($id)
    {
        $pagamento = Pagamento::find($id);
        $estado = $pagamento->estado;

        switch ($estado) {
            case 'pendente':
                Pagamento::where('id',$id)->update(['estado'=> 'validado']);
                break;
            case 'validado':
                Pagamento::where('id',$id)->update(['estado'=> 'invalidado']);
                break;
            case 'invalidado':
                Pagamento::where('id',$id)->update(['estado'=> 'validado']);
                break;
            default:
                # code...
                break;
        }

        return redirect()->back();
    }
}

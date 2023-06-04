<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = User::where('role','cliente');
        $carros = Carro::where('estado','disponivel')->get();
        $reservas = Reserva::all();
        return view('painel.reservas.index',[
            'clientes' => $clientes,
            'carros' => $carros,
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
        $reserva = Reserva::create($request->all());
        $reserva->carro->update(['estado'=> 'reservado']);

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
        $clientes = User::all();
        $carros = Carro::where('estado','disponivel')->get();
        $reserva = Reserva::find($id);

        return view('painel.reservas.edit',[
            'clientes' => $clientes,
            'carros' => $carros,
            'reserva' => $reserva
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if(Carro::find($request->carro_id)->id === Reserva::find($id)->carro_id){

            Reserva::where('id',$id)->update([
                'user_id' => $request->user_id,
                'carro_id' => $request->carro_id,
                'estado' => $request->estado,
                'destino' => $request->destino,
                'partida' => $request->partida
            ]);
        } else {
            Carro::where('id',$request->carro_id)->update(['estado'=> 'disponivel']);
            
            Reserva::where('id',$id)->update([
                'user_id' => $request->user_id,
                'carro_id' => $request->carro_id,
                'estado' => $request->estado,
                'destino' => $request->destino,
                'partida' => $request->partida
            ]);
        }

        $reserva = Reserva::find($id);

        switch ($request->estado) {
            case 'confirmado':
                $reserva->carro->update(['estado' => 'alugado']);
                break;

            case 'cancelado':
                $reserva->carro->update(['estado' => 'disponivel']);
                break;

            case 'pendente':
                $reserva->carro->update(['estado' => 'reservado']);
                break;
            default:
                # code...
                break;
        }
        

        return redirect()->back()->with('mensagem','Reserva Actualizada Com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reserva = Reserva::find($id);
        $reserva->carro->update(['estado' => 'disponivel']);
        Reserva::where('id',$id)->delete();
        

        return redirect()->back();
    }
}

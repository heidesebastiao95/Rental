<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = User::all();
        return view('painel.clientes.index',[
            'clientes' => $clientes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('painel.clientes.criar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagem = $request->file('foto');
        $nomeImagem = time().'.'.$imagem->getClientOriginalExtension();
        $caminhoImagem = public_path('images');
        $imagem->move($caminhoImagem, $nomeImagem);

        User::create([
            'name'=> $request->nome,
            'email'=> $request->email,
            'sexo' => $request->sexo,
            'bi'=> $request->bi,
            'nascimento'=> $request->nascimento,
            'role'=> 'cliente',
            'password' => Hash::make($request->password),
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'foto'=> $nomeImagem
        ]);

        return redirect()->back()->with('mensagem','Cliente cadastrado com sucesso');
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
        $cliente = User::find($id);
        
        return view('painel.clientes.edit',[
            'cliente' => $cliente
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $imagem = $request->file('foto');
        $nomeImagem = time().'.'.$imagem->getClientOriginalExtension();
        $caminhoImagem = public_path('images');
        $imagem->move($caminhoImagem, $nomeImagem);

        User::where('id',$id)->update([
            'name'=> $request->nome,
            'email'=> $request->email,
            'sexo' => $request->sexo,
            'bi'=> $request->bi,
            'nascimento'=> $request->nascimento,
            'role'=> 'cliente',
            'password' => Hash::make($request->password),
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'foto'=> $nomeImagem
        ]);

        return redirect()->back()->with('mensagem','Cliente actualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id',$id)->delete();

        return redirect()->back();
    }
}

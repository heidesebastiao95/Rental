<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('painel.categorias.index',[
            'categorias' => $categorias
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
       Categoria::create($request->all());

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
        $categoria = Categoria::find($id);
        return view('painel.categorias.edit',[
            'categoria'=> $categoria
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Categoria::where('id',$id)->update([
            'nome'=> $request->nome,
            'n_portas'=> $request->n_portas,
            'n_passageiros'=> $request->n_passageiros,
            'descricao' =>$request->descricao
        ]);

        return redirect()->back()->with('mensagem','Categoria Actualizada Com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categoria::where('id',$id)->delete();

        return redirect()->back();
    }
}

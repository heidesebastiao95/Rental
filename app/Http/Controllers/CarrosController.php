<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CarrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        $carros = Carro::all();
        return view('painel.carros.index',[
            'categorias' => $categorias,
            'carros' => $carros
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
       $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categoria' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'matricula' => 'required',
            'preco' => 'required|numeric',
        ]);

        $imagem = $request->file('foto');
        $nomeImagem = time().'.'.$imagem->getClientOriginalExtension();
        $caminhoImagem = public_path('images');
        $imagem->move($caminhoImagem, $nomeImagem);

        Carro::create([
            'categoria_id'=> $request->categoria,
            'marca'=> $request->marca,
            'modelo' => $request->modelo,
            'matricula'=> $request->matricula,
            'preco' => $request->preco,
            'foto' => $nomeImagem
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
        $categorias = Categoria::all();
        $carro = Carro::find($id);
        return view('painel.carros.edit',[
            'categorias' => $categorias,
            'carro' => $carro
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categoria' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'matricula' => 'required',
            'preco' => 'required|numeric',
        ]);
        
        $imagem = $request->file('foto');
        $nomeImagem = time().'.'.$imagem->getClientOriginalExtension();
        $caminhoImagem = public_path('images');
        $imagem->move($caminhoImagem, $nomeImagem);

        Carro::where('id',$id)->update([
            'categoria_id'=> $request->categoria,
            'marca'=> $request->marca,
            'modelo' => $request->modelo,
            'matricula'=> $request->matricula,
            'preco' => $request->preco,
            'foto' => $nomeImagem
        ]);

        return redirect()->back()->with('mensagem','Carro Actualizado Com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Carro::where('id',$id)->delete();

        return redirect()->back();
    }

    public function pesquisar(Request $request) 
    {
        $categorias = Categoria::all();
        $carros = Carro::where('marca','like','%'.$request->carro.'%')->get();

        return view('painel.carros.index',[
            'carros' => $carros,
            'categorias' => $categorias
        ]);
    }
}

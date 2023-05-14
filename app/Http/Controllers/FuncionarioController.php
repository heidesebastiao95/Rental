<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = User::where('role','funcionario')->orWhere('role','admin')->get();
        return view('painel.usuarios.index',[
            'funcionarios' => $funcionarios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('painel.usuarios.criar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if(!empty($request->file('foto')))
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
                'role'=> 'funcionario',
                'password' => Hash::make($request->password),
                'endereco' => $request->endereco,
                'telefone' => $request->telefone,
                'foto'=> $nomeImagem
            ]);

            return redirect()->back()->with('mensagem','Funcionário cadastrado com sucesso');
        }

        User::create([
            'name'=> $request->nome,
            'email'=> $request->email,
            'sexo' => $request->sexo,
            'bi'=> $request->bi,
            'nascimento'=> $request->nascimento,
            'role'=> 'funcionario',
            'password' => Hash::make($request->password),
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
        ]);

        return redirect()->back()->with('mensagem','Funcionário cadastrado com sucesso');
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
        $funcionario = User::find($id);
        
        return view('painel.usuarios.edit',[
            'funcionario' => $funcionario
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!empty($request->file('foto')))
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
                'role'=> 'funcionario',
                'password' => Hash::make($request->password),
                'endereco' => $request->endereco,
                'telefone' => $request->telefone,
                'foto'=> $nomeImagem
            ]);

            return redirect()->back()->with('mensagem','Funcionário actualizado com sucesso');
        }


        User::where('id',$id)->update([
            'name'=> $request->nome,
            'email'=> $request->email,
            'sexo' => $request->sexo,
            'bi'=> $request->bi,
            'nascimento'=> $request->nascimento,
            'role'=> 'funcionario',
            'password' => Hash::make($request->password),
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
        ]);

        return redirect()->back()->with('mensagem','Funcionário actualizado com sucesso');
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

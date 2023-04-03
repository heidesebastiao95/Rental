@extends('painel.layout.app')
@section('titulo')
    @include('painel.componentes.header-content',[
        'titulo'=> 'Painel',
        //'botao'=> ['texto'=> 'Novo Funcionário','icone'=>'plus','rota'=> 'funcionario.create']
    ])
@endsection
@section('main')
<h2>Heide Gruenst</h2>
@endsection
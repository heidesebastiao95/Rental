@extends('painel.layout.app')
@section('titulo')
    @include('painel.componentes.header-content',[
        'titulo'=> 'Painel',
        'botao'=> true, 
        'texto'=> 'Novo Painel',
        'rota' => 'nome'
    ])
@endsection
@section('main')
<h2>Heide Gruenst</h2>
@endsection
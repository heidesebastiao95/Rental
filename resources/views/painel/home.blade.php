@extends('painel.layout.app')
@section('titulo')
    @include('painel.componentes.header-content',[
        'titulo'=> 'Painel',
        //'botao'=> ['texto'=> 'Novo Funcionário','icone'=>'plus','rota'=> 'funcionario.create']
    ])
@endsection
@section('main')
<div class="nk-block">
    <div class="row g-gs">
        <div class="card">
            <h2>Seja bem Vindo ao Rental</h2>
        </div>
    </div>
</div>
@endsection
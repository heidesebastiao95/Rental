@extends('painel.layout.app')
@section('titulo')
    @include('painel.componentes.header-content',[
        'titulo'=> 'Painel',
        'botao'=> ['texto'=> 'Voltar','icone'=>'arrow-left','rota'=> 'categorias.index']
    ])
@endsection
@section('main')
<div class="nk-block nk-block-lg">
    <div class="card">
        <div class="card-inner">
            <form method="POST" action="{{ route('categorias.update',$categoria->id) }}"  class="form-validate">
                @method('PUT')
                @csrf
               
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title">Editar Categoria</h5>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="product-title">Nome</label>
                                <div class="form-control-wrap">
                                    <input type="text" value="{{ $categoria->nome }}" name="nome" class="form-control" id="product-title">
                                </div>
                            </div>
                        </div>
                        <div class="col-mb-6">
                            <div class="form-group">
                                <label class="form-label" for="sale-price">Nª Portas</label>
                                <div class="form-control-wrap">
                                    <input type="number" value="{{ $categoria->n_portas }}" name="n_portas" class="form-control" id="sale-price">
                                </div>
                            </div>
                        </div>
                        <div class="col-mb-6">
                            <div class="form-group">
                                <label class="form-label" for="sale-price">Nª Passageiros</label>
                                <div class="form-control-wrap">
                                    <input type="number" value="{{ $categoria->n_passageiros }}" name="n_passageiros" class="form-control" id="sale-price">
                                </div>
                            </div>
                        </div>
                        <div class="col-mb-6">
                            <div class="form-group">
                                    <label class="form-label" for="regular-price">Descrição</label>
                                    <div class="form-control-wrap">
                                        <textarea name="descricao" class="form-control no-resize" id="default-textarea">{{ $categoria->descricao }}</textarea>
                                    </div>
                                </div>
                        </div>
                        
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Salvar</span></button>
                        </div>
            </form>
            @if(session()->has('mensagem'))
                @include('painel.componentes.alert',[
                    'alert'=> [
                        'tipo'=>'success',
                        'icon'=> 'check-circle',
                        'mensagem'=> session('mensagem')
                    ]
                ])
            @endif
        </div>
    </div>
@endsection
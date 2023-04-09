@extends('painel.layout.app')
@section('titulo')
    @include('painel.componentes.header-content',[
        'titulo'=> 'Actualizar Carro',
        'botao'=> ['texto'=> 'Voltar','icone'=>'arrow-left','rota'=> 'carros.index']
    ])
@endsection
@section('main')
<div class="nk-block nk-block-lg">
    <div class="card">
        <div class="card-inner">
<form method="POST" action="{{ route('carros.update',$carro->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="nk-block">
    <div class="row g-3">
        <div class="col-12">
            <div class="form-group">
                <label class="form-label" for="product-title">Marca</label>
                <div class="form-control-wrap">
                    <input value="{{ $carro->marca }}" type="text" name="marca" class="form-control" id="product-title">
                </div>
            </div>
        </div>
        <div class="col-mb-6">
            <div class="form-group">
                <label class="form-label" for="sale-price">Nª Matricula</label>
                <div class="form-control-wrap">
                    <input value="{{ $carro->matricula }}" type="text" name="matricula" class="form-control" id="sale-price">
                </div>
            </div>
        </div>
        <div class="col-mb-6">
            <div class="form-group">
                <label class="form-label" for="sale-price">Modelo</label>
                <div class="form-control-wrap">
                    <input value="{{ $carro->modelo }}" type="text" name="modelo" class="form-control" id="sale-price">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Categoria</label>
            <div class="form-control-wrap">
                <select name="categoria" class="form-select js-select2" data-search="on">
                    <option value="{{ $carro->categoria->id }}">{{ $carro->categoria->nome }}</option>
                    @isset($categorias)
                        @foreach ($categorias as $categoria)
                            @if (!$carro->categoria->id === $categoria->id)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endif
                        @endforeach
                    @endisset
                </select>
            </div>
        </div>
        <div class="col-mb-6">
            <div class="form-group">
                <label class="form-label" for="sale-price">Preço</label>
                <div class="form-control-wrap">
                    <input type="number" name="preco" class="form-control" id="sale-price" min="0" value="{{ $carro->preco }}">
                </div>
            </div>
        </div>

        <div class="col-mb-6">
            <div class="form-group">
                <label class="form-label" for="sale-price">Foto</label>
                <div class="form-control-wrap">
                    <input type="file" name="foto" class="form-control" id="sale-price" value="{{ $carro->foto }}">
                </div>
            </div>
        </div>
        
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Salvar</span></button>
        </div>
        
    </div>
</div><!-- .nk-block -->
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
</div>
@endsection
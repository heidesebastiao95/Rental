@extends('painel.layout.app')
@section('titulo')
    @include('painel.componentes.header-content',[
        'titulo'=> 'Carros',
        'botao'=> ['texto'=> 'Novo Carro','icone'=>'plus','rota'=> 'funcionario.create'],
        'data_target' => ['form'=> 'addCar'],
        'search' => true
    ])
@endsection
@section('main')
<div class="nk-block">
    <div class="row g-gs">
        @foreach ($carros as $carro)
        <div class="col-xxl-3 col-lg-4 col-sm-6">
            <div class="card card-bordered product-card">
                <div class="product-thumb">
                    <a href="#">
                        <img class="card-img-top" src="{{ asset('images/'.$carro->foto) }}" alt="">
                    </a>
                    <ul class="product-badges">
                        <li><span class="badge bg-success">Novo</span></li>
                    </ul>
                    <ul class="product-actions">
                        <li><a href="{{ route('carros.edit',$carro->id) }}"><em class="icon ni ni-pen"></em></a></li>
                        <form action="{{ route('carros.destroy',$carro->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <li><a href="#" onclick="event.preventDefault(); this.closest('form').submit();"><em class="icon ni ni-trash"></em></a></li>
                        </form>
                        
                    </ul>
                </div>
                <div class="card-inner text-center">
                    <h5 class="product-title"><a href="#">{{ $carro->marca }}</a></h5>
                    <div class="product-price text-primary h5"> {{ $carro->preco }}kz/dia</div>
                    <ul class="product-tags">
                        <li><a href="#"></a>Modelo : {{ $carro->modelo }}</li>
                    </ul>
                    <ul>
                        @switch($carro->estado)
                            @case('disponivel')
                                    <li><span class="badge bg-success">Disponivel</span></li>
                                @break
                            @case('reservado')
                                    <li><span class="badge bg-warning">Reservado</span></li>
                                @break
                                @case('alugado')
                                    <li><span class="badge bg-danger">Alugado</span></li>
                                @break
                            @default
                                
                        @endswitch
                    </ul>
                </div>
            </div>
        </div><!-- .col -->
        @endforeach
    </div>
</div><!-- .nk-block -->


<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addCar" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <form method="POST" action="{{ route('carros.store') }}" enctype="multipart/form-data">
        @csrf
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">Novo Carro</h5>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="row g-3">
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="product-title">Marca</label>
                    <div class="form-control-wrap">
                        <input type="text" name="marca" class="form-control" id="product-title">
                    </div>
                </div>
            </div>
            <div class="col-mb-6">
                <div class="form-group">
                    <label class="form-label" for="sale-price">Nª Matricula</label>
                    <div class="form-control-wrap">
                        <input type="text" name="matricula" class="form-control" id="sale-price">
                    </div>
                </div>
            </div>
            <div class="col-mb-6">
                <div class="form-group">
                    <label class="form-label" for="sale-price">Modelo</label>
                    <div class="form-control-wrap">
                        <input type="text" name="modelo" class="form-control" id="sale-price">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Categoria</label>
                <div class="form-control-wrap">
                    <select name="categoria" class="form-select js-select2" data-search="on">
                        @isset($categorias)
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
            </div>
            <div class="col-mb-6">
                <div class="form-group">
                    <label class="form-label" for="sale-price">Preço</label>
                    <div class="form-control-wrap">
                        <input type="number" name="preco" class="form-control" id="sale-price" min="0" value="00">
                    </div>
                </div>
            </div>

            <div class="col-mb-6">
                <div class="form-group">
                    <label class="form-label" for="sale-price">Foto</label>
                    <div class="form-control-wrap">
                        <input type="file" name="foto" class="form-control" id="sale-price">
                    </div>
                </div>
            </div>
            
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Salvar</span></button>
            </div>
            
        </div>
    </div><!-- .nk-block -->
</form>
</div>
<div class="mt-4">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Prev</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
        <li class="page-item"><a class="page-link" href="#">6</a></li>
        <li class="page-item"><a class="page-link" href="#">7</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
    </div>
@endsection

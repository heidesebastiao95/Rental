@extends('painel.layout.app')
@section('titulo')
    @include('painel.componentes.header-content',[
        'botao'=> ['texto'=> 'Voltar','icone'=>'arrow-left','rota'=> 'reservas.index'],
        'titulo'=> 'Editar Reserva',
    ])
@endsection
@section('main')
<div class="nk-block nk-block-lg">
    <div class="card">
        <div class="card-inner">
            <form method="POST" action="{{ route('reservas.update',$reserva->id) }}">
                @csrf
                @method('PUT')
            
            <div class="nk-block">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="product-title">Partida</label>
                            <div class="form-control-wrap">
                                <input value="{{ $reserva->partida }}" type="text" name="partida" class="form-control" id="product-title">
                            </div>
                        </div>
                    </div>
                    <div class="col-mb-6">
                        <div class="form-group">
                            <label class="form-label" for="sale-price">Destino</label>
                            <div class="form-control-wrap">
                                <input value="{{ $reserva->destino }}" type="text" name="destino" class="form-control" id="sale-price">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Cliente</label>
                        <div class="form-control-wrap">
                            <select name="user_id" class="form-select js-select2" data-search="on">
                                <option value="{{ $reserva->cliente->id }}">{{ $reserva->cliente->name }}</option>
                                @isset($clientes)
                                    @foreach ($clientes as $cliente)
                                        @if (!($cliente->id === $reserva->cliente->id))
                                            <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                                        @endif
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Carro</label>
                        <div class="form-control-wrap">
                            <select name="carro_id" class="form-select js-select2" data-search="on">
                                <option value="{{ $reserva->carro->id }}">{{ $reserva->carro->marca }}</option>
                                @isset($carros)
                                    @foreach ($carros as $carro)
                                        @if (!($reserva->carro->id === $carro->id))
                                            <option value="{{ $carro->id }}">{{ $carro->marca }}</option>
                                        @endif
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Estado</label>
                        <div class="form-control-wrap">
                            <select name="estado" class="form-select js-select2" data-search="on">
                                @switch($reserva->estado)
                                    @case('pendente')
                                        <option value="pendente">Pendente</option>
                                        <option value="confirmado">Confirmado</option>
                                        <option value="cancelado">Cancelado</option>
                                        @break
                                    @case('confirmado')
                                        <option value="confirmado">Confirmado</option>
                                        <option value="pendente">Pendente</option>
                                        <option value="cancelado">Cancelado</option>
                                        @break
                                    @case('cancelado')
                                        <option value="cancelado">Cancelado</option>
                                        <option value="confirmado">Confirmado</option>
                                        <option value="pendente">Pendente</option>
                                        @break
                                    @default
                                        
                                @endswitch
                            </select>
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
</div><!-- .nk-block -->
@endsection
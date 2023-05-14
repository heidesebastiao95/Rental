@extends('painel.layout.app')
@section('titulo')
    @include('painel.componentes.header-content',[
        'botao'=> ['texto'=> 'Voltar','icone'=>'arrow-left','rota'=> 'pagamentos.index'],
        'titulo'=> 'Editar Pagamento',
    ])
@endsection
@section('main')
<div class="nk-block nk-block-lg">
    <div class="card">
        <div class="card-inner">
            <form method="POST" action="{{ route('pagamentos.update',$pagamento->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
            <div class="nk-block">
                <div class="row g-3">
                    <div class="col-mb-12">
                        <div class="form-group">
                            <label class="form-label">Cliente</label>
                            <div class="form-control-wrap">
                                <select name="cliente" class="form-select js-select2" data-search="on">
                                    <option value="{{ $pagamento->cliente->id }}">{{ $pagamento->cliente->name }}</option>
                                    @isset($clientes)
                                        @foreach ($clientes as $cliente)
                                            @if (!$pagamento->cliente->id === $cliente->id)
                                                <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                                            @endif
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-mb-12">
                        <div class="form-group">
                            <label class="form-label">Reserva</label>
                            <div class="form-control-wrap">
                                <select name="reserva" class="form-select js-select2" data-search="on">
                                    <option value="{{ $pagamento->reserva->id }}">{{ $pagamento->reserva->id }}</option>
                                    @isset($reservas)
                                        @foreach ($reservas as $reserva)
                                            @if (!$pagamento->reserva->id === $reserva->id)
                                                <option value="{{ $reserva->id }}">{{ $reserva->name }}</option>
                                            @endif
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-mb-12">
                        <div class="form-group">
                            <label class="form-label">Banco</label>
                            <div class="form-control-wrap">
                                <select name="banco" class="form-select js-select2" data-search="on">
                                    @switch($pagamento->banco)
                                        @case('BAI')
                                            <option value="BAI">BAI</option>
                                            <option value="BFA">BFA</option>
                                            <option value="Millenium">Millenium</option>
                                            @break
                                        @case('BFA')
                                            <option value="BFA">BFA</option>
                                            <option value="BAI">BAI</option>
                                            <option value="Millenium">Millenium</option>
                                            @break
                                        @case('Millenium')
                                            <option value="Millenium">Millenium</option>
                                            <option value="BFA">BFA</option>
                                            <option value="BAI">BAI</option>
                                            @break
                                        @default
                                            
                                    @endswitch
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-mb-6">
                        <div class="form-group">
                            <label class="form-label" for="sale-price">Quantia</label>
                            <div class="form-control-wrap">
                                <input type="number" value="{{ $pagamento->quantia }}" name="quantia" class="form-control" id="sale-price">
                            </div>
                        </div>
                    </div>
                    <div class="col-mb-6">
                        <div class="form-group">
                            <label class="form-label" for="fv-topics">Anexo</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" id="fv-subject" name="anexo">
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
</div><!-- .nk-block -->
@endsection
@extends('painel.layout.app')
@section('titulo')
    @include('painel.componentes.header-content',[
        'titulo'=> 'Reservas',
        'botao'=> ['texto'=> 'Nova Reserva','icone'=>'plus','rota'=> 'reservas.create'],
        'data_target' => ['form'=> 'addReserva'],
    ])
@endsection
@section('main')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap table  nk-tb-list nk-tb-ulist" data-auto-responsive="false" data-export-title="Export">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col"><span class="sub-text">Cliente</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Carro</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Matricula</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Preço</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Data</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Estado</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                            Ação
                        </th>
                    </tr>
                </thead>
                <tbody>
                   @isset($reservas)
                       @foreach ($reservas as $reserva)
                       <tr class="nk-tb-item">
                        <td class="nk-tb-col">
                            <div class="user-card">
                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                    <span>AB</span>
                                </div>
                                <div class="user-info">
                                    <span class="tb-lead">{{ $reserva->cliente->name }} <span class="dot dot-success d-md-none ms-1"></span></span>
                                    <span>{{ $reserva->cliente->email }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                            <span class="tb-amount">{{ $reserva->carro->marca }} <span class="currency"></span></span>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                            <span class="tb-lead">{{ $reserva->carro->matricula }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                            <span class="tb-lead">{{ $reserva->carro->preco }} kz</span>
                        </td>
                        <td class="nk-tb-col tb-col-lg">
                            <span class="tb-lead">{{ $reserva->created_at }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                            @switch($reserva->estado)
                                @case('pendente')
                                <span class="badge tb-status text-white bg-warning ">Pendente</span>
                                    @break
                                @case('confirmado')
                                <span class="badge tb-status text-white bg-success ">Confirmado</span>
                                    @break
                                @case('cancelado')
                                <span class="badge tb-status text-white bg-danger ">Cancelado</span>
                                    @break
                                @default
                                    
                            @endswitch
                        </td>
                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li class="nk-tb-action-hidden">
                                    <form action="{{ route('reservas.destroy',$reserva->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                            <em class="icon ni ni-trash-fill"></em>
                                        </a>
                                    </form>
                                </li>
                                <li class="nk-tb-action-hidden">
                                    <a href="{{ route('reservas.edit',$reserva->id) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                        <em class="icon ni ni-pen-fill"></em>
                                    </a>
                                </li>
                            </ul>
                        </td>
                    </tr><!-- .nk-tb-item  -->
                       @endforeach
                   @endisset
                    
                </tbody>
            </table>
        </div>
    </div><!-- .card-preview -->

    <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addReserva" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
        <form method="POST" action="{{ route('reservas.store') }}">
            @csrf
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Novo Carro</h5>
            </div>
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="row g-3">
                {{-- <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Partida</label>
                        <div class="form-control-wrap">
                            <input type="text" name="partida" class="form-control" id="product-title">
                        </div>
                    </div>
                </div>
                <div class="col-mb-6">
                    <div class="form-group">
                        <label class="form-label" for="sale-price">Destino</label>
                        <div class="form-control-wrap">
                            <input type="text" name="destino" class="form-control" id="sale-price">
                        </div>
                    </div>
                </div> --}}
                <div class="form-group">
                    <label class="form-label">Cliente</label>
                    <div class="form-control-wrap">
                        <select name="user_id" class="form-select js-select2" data-search="on">
                            @isset($clientes)
                                @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Carro</label>
                    <div class="form-control-wrap">
                        <select id="carro" name="carro_id" class="form-select js-select2" data-search="on">
                            @isset($carros)
                                @foreach ($carros as $carro)
                                <option marca = "{{ $carro->marca }}" modelo = "{{ $carro->modelo }}" value="{{ $carro->id }}">{{ $carro->marca }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="product-title">Marca</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="carro-marca" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="product-title">Modelo</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="carro-modelo" readonly>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Salvar</span></button>
                </div>
                @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                
            </div>
        </div><!-- .nk-block -->
    </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectCarro = document.querySelector('#carro');
            var inputMarca = document.querySelector('#carro-marca');
            var inputModelo = document.querySelector('#carro-modelo');

            selectCarro.onchange = function() {
            var selectedOption = selectCarro.options[selectCarro.selectedIndex];
            var marca = selectedOption.getAttribute('marca');
            var modelo = selectedOption.getAttribute('modelo');

            inputMarca.value = marca;
            inputModelo.value = modelo;
        };
    });
    </script>
@endsection
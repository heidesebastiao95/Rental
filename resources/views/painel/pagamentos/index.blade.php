@extends('painel.layout.app')
@section('titulo')
    @include('painel.componentes.header-content',[
        'titulo'=> 'Pagamento',
        'botao'=> ['texto'=> 'Novo Pagamento','icone'=>'plus','rota'=> '#'],
        'data_target' => ['form'=> 'addPagamento']
    ])
@endsection
@section('main')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap table  nk-tb-list nk-tb-ulist" data-auto-responsive="false" data-export-title="Export">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Cliente</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Banco</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Quantia</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Estado</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Anexo</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                            Ação
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pagamentos as $pagamento)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                            <span class="tb-amount">{{ $pagamento->cliente->name }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                            <span>{{ $pagamento->banco }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                            <span>{{ $pagamento->quantia }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                            @switch($pagamento->estado)
                                @case('pendente')
                                <span class="badge tb-status text-white bg-warning ">Pendente</span>
                                    @break
                                @case('validado')
                                <span class="badge tb-status text-white bg-success ">Validado</span>
                                    @break
                                @case('invalidado')
                                <span class="badge tb-status text-white bg-danger ">Invalidado</span>
                                    @break
                                @default
                                    
                            @endswitch
                        </td>
                        <td class="nk-tb-col tb-col-lg">
                            <a href="{{ route('pagamentos.anexo',$pagamento->id) }}" target="_blank" rel="noopener noreferrer">
                                <span class="tb-amount"><h6><em class="icon ni ni-file"></em></h6></span>
                            </a>
                        </td>
                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li class="nk-tb-action-hidden">
                                    <form method="POST" action="{{ route('pagamentos.destroy',$pagamento->id) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                            <em class="icon ni ni-trash"></em>
                                        </button>
                                    </form>
                                </li>
                                <li class="nk-tb-action-hidden">
                                    <form method="POST" action="{{ route('pagamentos.atualizar',$pagamento->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Atualizar">
                                        @switch($pagamento->estado)
                                            @case('validado')
                                            <em class="icon ni ni-cross"></em>
                                                @break
                                            @case('invalidado')
                                                <em class="icon ni ni-check"></em>
                                                @break

                                            @case('pendente')
                                                <em class="icon ni ni-check"></em>
                                                @break
                                            @default
                                                
                                        @endswitch
                                        </button>
                                    </form>
                                </li>
                                <li class="nk-tb-action-hidden">
                                    <a href="{{ route('pagamentos.edit',$pagamento->id) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                        <em class="icon ni ni-pen-fill"></em>
                                    </a>
                                </li>
                            </ul>
                        </td>
                    </tr><!-- .nk-tb-item  -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- .card-preview -->

    <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addPagamento" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
        <form method="POST" action="{{ route('pagamentos.store') }}" enctype="multipart/form-data">
            @csrf
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Novo pagamento</h5>
            </div>
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="row g-3">
                <div class="col-mb-6">
                    <div class="form-group">
                        <label class="form-label">Cliente</label>
                        <div class="form-control-wrap">
                            <select name="cliente" class="form-select js-select2" data-search="on">
                                @isset($clientes)
                                    @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-mb-6">
                    <div class="form-group">
                        <label class="form-label">Reserva</label>
                        <div class="form-control-wrap">
                            <select name="reserva" class="form-select js-select2" data-search="on">
                                @isset($reservas)
                                    @foreach ($reservas as $reserva)
                                    <option value="{{ $reserva->id }}">{{ $reserva->id }}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-mb-6">
                    <div class="form-group">
                        <label class="form-label">Banco</label>
                        <div class="form-control-wrap">
                            <select name="banco" class="form-select js-select2" data-search="on">
                                <option value="BAI">BAI</option>
                                <option value="BFA">BFA</option>
                                <option value="Millenium">Millenium</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-mb-6">
                    <div class="form-group">
                        <label class="form-label" for="sale-price">Quantia</label>
                        <div class="form-control-wrap">
                            <input type="number" name="quantia" class="form-control" id="sale-price">
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
@endsection
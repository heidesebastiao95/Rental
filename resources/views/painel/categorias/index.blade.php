@extends('painel.layout.app')
@section('titulo')
    @include('painel.componentes.header-content',[
        'titulo'=> 'Painel',
        'botao'=> ['texto'=> 'Nova Categoria','icone'=>'plus','rota'=> 'funcionario.create'],
        'data_target' => ['form'=> 'addProduct']
    ])
@endsection
@section('main')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap table  nk-tb-list nk-tb-ulist" data-auto-responsive="false" data-export-title="Export">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Nome</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Portas</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Passageiros</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Descrição</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                            Ação
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                            <span class="tb-amount">{{ $categoria->nome }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                            <span>{{ $categoria->n_portas }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                            <span>{{ $categoria->n_passageiros }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-lg">
                            <span>{{ $categoria->descricao }}</span>
                        </td>
                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li class="nk-tb-action-hidden">
                                    <form method="POST" action="{{ route('categorias.destroy',$categoria->id) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                            <em class="icon ni ni-trash"></em>
                                        </button>
                                    </form>
                                </li>
                                <li class="nk-tb-action-hidden">
                                    <a href="{{ route('categorias.edit',$categoria->id) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                        <em class="icon ni ni-pen"></em>
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

    <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
        <form method="POST" action="{{ route('categorias.store') }}">
            @csrf
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Nova Categoria</h5>
            </div>
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Nome</label>
                        <div class="form-control-wrap">
                            <input type="text" name="nome" class="form-control" id="product-title">
                        </div>
                    </div>
                </div>
                <div class="col-mb-6">
                    <div class="form-group">
                        <label class="form-label" for="sale-price">Nª Portas</label>
                        <div class="form-control-wrap">
                            <input type="number" name="n_portas" class="form-control" id="sale-price">
                        </div>
                    </div>
                </div>
                <div class="col-mb-6">
                    <div class="form-group">
                        <label class="form-label" for="sale-price">Nª Passageiros</label>
                        <div class="form-control-wrap">
                            <input type="number" name="n_passageiros" class="form-control" id="sale-price">
                        </div>
                    </div>
                </div>
                <div class="col-mb-6">
                    <div class="form-group">
                            <label class="form-label" for="regular-price">Descrição</label>
                            <div class="form-control-wrap">
                                <textarea name="descricao" class="form-control no-resize" id="default-textarea"></textarea>
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
@endsection
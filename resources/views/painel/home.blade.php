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
            <div class="col-xxl-3 col-sm-6">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Clientes</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <div class="amount">{{ $clientes }}</div>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .nk-ecwg -->
                </div><!-- .card -->
            </div><!-- .col -->

            <div class="col-xxl-3 col-sm-6">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Reservas</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <div class="amount">{{ $reservas }}</div>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .nk-ecwg -->
                </div><!-- .card -->
            </div><!-- .col -->

            <div class="col-xxl-3 col-sm-6">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Carros</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <div class="amount">{{ $carros }}</div>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .nk-ecwg -->
                </div><!-- .card -->
            </div><!-- .col -->
            
            <div class="col-xxl-3 col-sm-6">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Pagamentos</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <div class="amount">{{ $pagamento }} kz</div>
                                    {{-- <div class="nk-ecwg6-ck">
                                        <canvas class="ecommerce-line-chart-s3" id="todayCustomers"></canvas>
                                    </div> --}}
                                </div>
                                {{-- <div class="info"><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>4.63%</span><span> vs. last week</span></div> --}}
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .nk-ecwg -->
                </div><!-- .card -->
            </div><!-- .col -->
    </div>
</div>
@endsection
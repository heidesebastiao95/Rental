@extends('painel.layout.app')
@section('titulo')
    @include('painel.componentes.header-content',[
        'titulo'=> 'Funcionários',
        'botao'=> ['texto'=> 'Novo Funcionário','icone'=>'plus','rota'=> 'funcionarios.create']
    ])
@endsection
@section('main')
<div class="nk-block">
    <div class="row g-gs">
        @foreach ($funcionarios as $funcionario)
        <div class="col-sm-6 col-lg-4 col-xxl-3">
            <div class="card">
                <div class="card-inner">
                    <div class="team">
                        <div class="team-options">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="{{ route('funcionarios.edit',$funcionario->id) }}"><em class="icon ni ni-pen"></em><span>Editar</span></a></li>
                                        <li><a href="{{ route('funcionarios.show',$funcionario->id) }}"><em class="icon ni ni-eye"></em><span>Ver Detalhes</span></a></li>
                                        <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <li><a href="#" onclick="event.preventDefault(); this.closest('form').submit();"><em class="icon ni ni-trash"></em><span>Eliminar</span></a></li>
                                        </form>
                                        
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="user-card user-card-s2">
                            <div class="user-avatar md bg-primary">
                                <img src="{{ asset('images/'.$funcionario->foto) }}" alt="HS">
                                <div class="status dot dot-lg dot-success"></div>
                            </div>
                            <div class="user-info">
                                <h6>{{ $funcionario->name }}</h6>
                                <span class="sub-text">{{ $funcionario->email }}</span>
                            </div>
                        </div>
                        <div class="team-view">
                            <a href="html/user-details-regular.html" class="btn btn-round btn-outline-light w-150px"><span>Ver Perfil</span></a>
                        </div>
                    </div><!-- .team -->
                </div><!-- .card-inner -->
            </div><!-- .card -->
        </div><!-- .col -->
        @endforeach
    </div>
</div><!-- .nk-block -->
@endsection
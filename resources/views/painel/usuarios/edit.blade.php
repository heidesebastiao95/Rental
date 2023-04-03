@extends('painel.layout.app')
@section('titulo')
    @include('painel.componentes.header-content',[
        'botao'=> ['texto'=> 'Voltar','icone'=>'arrow-left','rota'=> 'funcionarios.index'],
        'titulo'=> 'Editar Funcionario',
    ])
@endsection
@section('main')
<div class="nk-block nk-block-lg">
    <div class="card">
        <div class="card-inner">
            <form method="POST" action="{{ route('funcionarios.update',$funcionario->id) }}" enctype="multipart/form-data" class="form-validate">
                @csrf
                @method('PUT')
                <div class="row g-gs">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fv-full-name">Nome Completo</label>
                            <div class="form-control-wrap">
                                <input type="text" value="{{ $funcionario->name }}" class="form-control" id="fv-full-name" name="nome" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fv-email">Email</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-mail"></em>
                                </div>
                                <input type="text" value="{{ $funcionario->email }}" class="form-control" id="fv-email" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fv-phone">Telefone</label>
                            <div class="form-control-wrap">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="fv-phone">+244</span>
                                    </div>
                                    <input type="text" value="{{ $funcionario->telefone }}" class="form-control" name="telefone" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fv-phone">Sexo</label>
                            <div class="form-control-wrap">
                                <ul class="custom-control-group">
                                    @switch($funcionario->sexo)
                                        @case('M')
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input type="radio" value="M" class="custom-control-input" name="sexo" id="sex-male" checked>
                                                <label class="custom-control-label" for="sex-male">Masculino</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input type="radio" value="F" class="custom-control-input" name="sexo" id="sex-female" >
                                                <label class="custom-control-label" for="sex-female">Feminino</label>
                                            </div>
                                        </li>
                                            @break
                                        @case('F')
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input type="radio" value="M" class="custom-control-input" name="sexo" id="sex-male" >
                                                <label class="custom-control-label" for="sex-male">Masculino</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio custom-control-pro no-control">
                                                <input type="radio" value="F" class="custom-control-input" name="sexo" id="sex-female" checked>
                                                <label class="custom-control-label" for="sex-female">Feminino</label>
                                            </div>
                                        </li>
                                            @break
                                        @default
                                            
                                    @endswitch
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fv-subject">Nª Bilhete de Identidade</label>
                            <div class="form-control-wrap">
                                <input type="text" value="{{ $funcionario->bi }}" class="form-control" id="fv-subject" name="bi" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fv-topics">Nascimento</label>
                            <div class="form-control-wrap">
                                <input type="date" value="{{ $funcionario->nascimento }}" class="form-control" id="fv-subject" name="nascimento" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fv-subject">Endereço</label>
                            <div class="form-control-wrap">
                                <input type="text" value="{{ $funcionario->endereco }}" class="form-control" id="fv-subject" name="endereco" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="display: none">
                        <div class="form-group">
                            <label class="form-label" for="fv-subject">Endereço</label>
                            <div class="form-control-wrap">
                                <input type="text" value="12345678" class="form-control" id="fv-subject" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fv-topics">Foto</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" id="fv-subject" name="foto">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="fv-message">Descrição</label>
                            <div class="form-control-wrap">
                                <textarea value="{{ $funcionario->telefone }}" class="form-control form-control-sm" id="fv-message" name="descricao"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Salvar Informações</button>
                        </div>
                    </div>
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
</div><!-- .nk-block -->
@endsection
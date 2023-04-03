@extends('painel.layout.app')
@section('titulo')
    @include('painel.componentes.header-content',[
        'botao'=> ['texto'=> 'Voltar','icone'=>'arrow-left','rota'=> 'funcionarios.index'],
        'titulo'=> 'Adicionar Funcionario',
    ])
@endsection
@section('main')
<div class="nk-block nk-block-lg">
    <div class="card">
        <div class="card-inner">
            <form method="POST" action="{{ route('funcionarios.store') }}" enctype="multipart/form-data" class="form-validate">
                @csrf
                <div class="row g-gs">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fv-full-name">Nome Completo</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="fv-full-name" name="nome" required>
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
                                <input type="text" class="form-control" id="fv-email" name="email" required>
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
                                    <input type="text" class="form-control" name="telefone" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fv-phone">Sexo</label>
                            <div class="form-control-wrap">
                                <ul class="custom-control-group">
                                    <li>
                                        <div class="custom-control custom-radio custom-control-pro no-control">
                                            <input type="radio" value="M" class="custom-control-input" name="sexo" id="sex-male" required>
                                            <label class="custom-control-label" for="sex-male">Masculino</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio custom-control-pro no-control">
                                            <input type="radio" value="F" class="custom-control-input" name="sexo" id="sex-female" required>
                                            <label class="custom-control-label" for="sex-female">Feminino</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fv-subject">Nª Bilhete de Identidade</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="fv-subject" name="bi" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fv-topics">Nascimento</label>
                            <div class="form-control-wrap">
                                <input type="date" class="form-control" id="fv-subject" name="nascimento" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fv-subject">Endereço</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="fv-subject" name="endereco" required>
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
                                <textarea class="form-control form-control-sm" id="fv-message" name="descricao"></textarea>
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
@php
    switch ($carro->estado) {
        case 'alugado':
            $disable = 'disabled';
            break;
        case 'disponivel':
            $disable = '';
            break;
        case 'reservado':
            $disable = 'disabled';
            break;
        default:
    }
@endphp

<div class="col-lg-8 mb-6 card pt-3">
    <form action="{{ route('pagamento.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group row">
            <div class="col-md-6 mb-4 mb-lg-0">
                <label for="">Nome</label>
                <input name="nome" type="text" class="form-control" placeholder="Nome" value="{{ Auth::user()->name ?? '' }}">
            </div>
            <div class="col-md-6">
                <label for="">Nº Bilhete</label>
                <input name="bi" type="text" class="form-control" placeholder="Nº BI" value="{{ Auth::user()->bi ?? '' }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="">Email</label>
                <input name="email" type="text" class="form-control" placeholder="Email" value="{{ Auth::user()->email ?? '' }}">
            </div>
            <div class="col-md-6">
                <label for="">Endereço</label>
                <input name="endereco" type="text" class="form-control" placeholder="Endereço" value="{{ Auth::user()->endereco ?? '' }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="">Nacimento</label>
                <input name="nascimento" type="date" class="form-control" value="{{ Auth::user()->nascimento ?? '' }}">
            </div>
            <div class="col-md-6">
                <label for="">Anexo</label>
                <input name="anexo" type="file" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label>Banco</label>
                <select name="banco" class="form-select form-control">
                    <option value="BAI">BAI</option>
                    <option value="BFA">BFA</option>
                    <option value="Millenium">Millenium</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="">Quantia</label>
                <input name="quantia" type="text" class="form-control" value="{{ $carro->preco/2 }}kz" disabled>
                <input name="carro" type="hidden" class="form-control" value="{{ $carro->id }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mr-auto">
                <input type="submit" class="btn btn-block btn-primary {{ $disable }} text-white py-3 px-5" value="Arrendar" {{ $disable }}>
            </div>
        </div>
    </form>
</div>

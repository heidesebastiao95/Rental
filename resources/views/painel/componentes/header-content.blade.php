
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">{{ $titulo }}</h3>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        @isset ($search)
                       <form action="{{ route('carros.pesquisar') }}" method="GET" class = "form">
                        @csrf
                    
                        <li>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-search" onclick="event.preventDefault(); document.querySelector('.form').submit();"></em>
                                </div>
                                <input name="carro" type="text" class="form-control" id="default-04" placeholder="Pesquisar">
                            </div>
                        </li>
                       </form>
                        @endisset
                        @isset($botao)
                        @if(isset($data_target))
                        <li class="nk-block-tools-opt">
                            <a href="#" data-target="{{ $data_target['form'] }}" class="toggle btn btn-icon btn-primary d-md-none"><em class="icon ni {{ $botao['icone'] }}"></em></a>
                            <a href="#" data-target="{{ $data_target['form'] }}" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-{{ $botao['icone'] }}"></em><span>{{ $botao['texto'] }}</span></a>
                        </li>
                        @else
                        <li class="nk-block-tools-opt">
                            <a href="#" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-{{ $botao['icone'] }}"></em></a>
                            <a href="{{ route($botao['rota']) }}" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-{{  $botao['icone'] }}"></em><span>{{ $botao['texto'] }}</span></a>
                        </li>
                        @endif
                        @endisset
                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->


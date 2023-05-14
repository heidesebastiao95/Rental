<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{ route('painel') }}" class="logo-link nk-sidebar-logo">
                <h2>Rental</h2>
            </a>
        </div>
        <div class="nk-menu-trigger me-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item {{ Route::is('painel')? 'active':'' }}">
                        <a href="{{ route('painel') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-home-fill"></em></span>
                            <span class="nk-menu-text">Home</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item {{ Route::is('funcionarios.*')? 'active':'' }}">
                        <a href="{{ route('funcionarios.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-fill"></em></span>
                            <span class="nk-menu-text">Funcionarios</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item {{ Route::is('reservas.*')? 'active':'' }}">
                        <a href="{{ route('reservas.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-calendar-fill"></em></span>
                            <span class="nk-menu-text">Reservas</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item {{ Route::is('clientes.*')? 'active':'' }}">
                        <a href="{{ route('clientes.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Clientes</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item {{ Route::is('pagamentos.*')? 'active':'' }}">
                        <a href="{{ route('pagamentos.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-coin-alt-fill"></em></span>
                            <span class="nk-menu-text">Pagamentos</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                     <li class="nk-menu-item {{ Route::is('categorias.*')? 'active':'' }}">
                        <a href="{{ route('categorias.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-folder-fill"></em></span>
                            <span class="nk-menu-text">Categorias</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item {{ Route::is('carros.*')? 'active':'' }}">
                        <a href="{{ route('carros.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bulb-fill"></em></span>
                            <span class="nk-menu-text">Carros</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    {{-- <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-setting-fill"></em></span>
                            <span class="nk-menu-text">Definições</span>
                        </a>
                    </li><!-- .nk-menu-item --> --}}
                    <li class="nk-menu-item {{ Route::is('pagina')? 'active':'' }}">
                        <a href="{{ route('home') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-arrow-left"></em></span>
                            <span class="nk-menu-text">Pagina</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->
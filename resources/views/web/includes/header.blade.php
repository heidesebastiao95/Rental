<header class="site-navbar site-navbar-target" role="banner">

    <div class="container">
      <div class="row align-items-center position-relative">

        <div class="col-3 ">
          <div class="site-logo">
            <a href="index.html">Rental</a>
          </div>
        </div>

        <div class="col-9  text-right">
        
          <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

          <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
            <ul class="site-menu main-menu js-clone-nav ml-auto ">
              <li class="{{ (Route::is('home'))? 'active':'' }}"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
              <li class="{{ (Route::is('servicos'))? 'active':'' }}"><a href="{{ route('servicos') }}" class="nav-link">Serviços</a></li>
              <li class="{{ (Route::is('carros'))? 'active':'' }}"><a href="{{ route('carros') }}" class="nav-link">Carros</a></li>
              <li class="{{ (Route::is('sobre'))? 'active':'' }}"><a href="{{ route('sobre') }}" class="nav-link">Sobre</a></li>
              <li class="{{ (Route::is('contacto'))? 'active':'' }}"><a href="{{ route('contacto') }}" class="nav-link">Contacto</a></li>
              @auth
                  @if (Auth::user()->role == 'admin')
                    <li><a href="{{ route('painel') }}" class="nav-link">Painel</a></li>
                  @endif
              @endauth
            </ul>
          </nav>
        </div>

        
      </div>
    </div>

  </header>
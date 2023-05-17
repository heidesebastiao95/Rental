<div class="site-section bg-light">
    <div class="container">
      <div class="row">
       @foreach ($carros as $carro)
       <div class="col-lg-4 col-md-6 mb-4">
        <div class="item-1">
            <a href="#"><img src="{{ asset('images/'.$carro->foto) }}" alt="Image" class="img-fluid"></a>
            <div class="item-1-contents">
              <div class="text-center">
              <h3><a href="#">{{ $carro->marca }} {{ $carro->modelo }}</a></h3>
              <div class="rating">
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
              </div>
              <div class="rent-price"><span>${{ $carro->preco }}/</span>dia</div>
              </div>
              <ul class="specs">
                <li>
                  <span>Categoria</span>
                  <span class="spec">{{ $carro->categoria->nome }}</span>
                </li>
                <li>
                  <span>Portas</span>
                  <span class="spec">{{ $carro->categoria->n_portas }}</span>
                </li>
                <li>
                  <span>Passageiros</span>
                  <span class="spec">{{ $carro->categoria->n_passageiros }}</span>
                </li>
                <li>
                  <span>Matricula</span>
                  <span class="spec">{{ $carro->matricula }}</span>
                </li>
              </ul>
              <div class="d-flex action">
                <a href="{{ route('carro.detalhe',$carro->id) }}" class="btn btn-primary">Aluga já</a>
              </div>
            </div>
          </div>
      </div>
       @endforeach
      </div>
    </div>
  </div>
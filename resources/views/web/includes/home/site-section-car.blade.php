<div class="site-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <h3>Nossas ofertas</h3>
          <p class="mb-4">Estamos entusiasmados em oferecer algumas das melhores ofertas em carros novos e usados para atender às suas necessidades. Com uma ampla seleção de marcas e modelos de qualidade, temos certeza de que você encontrará o carro perfeito para você.</p>
          <p>
            <a href="#" class="btn btn-primary custom-prev">Anterior</a>
            <span class="mx-2">/</span>
            <a href="#" class="btn btn-primary custom-next">Próximo</a>
          </p>
        </div>
        <div class="col-lg-9">
          <div class="nonloop-block-13 owl-carousel">
            @foreach ($carros as $carro)
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
                        <a href="contact.html" class="btn btn-primary">Aluga já</a>
                      </div>
                    </div>
                  </div>
       @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
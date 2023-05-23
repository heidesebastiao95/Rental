<div class="col-lg-4">
  <div class="feature-car-rent-box-1">
    <h3>{{ $carro->marca }}</h3>
    <ul class="list-unstyled">
      <li>
        <span>Modelo</span>
        <span class="spec">{{ $carro->modelo ?? '' }}</span>
      </li>
      <li>
        <span>Matricula</span>
        <span class="spec">{{ $carro->matricula ?? '' }}</span>
      </li>
      <li>
        <span>Categoria</span>
        <span class="spec">{{ $carro->categoria->nome ?? '' }}</span>
      </li>
    </ul>
    <div class="d-flex align-items-center bg-light p-3">
      <span>${{ $carro->preco }}/dia</span>
      <a href="contact.html" class="ml-auto btn btn-primary disabled" >Aluga já</a>
    </div>
  </div>
</div>
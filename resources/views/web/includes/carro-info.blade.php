@php
    switch ($carro->estado) {
        case 'alugado':
            $classeBotao = 'btn-danger';
            break;
        case 'disponivel':
            $classeBotao = 'btn-primary';
            break;
        case 'reservado':
            $classeBotao = 'btn-warning';
            break;
        default:
            $classeBotao = 'btn-primary';
    }
@endphp

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
      <a href="contact.html" class="ml-auto btn {{ $classeBotao }}  disabled" >{{ $carro->estado }}</a>
    </div>
  </div>
</div>
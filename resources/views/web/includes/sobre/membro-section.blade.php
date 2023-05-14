<div class="col-lg-4 col-md-6 mb-5">
    <div class="post-entry-1 h-100 person-1">
        @empty($membro->foto)
          <span>{{ substr($membro->name,0,1) }}</span>
          @else
          <img class="img-fluid" src="{{ asset('images/'.$membro->foto) }}" alt="HS">
        @endempty
    
      <div class="post-entry-1-contents">
        <span class="meta">{{ $membro->role }}</span>
        <h2>{{ $membro->name }}</h2>
        <p>{{ $membro->descricao }}</p>
      </div>
    </div>
  </div>
<div class="site-section bg-light">
    <div class="container">
      <div class="row justify-content-center text-center mb-5 section-2-title">
        <div class="col-md-6">
          <h2 class="mb-4">Nossa Equipa</h2>
        </div>
      </div>
      <div class="row align-items-stretch">

        @foreach ($equipa as $membro)
            @include('web.includes.sobre.membro-section')
        @endforeach
    
      </div>
    </div>
  </div>
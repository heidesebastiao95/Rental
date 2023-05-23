<div class="col-lg-8 mb-6" >
    <form action="{{ route('enviar.mensagem') }}" method="post">
      @csrf
      <div class="form-group row">
        <div class="col-md-12 mb-4 mb-lg-0">
          <label for="">Nome</label>
          <input name="nome" type="text" class="form-control" placeholder="Nome">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-12">
          <label for="">Email</label>
          <input name="email"  type="text" class="form-control" placeholder="Email">
        </div>
      </div>

     <div class="form-group row">
      <div class="col-md-12">
        <label for="">mensagem</label>
        <textarea name="mensagem" id="" class="form-control"></textarea>
      </div>
     </div>
      <div class="form-group row">
        <div class="col-md-6 mr-auto">
          <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Enviar mensagem">
        </div>
      </div>
    </form>

    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
      @endif
  </div>
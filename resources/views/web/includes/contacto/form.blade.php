<div class="col-lg-8 mb-5" >
    <form action="{{ route('enviar.mensagem') }}" method="post">
      @csrf
      <div class="form-group row">
        <div class="col-md-6 mb-4 mb-lg-0">
          <input name="primeiro_nome" type="text" class="form-control" placeholder="Primeiro nome">
        </div>
        <div class="col-md-6">
          <input name="segundo_nome"  type="text" class="form-control" placeholder="Último nome">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-12">
          <input name="email"  type="text" class="form-control" placeholder="Email">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-12">
          <textarea name="mensagem" id="" class="form-control" placeholder="Escreva sua mensagem." cols="30" rows="10"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-6 mr-auto">
          <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Enviar Mensagem">
        </div>
      </div>
    </form>
  </div>
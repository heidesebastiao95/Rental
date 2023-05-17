<div class="col-lg-8 mb-6" >
    <form action="{{ route('enviar.mensagem') }}" method="post">
      @csrf
      <div class="form-group row">
        <div class="col-md-6 mb-4 mb-lg-0">
          <label for="">Nome</label>
          <input name="nome" type="text" class="form-control" placeholder="Nome">
        </div>
        <div class="col-md-6">
          <label for="">Nº Bilhete</label>
          <input name="bi"  type="text" class="form-control" placeholder="Nº BI">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-6">
          <label for="">Email</label>
          <input name="email"  type="text" class="form-control" placeholder="Email">
        </div>
        <div class="col-md-6">
          <label for="">Endereço</label>
          <input name="endereço"  type="text" class="form-control" placeholder="Endereço">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-6">
          <label for="">Nacimento</label>
          <input name="data"  type="date" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="">Foto</label>
          <input name="foto"  type="file" class="form-control" placeholder="Endereço">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-6">
          <label>Banco</label>
          <select name="banco" class="form-select form-control">
            <option value="BAI">BAI</option>
            <option value="BFA">BFA</option>
            <option value="Millenium">Millenium</option>
         </select>
        </div>
        <div class="col-md-6">
          <label for="">Quantia</label>
          <input name="quantia"  type="number" class="form-control" value="00" readonly>
        </div>
     </div>

     <div class="form-group row">
      <div class="col-md-6">
        <label for="">Anexo</label>
        <input name="anexo"  type="file" class="form-control" placeholder="Endereço">
      </div>
     </div>
      <div class="form-group row">
        <div class="col-md-6 mr-auto">
          <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Arrendar">
        </div>
      </div>
    </form>
  </div>
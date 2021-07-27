

<div class="modal fade" id="actualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

 <form class="needs-validation"  id="formedit">


  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault01">Codigo</label>
      <input type="text" name="codigo" class="form-control" id="codigoedit" placeholder="codigo" readonly>
    </div>
  </div>

   <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Descripcion</label>
      <input type="text" name="descripcion" class="form-control" id="descripcionedit" placeholder="descripcion"  required>
    </div>
   </div>

<div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Precio</label>
      <input type="text" name="precio" class="form-control" id="precioedit" placeholder="precio" required>
    </div>
   </div>

   <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Marca</label>
      <input type="text" name="marca" class="form-control" id="marcaedit" placeholder="marca" required>
    </div>
   </div>
   <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Tipo</label>
      <input type="text" name="tipo" class="form-control" id="tipoedit" placeholder="tipo"  required>
    </div>
   </div>

 

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        <button class="btn btn-primary" name="actualizar" type="submit">ACTUALIZAR</button>
    </div>
      </div>
    </div>
  </div>

</form>

</div>

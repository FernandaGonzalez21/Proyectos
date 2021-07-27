

<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

 <!--<form class="needs-validation" method="post" enctype="multipart/form-data"  id="formagregar">-->

  <form class="needs-validation" id="formadd">


  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      

  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault01">Codigo</label>
      <input type="text" name="codigo" class="form-control" id="codigo" placeholder="codigo" value="" required>
    </div>
  </div>

   <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Descripcion</label>
      <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="descripcion" value="" required>
    </div>
   </div>

      <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Precio</label>
      <input type="text" name="precio" class="form-control" id="precio" placeholder="precio" value="" required>
    </div>
   </div>

   <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Marca</label>
      <input type="text" name="marca" class="form-control" id="marca" placeholder="marca" value="" required>
    </div>
   </div>

   <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Tipo</label>
      <input type="text" name="tipo" class="form-control" id="tipo" placeholder="tipo" value="" required>
    </div>
   </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        <button class="btn btn-primary" name="agregar" type="submit">GUARDAR</button>
    </div>
      </div>
    </div>
  </div>
</form>


</div>

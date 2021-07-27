

<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

 <form class="needs-validation" method="post" enctype="multipart/form-data" action="../model/modelorama_controlador.php">


  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modeloramas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      

  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault01">idSucursal</label>
      <input type="text" name="idSucursal" class="form-control" id="validationDefault01" placeholder="idSucursal" value="" required>
    </div>
  </div>

   <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Nombre</label>
      <input type="text" name="nameSucursal" class="form-control" id="validationDefault02" placeholder="Nombre" value="" required>
    </div>
   </div>

      <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Direccion</label>
      <input type="text" name="Direccion" class="form-control" id="validationDefault02" placeholder="Direccion" value="" required>
    </div>
   </div>

   <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Telefono</label>
      <input type="text" name="Telefono" class="form-control" id="validationDefault02" placeholder="Telefono" value="" required>
    </div>
   </div>

   <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Correo</label>
      <input type="email" name="Correo" class="form-control" id="validationDefault02" placeholder="Correo" value="" required>
    </div>
   </div>

      <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">RFC</label>
      <input type="text" name="RFC" class="form-control" id="validationDefault02" placeholder="RFC" value="" required>
    </div>
   </div>

   <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Nombre</label>
      <input type="file" name="Foto" accept="image/jpg" class="form-control" id="validationDefault03" placeholder="Foto" value="" >
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

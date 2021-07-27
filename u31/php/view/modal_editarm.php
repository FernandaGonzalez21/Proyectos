

<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

 <form class="needs-validation" method="post" enctype="multipart/form-data" action="../model/modelorama_controlador.php">


  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Modelorama</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault01">idSucursal</label>
      <input type="text" name="idSucursal" class="form-control" id="validationDefault01" placeholder="idSucursal" value="<?php echo ($reg==null)?'':$reg['idSucursal'];  ?>" readonly>
    </div>
  </div>

   <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Nombre</label>
      <input type="text" name="nameSucursal" class="form-control" id="validationDefault02" placeholder="Nombre" value="<?php echo ($reg==null)?'':$reg['nameSucursal'];  ?>" required>
    </div>
   </div>

<div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Direccion</label>
      <input type="text" name="Direccion" class="form-control" id="validationDefault02" placeholder="Direccion" value="<?php echo ($reg==null)?'':$reg['Direccion'];  ?>" required>
    </div>
   </div>

   <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Telefono</label>
      <input type="text" name="Telefono" class="form-control" id="validationDefault02" placeholder="Telefono" value="<?php echo ($reg==null)?'':$reg['Telefono'];  ?>" required>
    </div>
   </div>
   <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Correo</label>
      <input type="text" name="Correo" class="form-control" id="validationDefault02" placeholder="Correo" value="<?php echo ($reg==null)?'':$reg['Correo'];  ?>" required>
    </div>
   </div>
    <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">RFC</label>
      <input type="text" name="RFC" class="form-control" id="validationDefault02" placeholder="RFC" value="<?php echo ($reg==null)?'':$reg['RFC'];  ?>" required>
    </div>
   </div>

  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Foto</label>
      <input type="file" name="Foto" accept="image/jpg" class="form-control" id="validationDefault03" placeholder="Foto" value="<?php echo ($reg==null)?'':$reg['Foto'];  ?>" required>
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

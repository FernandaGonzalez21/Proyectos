

<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

 <form class="needs-validation" method="post" enctype="multipart/form-data" action="../model/usuarios_controlador.php">


  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      

  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault01">Correo</label>
      <input type="correo" name="Correo" class="form-control" id="validationDefault01" placeholder="Correo" value="" required>
    </div>
  </div>

   <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Contraseña</label>
      <input type="text" name="Clave" class="form-control" id="validationDefault02" placeholder="Contraseña" value="" required>
    </div>
   </div>
    
      <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Permisos</label>
      <input type="text" name="Permisos" class="form-control" id="validationDefault02" placeholder="Permisos" value="" required>
    </div>
   </div>

   <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Puesto</label>
      <input type="text" name="Puesto" class="form-control" id="validationDefault02" placeholder="Puesto" value="" required>
    </div>
   </div>

   <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Nombre</label>
      <input type="text" name="Nombre" class="form-control" id="validationDefault02" placeholder="Nombre" value="" required>
    </div>
   </div>

      <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Primer Apellido</label>
      <input type="text" name="Apellido1" class="form-control" id="validationDefault02" placeholder="Apellido1" value="" required>
    </div>
   </div>
        <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Segundo Apellido</label>
      <input type="text" name="Apellido2" class="form-control" id="validationDefault02" placeholder="Apellido2" value="" required>
    </div>
   </div>
      <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Fecha de nacimiento</label>
      <input type="text" name="fechaNac" class="form-control" id="validationDefault02" placeholder="fechaNac" value="" required>
    </div>
   </div>
      <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Primer Apellido</label>
      <input type="text" name="Apellido1" class="form-control" id="validationDefault02" placeholder="Apellido1" value="" required>
    </div>
   </div>      <div class="form-row">
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

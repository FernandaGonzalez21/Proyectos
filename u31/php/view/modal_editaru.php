 
 <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

 <form class="needs-validation" method="post" enctype="multipart/form-data" action="../model/usuarios_controlador.php">


  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 
                <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault02"> Ingrese Correo </label>
                <input type="correo" name="Correo" class="form-control" id="validationDefault02" placeholder="Correo" value="<?php echo ($reg==null)?'':$reg['Correo']; ?>" title="Introduzca nuevo Correo electronico" required> 
                </div>
                </div>

                 <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault03"> Ingrese Contraseña </label>
                <input type="text" name="Clave" class="form-control" id="validationDefault03" placeholder="Contraseña" value="<?php echo ($reg==null)?'':$reg['Clave']; ?>" title="Introduzca nueva Contraseña" required> 
                </div>
                </div>

                <?php
                $seleccionado= ($reg==null)?'':$reg['Permisos'];
                $Master=($seleccionado=="Master")?"seleccionado":"";
                $Administrador=($seleccionado=="Administrador")?"seleccionado":"";
                $Usuario=($seleccionado=="Usuario")?"seleccionado":"";
                ?>

                <div class="form-row">
                <div class="col-md-4 mb-3">
                <label > Defina permisos de usuario </label>
                 <select name="Permisos" class="form-control" id="validationDefault04" size="1" required>
                    <option id="Master" value="Master" <?php echo $Master ?>> Master</option>
                    <option id="Administrador" value="Administrador" <?php echo $Administrador ?>>Administrador</option>
                    <option id="Usuario" value="Usuario" <?php echo $Usuario ?>>Usuario</option>  
                    <?php echo ($reg==null)?'':$reg['Permisos']; ?> 
                    </select>       
                </div>
                </div>


                <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault05"> Ingrese Puesto </label>
                <input type="text" name="Puesto" class="form-control" id="validationDefault05" placeholder="Indique el Puesto" value="<?php echo ($reg==null)?'':$reg['Puesto']; ?>" title="" required> 
                </div>
                </div>

                <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault06"> Ingrese Nombre </label>
                <input type="text" name="Nombre" class="form-control" id="validationDefault06" placeholder="Nombre" value="<?php echo ($reg==null)?'':$reg['Nombre']; ?>" title="" required> 
                </div>
                </div>

                <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault07"> Ingrese Primer Apellido </label>
                <input type="text" name="Apellido1" class="form-control" id="validationDefault07" placeholder="Primer Apellido" value="<?php echo ($reg==null)?'':$reg['Apellido1']; ?>" title="" required> 
                </div>
                </div>

                <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault08"> Ingrese Segundo Apellido </label>
                <input type="text" name="Apellido2" class="form-control" id="validationDefault08" placeholder="Segundo Apellido" value="<?php echo ($reg==null)?'':$reg['Apellido2']; ?>" title="" required> 
                </div>
                </div>

                <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault09"> Ingrese Fecha de Nacimiento </label>
                <input type="date" name="fechaNac" class="form-control" id="validationDefault09" placeholder="Segundo Apellido" value="<?php echo ($reg==null)?'':$reg['fechaNac']; ?>" title="" required> 
                </div>
                </div>

                <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault10"> Ingrese RFC</label>
                <input type="text" name="RFC" class="form-control" id="validationDefault10" placeholder="RFC" value="<?php echo ($reg==null)?'':$reg['RFC']; ?>" title="" required> 
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

<?php
require_once "../model/conexion.php";
require_once "../model/usuarios.php";

//conexion temporal
$conexion = new Conexion();
$usuarios = new Usuarios($conexion->getConection());

$row=null;
$reg=null;
$modal=null;

if(isset($_GET["idUsuario"]))
{
    $usuarios->setIdUsuario($_GET["idUsuario"]);
    $row=$usuarios->readid();
    //print_r($row);
    $reg=$row[0];

   /* if(isset($_GET["editar"])){
        $modal="editar";
      }*/
      if(isset($_GET["eliminar"])){
        $modal="eliminar";
      }
    }

?>
<!DOCTYPE html>
<html lang="en">

       <head>


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
     <title> Usuarios </title>
    </head>
    <body>
     <?php
    echo "<script>";
    echo "$(document).ready(function()";
    echo "{";
   /* if($modal=="editar")
    {
     
      echo "$('#editar').modal('show');";
 
    }*/
    if($modal=="eliminar")
    {
      //echo "Eliminar";
      echo "$('#eliminar').modal('show');";
    }
    echo "  });";
    echo "</script>";

  include("modal_agregaru.php");
  include("modal_editaru.php");
  include("modal_eliminaru.php");
 ?>


<!--header>

<?php include_once("header.php");

 ?>  
</header-->
    <nav navbar navbar-expand-lg navbar-light style="background-color: #e3f2fd;">
    <?php include_once("nav.php");

    ?>

    </nav>
 <header align="center">
    <h1> Bienvenido </h1>
    </header>

            <section>
            <button type="button" class="btn btn-outline-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
            Insertar
            </button>
            </section>


            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">idUsuario</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Clave</th>
                    <th scope="col">Permisos</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido1</th>
                    <th scope="col">Apellido2</th>
                    <th scope="col">fechaNac</th>
                    <th scope="col">RFC</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                
                <tbody>
                    <?php
                    $datos=$usuarios->readall();
                    foreach ($datos as $row) {
                    $Foto="../im/usuario.jpg"
                    ?>
                    
                    <tr>
                     <td><img class="img-thumbnail" width="50px" src="../../im/<?php echo $row["Foto"]; ?>"></td> 
                    <td><?php echo $row["idUsuario"]; ?></td>
                    <td><?php echo $row["Correo"]; ?></td>
                    <td><?php echo $row["Clave"]; ?></td>
                    <td><?php echo $row["Permisos"]; ?></td>
                    <td><?php echo $row["Puesto"]; ?></td> 
                    <td><?php echo $row["Nombre"]; ?></td>
                    <td><?php echo $row["Apellido1"]; ?></td>
                    <td><?php echo $row["Apellido2"]; ?></td> 
                    <td><?php echo $row["fechaNac"]; ?></td>
                    <td><?php echo $row["RFC"]; ?></td>  
                    <!--<td><a href="modelorama_view.php?editar&idSucursal=<?php echo $row["idSucursal"];?>">EDITAR</a></td>-->
                    <td><a class="btn-secondary" href="usuarios_view.php?editar&idUsuario=<?php echo $row['idUsuario']; ?>" >Editar</a></td>
                    <td><a class="btn-secondary" href="usuarios_view.php?eliminar&idUsuario=<?php echo $row['idUsuario']; ?>" >Eliminar</a></td>
                    <!--<td><a href="../model/modelorama_controlador.php?eliminar&idSucursal=<?php echo $row["idUsuario"];?>">ELIMINAR</a></td>-->
                    </tr>

                    <?php
                    }
                     ?>

                    </tbody>
            </table>

        </div>
        </section>

<section style="background-color:#2A2A26" >
<footer>
<?php 
include_once("footer.php");
   ?> 
</footer>
</section>
</body>
</html>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Datos de usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="../model/usuarios_controlador.php">

                <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault02"></label>
                <input type="hidden" name="idUsuario" class="form-control" id="validationDefault02" placeholder="idUsuario" value="<?php echo ($reg==null)?'':$reg['idUsuario']; ?>" required> 
                </div>
                </div>

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
                <div class="form-group">
                <h3 align="center"><b>Inserte una foto</b></h3>
                  <label form="file"></label>
                  <input type="file" accept="image/*" class="form-control" name="Foto" multiple>
                  <br><br>
                 </div>
                </div>
                <div class="form-row">
                <div class="col-md-3 mb-3">
              <button class="btn btn-primary" name="<?php echo (isset($_GET['editar']))?'actualizar':'agregar';   ?>" type="submit"><?php echo (isset($_GET['editar']))?'ACTUALIZAR':'AGREGAR';   ?></button>
                </div>
                </div>
                </form>
                </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
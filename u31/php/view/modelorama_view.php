<?php 
session_start();
//print_r($_SESSION);
if (!isset($_SESSION["Clave"])) {
 header("Location: ../view/logineje.php");
}

require_once "../model/conexion.php";
require_once "../model/modelorama.php";

//conexion temporal
$conexion = new Conexion();
$modelorama = new Modelorama($conexion->getConection());

$row=null;
$reg=null;
$modal=null;
if(isset($_GET["idSucursal"]))
{
    $modelorama->setIdSucursal($_GET["idSucursal"]);
    $row=$modelorama->readid();
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
    
     <title> Administracion Modeloramas </title>
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

  include("modal_agregarm.php");
  include("modal_editarm.php");
  include("modal_eliminarm.php");
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
                    <th scope="col">No. Sucursal</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">RFC</th>
                     <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead> 
                <tbody>
                    <?php
                    $datos=$modelorama->readall();
                    foreach ($datos as $row) {
                    $Foto="../../im/modelorama.jpg";
                    ?>
                    
                    <tr>
                    <td><img class="img-thumbnail" width="50px" src="../../im/<?php echo $row["Foto"]; ?>"></td>   
                    <td><?php echo $row["idSucursal"]; ?></td>
                    <td><?php echo $row["nameSucursal"]; ?></td>
                    <td><?php echo $row["Direccion"]; ?></td>
                    <td><?php echo $row["Telefono"]; ?></td>
                    <td><?php echo $row["Correo"]; ?></td> 
                    <td><?php echo $row["RFC"]; ?></td>                                     <!--<td><a href="modelorama_view.php?editar&idSucursal=<?php echo $row["idSucursal"];?>">EDITAR</a></td>-->
                    <td><a class="btn-secondary" href="modelorama_view.php?editar&idSucursal=<?php echo $row['idSucursal']; ?>" >Editar</a></td>
                    <td><a class="btn-secondary" href="modelorama_view.php?eliminar&idSucursal=<?php echo $row['idSucursal']; ?>" >Eliminar</a></td>
                    <!--<td><a href="../model/modelorama_controlador.php?eliminar&idSucursal=<?php echo $row["idSucursal"];?>">ELIMINAR</a></td>-->
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

<!-- Modal registro Modelorama-->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Datos Modelorama</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <!--Formulario registro modelorama-->
            <form method="post" action="../model/modelorama_controlador.php" enctype="multipart/form-data">

                <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault01">idSucursal</label>
                <input type="text" name="idSucursal" class="form-control" id="validationDefault01" placeholder="idSucursal" value="<?php echo ($reg==null)?'':$reg['idSucursal']; ?>"  required> 
                </div>
                </div>
            
                <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault02">Nombre</label>
                <input type="text" name="nameSucursal" class="form-control" id="validationDefault02" placeholder="Nombre" value="<?php echo ($reg==null)?'':$reg['nameSucursal']; ?>" required> 
                </div>
                </div>

                <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault03">Direccion </label>
                <input type="text" name="Direccion" class="form-control" id="validationDefault03" placeholder="Direccion" value="<?php echo ($reg==null)?'':$reg['Direccion']; ?>" required>
                </div>
                </div>

                <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault04"> Telefono </label>
                <input type="text" name="Telefono" class="form-control" id="validationDefault04" placeholder="Telefono" value="<?php echo ($reg==null)?'':$reg['Telefono']; ?>" required>
                </div>
                </div>

                <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault05">Correo Electronico </label>
                <input type="email" name="Correo" class="form-control" id="validationDefault05" placeholder="Correo Electronico" value="<?php echo ($reg==null)?'':$reg['Correo']; ?>" required>
                </div>
                </div>

                <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault06"> Ingrese RFC </label>
                <input type="text" name="RFC" class="form-control" id="validationDefault06"  placeholder="RFC" value="<?php echo ($reg==null)?'':$reg['RFC']; ?>"  required>
                </div>
                </div>
                <br>
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
            </div>
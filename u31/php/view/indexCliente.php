<?php
session_start();
//print_r($_SESSION);
/*if (!isset($_SESSION["Clave"])) {
 header("Location: ../view/logineje.php");
}*/

require_once "../model/conexion.php";
require_once "../model/cliente.php";

//conexion temporal
/*$conexion=new Conexion();
$cliente= new Cliente($conexion->getConection());

$row=null;
$reg=null;
$modal=null;
if(isset($_GET["IdCliente"]))
{
    $cliente->setIdCliente($_GET["IdCliente"]);
    $row=$cliente->readid();
    //print_r($row);
    $reg=$row[0];

    if(isset($_GET["eliminar"])){
      $modal="eliminar";
    }

}*/

?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="main.css">

  <link rel="stylesheet" type="text/css" href="../../assets/datatables/datatables.min.css"/>
  <link rel="stylesheet"  type="text/css" href="../../assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css"> 
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"> 

  <script src="../../assets/jquery/jquery-3.3.1.min.js"></script>
  <script src="../../assets/popper/popper.min.js"></script>
  <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="../../assets/datatables/datatables.min.js"></script>  
  <script type="text/javascript" src="main2.js"></script> 

  <title>Clientes</title>
</head>
<body>
 <?php
    /*echo "<script>";
    echo "$(document).ready(function()";
    echo "{";
    /*if($modal=="editar")
    {
      echo "$('#editar').modal('show');";
    }
    if($modal=="eliminar")
    {
      echo "$('#eliminar').modal('show');";
    }  
    echo "});";
    echo "</script>";
    */
  include("modal_agregarc.php");
  include("modal_editarc.php");
  include("modal_eliminarc.php");    
 ?>


<navbar navbar-expand-lg navbar-light style="background-color: #e3f2fd;">
<?php include_once("nav.php");
?>

</nav>

  <div class="container">
  <button type="button" class="btn btn-outline-warning btn-lg btn-block" data-toggle="modal" data-target="#agregar" id="btnNuevo">
  Insertar Cliente
  </button>
  </div>

  <div class="container"> 
  <table class="table table-dark" id="tablaCliente">
  <thead>
    <tr>
      <th scope="col">#</th>

      <th scope="col">IdCliente</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido 1</th>
      <th scope="col">Apellido 2</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono</th>
      <th scope="col">Correo Electronico</th>
      <th scope="col">RFC</th>

      <th scope="col" colspan="2" align="center">Acciones</th>

    </tr>
  </thead>
<tbody>
 

</tbody>
</table>
</div>

<footer>
  <?php
   include_once("footer.php")
  ?>
</footer>

</body>
</html>



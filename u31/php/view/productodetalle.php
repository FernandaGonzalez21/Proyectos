<?php

session_start();
if (!isset($_SESSION["Clave"])) {
    header("Location: ../view/login.php");
   }

require_once "../model/conexion.php";
require_once "../model/producto.php";
$conexion = new Conexion();
$producto = new Producto($conexion->getConection());

$row=null;
$reg=null;

if(isset($_GET['codigo']))
{

    $producto->setCodigo($_GET["codigo"]);
    $row=$producto->readid();
    $reg=$row[0];
} else {
    header("Location: /productos_view.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Detalle Pedido</title>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
</head>
<body>
<nav navbar navbar-expand-lg navbar-light style="background-color: #e3f2fd;">
<?php include_once("navPro.php");

?>

</nav>
 <header align="center">
    <h1> Producto</h1>
    </header>

<div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="../../im/cerveza.jpg"alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $reg['marca'];?></h2> 
            <p><?php echo $reg['tipo'];?></p>
            <p class="mb-4"><?php echo $reg['descripcion'];?></p>
            <p><strong class="text-primary h4">$ <?php echo $reg['precio'];?></strong></p>

            <!--<div class="mb-1 d-flex">
              <label for="option-sm" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-sm" name="shop-sizes"></span> <span class="d-inline-block text-black">Small</span>
              </label>
              <label for="option-md" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-md" name="shop-sizes"></span> <span class="d-inline-block text-black">Medium</span>
              </label>
              <label for="option-lg" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-lg" name="shop-sizes"></span> <span class="d-inline-block text-black">Large</span>
              </label>
              <label for="option-xl" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-xl" name="shop-sizes"></span> <span class="d-inline-block text-black"> Extra Large</span>
              </label>
            </div>-->
            <!--<div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>

            </div>-->
            <p><a href="carrito.php?codigo=<?php echo $reg['codigo']; ?>"  class="buy-now btn btn-sm btn-primary">Agregar a pedido</a></p>

          </div>
        </div>
      </div>
    
</body>
</html>
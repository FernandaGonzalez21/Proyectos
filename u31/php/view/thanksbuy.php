<?php

session_start();
include_once "../model/conexion.php";

if (!isset($_SESSION['carrito'])) {
  header("Location: productos_view.php");
}
else {
  
  $arreglo = $_SESSION['carrito'];
  $total=0;
  for ($i=0; $i<count($arreglo); $i++) {
      $total=$total+($arreglo[$i]['precio']* $arreglo[$i]['cantidad']);
  }
  $fecha = date('Y-m-d h:m:s');

  $conexion = new Conexion();
  $conn=$conexion->getConection();

  $stmt = $conn->prepare("INSERT INTO pedido (idSucursal, idProducto, Fecha, IVA, Subtotal, Total) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->execute(array(22, null, $fecha, $total*.16, 0, $total*1.16));
  $idPedido=$conn->lastInsertId();

  for ($i=0; $i <count($arreglo) ; $i++) { 
    $subtotal=$arreglo[$i]['cantidad']*$arreglo[$i]['precio'];
    $iva=$arreglo[$i]['cantidad']*$arreglo[$i]['precio']*0.16;
    $totaldetalle=$arreglo[$i]['cantidad']*$arreglo[$i]['precio']*1.16;   

    $stmt = $conn->prepare("INSERT INTO detallePedido (idPedido,idProducto,cantidadProd,Subtotal,IVA,TOTAL) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->execute(array($idPedido,
                        $arreglo[$i]['codigo'],
                        $arreglo[$i]['cantidad'],
                        $subtotal,
                        $iva,
                        $totaldetalle));
    }    
    unset($_SESSION['carrito']);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
   <!--<?php include("./layouts/header.php"); ?>-->

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Thank you!</h2>
            <p class="lead mb-5">You order was successfuly completed.</p>
            <button type="button" class="btn btn-dark"><a href="productos_view.php">Back to shop</a></button>
            </div>
        </div>
      </div>
    </div>

    <!--<?php include("./layouts/footer.php"); ?>-->

  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>

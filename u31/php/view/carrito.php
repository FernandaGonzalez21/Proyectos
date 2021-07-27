<?php

session_start();
/*    header("Location: ../view/login.php");
   }*/   

require_once "../model/conexion.php";
require_once "../model/producto.php";

$row=null;
$reg=null;

if(isset($_GET['codigo']))
{
    
    $conexion = new Conexion();
    $producto = new Producto($conexion->getConection());
    

    $producto->setCodigo($_GET["codigo"]);
    $row=$producto->readid();
    $reg=$row[0];

    $codigo = $reg['codigo'];
    $marca = $reg['marca'];
    $descripcion =$reg['descripcion'];
    $tipo =$reg['tipo'];
    $precio =$reg['precio'];

    if (!isset($_SESSION['carrito'])) {
      $_SESSION['carrito']=array();
    }

    $cantidad =1;
    $arreglo = $_SESSION['carrito'];
    //$total=$_SESSION['Total'];
    $subtotal=($precio*$cantidad);
    //$total=($total+$precio*$cantidad);

    

    $arreglo[] = array(

        'codigo'=>$codigo,
        'precio'=>$precio,
        'marca'=>$marca,
        'tipo'=>$tipo,
        'descripcion'=>$descripcion,
        'cantidad'=>$cantidad);

    $_SESSION['carrito']=$arreglo;
    //$_SESSION['Total']=$total;

    $arreglo = $_SESSION['carrito'];
    $total=0;
    for ($i=0; $i<count($arreglo); $i++) {
      $total=$total+($arreglo[$i]['precio']* $arreglo[$i]['cantidad']);
  }
    //print_r($_SESSION);
} else {
    header("Location: productos_view.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Carrito</title>
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
    <h1> Selección de productos </h1>
    </header>


<div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Imagen</th>
                    <th class="product-name">Producto</th>
                    <th class="product-price">Precio</th>
                    <th class="product-quantity">Cantidad</th>
                    <th class="product-total">Subtotal</th>
                    <!--<th class="product-remove">Remove</th>-->
                  </tr>
                </thead>
                <tbody>
                <?php
                    if (isset($_SESSION['carrito'])) {
                        $arregloCarrito[] =$_SESSION['carrito'];
                        foreach ($arregloCarrito[0] as $r) {
                            //print_r($r);                            
                         
                    ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="../../im/cerveza1.jpg" alt="Image" class="img-fluid">
                    </td>

                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $r['marca'];?></h2>
                    </td>

                    <td>$<?php echo $r['precio'];?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" value="<?php echo $r['cantidad'];?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div>

                    </td>
                    <td>$<?php echo $r['precio'] * $r['cantidad'];?></td>
                    <!--<td><a href="#" class="btn btn-primary btn-sm">X</a></td>-->
                  </tr>                 

                  <?php
                  }
                }
                ?>

                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <!--<div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block">Update Cart</button>
              </div>-->
              <div class="col-md-6">
                <a href="productos_view.php" class="btn btn-outline-primary btn-sm btn-block">Agregar mas productos</a>
              </div>
            </div>
            <!--<div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-sm">Apply Coupon</button>
              </div>
            </div>-->
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Total a pagar:</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal:</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$<?php echo $subtotal?></strong>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">IVA:</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$<?php echo $subtotal*0.16?></strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total:</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$<?php echo $total?></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='thanksbuy.php'">Finalizar compra</button>

                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
$include=('config.php');
$productName = "Producto demostración";
$currency = "EUR";
$productPrice = 10;
$productId = 587965;
$orderNumber = 567;
?>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstraptheme.min.css">
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title>Demo Paypal Express Checkout</title>
</head>
<body>
<div class="container">
 <h2>Demo Paypal Express Checkout Demo con PHP</h2>
 <br>
 <table class="table">
 <tr>
 <td style="width:150px"><img src="demo_product.png" style="width:50px"
/></td>
 <td style="width:150px"><?php echo $productPrice; ?> €</td>
 <td style="width:150px">
 <?php $include=('paypalCheckout.php'); ?>
 </td>
 </tr>
 </table> 
</div>



</body>
</html>
<?php
session_start();
//print_r($_SESSION);
if (!isset($_SESSION["Clave"])) {
 header("Location: ../view/login.php");
}

require_once "../model/conexion.php";
require_once "../model/producto.php";

//conexion temporal
$conexion = new Conexion();
$producto = new Producto($conexion->getConection());

$row=null;
$reg=null;

?>

<!DOCTYPE html>
<html lang="en">



<head>
    <title> Pedidos </title>

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

    <main>

        <!--seccion de tabla consulta-->
        <div>
            <article>
                <section>

                    <div class="row mb-5">
                        <?php
                    $datos=$producto->readall();

                    $cartas=0;

                    foreach ($datos as $row) {
                        $foto="../../im/cerveza.jpg"
                    ?>


                        <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                            <div class="block-4 text-center border">
                                <figure class="block-4-image">
                                    <a href="productodetalle.php?codigo=<?php echo $row['codigo'];?>">
                                        <img src="<?php echo $foto;?>" alt="<?php echo $row['codigo'];?>"
                                            class="img-fluid"></a>
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a
                                            href="productodetalle.php?codigo=<?php echo $row['codigo'];?>"><?php echo $row['marca'];?></a>
                                    </h3>
                                    <p class="mb-0"><?php echo $row['descripcion'];?></p>
                                    <p class="text-primary font-weight-bold"><?php echo $row['precio'];?></p>
                                </div>
                            </div>
                        </div>

                        <!--

                        <form method="get" action="productos_view.php"></form>

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <input type="hidden" name="codigo" class="form-control" id="validationDefault02"
                                    placeholder="ID" value="<?php echo ($reg==null)?'':$reg['codigo']; ?>" required>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="card" style="width: 16rem;">
                                <img class="card-img-top" src="<?php echo $foto;?>" alt="<?php echo $row['codigo'];?>">
                                <div class="card-body">
                                    <p class="card-title"><?php echo $row['marca'];?></p>
                                    <p class="card-title"><?php echo $row['descripcion'];?></p>
                                    <p class="card-text"><?php echo $row['precio'];?></p>


                                    <div class="form-row">
                                        <label for="validationDefault02"> Cantidad </label>
                                        <input type="number" name="Cantidad" class="form-control"
                                            id="validationDefault03" placeholder="Cantidad Pedido"
                                            value="<?php echo ($reg==null)?'':$reg['0']; ?>" title="Elija Cantidad"
                                            required>
                                    </div>

                                    <a href="#" class="btn btn-primary">Añadir al Pedido</a>

                                </div>
                            </div>
                        </div>
                        </form>
                        -->

                        <?php
                        }//cierre foreach
                     ?>

                    </div>
                </section>
            </article>
        </div>
        <!--fin tabla consulta-->


    </main>
    <footer>
    </footer>

</body>

</html>


<footer>
 <?php 
  include_once("footer.php");
   ?> 
  </footer>
    </article>
</div>
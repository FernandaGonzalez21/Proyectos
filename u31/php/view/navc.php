<?
//session_start();
print_r($_SESSION);
?>
<div class="container">
<div class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand" href="#">Grupo Modelo®</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
 <ul class="navbar-nav">
      <li class="nav-item"><b>
        <a class="nav-link" href="indexchofer.php">Opcion 1</a>
      </li>
    </b>
      <li class="nav-item"><b>
        <a class="nav-link" href="indexvehiculo.php">Opcion 2</a>

      <!--?php
    if ($_SESSION["marca"]== "Modelo") {
      # code...
    
    ?>-->
      
      </li>
    </b>
      <li class="nav-item"><b>
        <a class="nav-link" href="indexfactura.php">Opcion 3</a>
      </li>    
    </b>

    <!--?php
    }
    ?-->
  </li>
  </li>
    <li class="nav-item"><b>
      <a class="nav-link" href="../model/salir.php"> Cerrar Sesion </a></li>
    </ul>
</b>
</div>
</div>
</div>
<?
//session_start();
print_r($_SESSION);
?>
<div class="container">
<div class="navbar navbar-expand-lg navbar-primary" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="../indexP.php">Grupo Modelo®</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 <ul class="navbar-nav">
      <li class="nav-item"><b>
        <a class="nav-link" href="modelorama_view.php">Modeloramas</a>
      </li>
    </b>
      <li class="nav-item"><b>
        <a class="nav-link" href="index.php">Productos</a>
      </b>
    </li>
    <li class="nav-item"><b>
        <a class="nav-link" href="usuarios_view.php">Usuarios</a>
      </li>

    <!--?php
    if ($_SESSION["marca"]== "Modelo") {
      # code...
    
    ?>-->
      </li>
    </b>
      <li class="nav-item"><b>
        <a class="nav-link" href="indexCliente.php">Clientes</a>
      </li>  
      </b>  
          
    <!--?php
    }
    ?-->
  </li>
  </li>
    <li class="nav-item"><b>
        <a class="nav-link" href="../model/salir.php">Cerrar sesión.</a> </li>    
    
    </ul>
  </b>
</div>
</div>
</div>

<?php


require_once "conexion.php";

if (isset($_GET["Entrar"])) {
    echo "dentro";
    $Correo=$_GET["Correo"];
    $Clave=$_GET["Clave"];

    $conexion = new Conexion();
    $conn = $conexion->getConection();
    $result=null;

    try {
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE Correo=? AND Clave=?");
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array($Correo,$Clave));
        $result = $stmt->fetchAll();   
        print_r($result); 
        if($result==null) {
          echo "error";

            header("Location: ../model/logineje.php");
        }else {
          session_unset();
          session_destroy();
          session_start();
          session_unset();
          print_r($_SESSION);
          //unset($_SESSION['carrito']);

          $_SESSION['Clave'] = $result[0]['Clave'];
          $_SESSION['Puesto'] = $result[0]['Puesto'];
          $_SESSION['Nombre'] = $result[0]['Nombre'];
          $_SESSION['Apellido1'] = $result[0]['Apellido1'];
          $_SESSION['Apellido2'] = $result[0]['Apellido2'];          
          
            header("Location: ../view/index.php");
        }
          if ($_SESSION['Puesto']!='Administrador' ) {
            header("Location: ../view/productos_view.php");
          }       
          
        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
}

?>
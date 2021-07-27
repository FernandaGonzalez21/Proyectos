<?php 
require_once "conexion.php";
require_once "modelorama.php";

//conexion temporal
$conexion = new Conexion();
$modelorama = new Modelorama($conexion->getConection());

if(isset($_POST['agregar'])) 
{
   // echo "agregar";
    print_r($_POST);
    //$modelorama->setIdSucursal($_POST['idSucursal']);
	$modelorama->setNameSucursal($_POST['nameSucursal']);
	$modelorama->setDireccion($_POST['Direccion']);
	$modelorama->setTelefono($_POST['Telefono']);
	$modelorama->setCorreo($_POST['Correo']);
    $modelorama->setRFC($_POST['RFC']);
    $Foto=$_FILES["Foto"];
    print_r($Foto);

if(isset($_FILES['Foto']['name']))
    {
        $modelorama->setFoto($_POST['idSucursal'].".jpg");
    }else{
        $modelorama->setFoto("modelorama.jpg");
    }
    if($modelorama->create())
    {
        echo "Modelorama agregado";
        if(isset($_FILES['Foto']['name']))
        {
            $temp=$_FILES['Foto']['tmp_name'];
                move_uploaded_file($temp,"../../im/".$modelorama->getFoto());
        }

    }
    else{
echo "Modelorama no agregado";

              }

             header("Location: ../view/modelorama_view.php");
}//fin isset agregar

if (isset($_POST['actualizar'])) {
   
    $modelorama->setIdSucursal($_POST['idSucursal']);
    $modelorama->setNameSucursal($_POST['nameSucursal']);
    $modelorama->setDireccion($_POST['Direccion']);
    $modelorama->setTelefono($_POST['Telefono']);
    $modelorama->setCorreo($_POST['Correo']);
    $modelorama->setRFC($_POST['RFC']);

if(isset($_FILES['Foto']['name']))
    {
        $modelorama->setFoto($_POST['idSucursal'].".jpg");
    }else{
        $modelorama->setFoto("modelorama.jpg");
    }
    if($modelorama->update())
    {
        if(isset($_FILES['Foto']['name']))
        {
            $temp=$_FILES['Foto']['tmp_name'];
                move_uploaded_file($temp,"../../im/".$modelorama->getFoto());
        }
        echo "Modelorama modificado";
    }else{
echo "Modelorama no modificado";
              }
              header("Location: ../view/modelorama_view.php");

}//fin isset actualizar

if (isset($_POST['eliminar'])) {

	//$producto=new Producto();
    $modelorama->setIdSucursal($_POST['idSucursal']);

    if($modelorama->delete())
    {
        if(file_exists("../../im/".$_POST["idSucursal"].".jpg")){

            unlink("../../im/".$_POST["idSucursal"].".jpg");
        }

        echo "Modelorama eliminado";
    }else{
echo "Modelorama no eliminado";
              }
              header("Location: ../view/modelorama_view.php");

}

?>
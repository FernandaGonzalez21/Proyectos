<?php 
require_once "conexion.php";
require_once "usuarios.php";

$conexion = new Conexion();
$usuarios = new  Usuarios($conexion->getConection());

if(isset($_POST['agregar']))
{
    //echo "agregar";
    //$usuarios->setCorreo($_POST['idSucursal']);
    $usuarios->setCorreo($_POST['Correo']);
    $usuarios->setClave($_POST['Clave']);
    $usuarios->setPermisos($_POST['Permisos']);
    $usuarios->setPuesto($_POST['Puesto']);
    $usuarios->setNombre($_POST['Nombre']);
    $usuarios->setApellido1($_POST['Apellido1']);
    $usuarios->setApellido2($_POST['Apellido2']);
    $usuarios->setfechaNac($_POST['fechaNac']);
    $usuarios->setRFC($_POST['RFC']);
    $Foto=$_FILES["Foto"];
    print_r($Foto);

if(isset($_FILES['Foto']['name']))
    {
        $usuarios->setFoto($_POST['idUsuario'].".jpg");
    }else{
        $usuarios->setFoto("usuario.jpg");
    }
    if($usuarios->create())
    {
        echo "Usuario agregado";
        if(isset($_FILES['Foto']['name']))
        {
            $temp=$_FILES['Foto']['tmp_name'];
                move_uploaded_file($temp,"../../im/".$usuarios->getFoto());
        }

    }
    else{
echo "Modelorama no agregado";

              }

             header("Location: ../view/usuarios_view.php");
}//Fin if gregar

    if (isset($_POST['actualizar'])) {
    $usuarios->setidUsuario($_POST['idUsuario']);
    $usuarios->setCorreo($_POST['Correo']);
    $usuarios->setClave($_POST['Clave']);
    $usuarios->setPermisos($_POST['Permisos']);
    $usuarios->setPuesto($_POST['Puesto']);
    $usuarios->setNombre($_POST['Nombre']);
    $usuarios->setApellido1($_POST['Apellido1']);
    $usuarios->setApellido2($_POST['Apellido2']);
    $usuarios->setfechaNac($_POST['fechaNac']);
    $usuarios->setRFC($_POST['RFC']);
    if(isset($_FILES['Foto']['name']))
    {
        $usuarios->setFoto($_POST['idUsuario'].".jpg");
    }else{
        $usuarios->setFoto("usuario.jpg");
    }
    if($usuarios->update())
    {
        if(isset($_FILES['Foto']['name']))
        {
            $temp=$_FILES['Foto']['tmp_name'];
                move_uploaded_file($temp,"../../im/".$usuarios->getFoto());
        }
        echo "Usuario modificado";
    }else{
echo "Usuario no modificado";
              }
              header("Location: ../view/usuarios_view.php");
} //Fin if Actualizar

if (isset($_POST['eliminar'])) {

    //$producto=new Producto();
    $usuarios->setidUsuario($_POST['idUsuario']);

    if($usuarios->delete())
    {
        if(file_exists("../../im/".$_POST["idUsuario"].".jpg")){

            unlink("../../im/".$_POST["idUsuario"].".jpg");
        }

        echo "Usuario eliminado";
    }else{
echo "Usuario no eliminado";
              }
              header("Location: ../view/usuarios_view.php");

}

?>
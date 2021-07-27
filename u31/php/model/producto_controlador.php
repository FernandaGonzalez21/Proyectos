<?php 
require_once "conexion.php";
require_once "producto.php";

//conexion temporal
$conexion = new Conexion();

$producto=new Producto($conexion->getConection());

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$data="";
switch ($opcion) {
	//Agregar
	case 1:
	$producto->setCodigo($_POST['codigo']);
	$producto->setDescripcion($_POST['descripcion']);
	$producto->setPrecio($_POST['precio']);
	$producto->setMarca($_POST['marca']);
	$producto->setTipo($_POST['tipo']);

	if ($producto->create()) 
	{
	$data=$producto->readid();
	}
	break;
	//Editar y actualizar
	case 2:
	$producto->setCodigo($_POST['codigo']);
	$producto->setDescripcion($_POST['descripcion']);
	$producto->setPrecio($_POST['precio']);
	$producto->setMarca($_POST['marca']);
	$producto->setTipo($_POST['tipo']);	
	
	if($producto->update())
	{
	$data=$producto->readid();
	}	

	break;
	//Borrar
	case 3:
	
	$producto->setCodigo($_POST['codigo']);
	$data=$producto->delete();

	break;
	//Listar
	case 4:
	$data=$producto->readall();

	break;
	
	default:
		# code...
		break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;










/*if(isset($_POST['agregar']))
if($opcion==1) 
{
//echo "agregar";
	print_r($_POST);
	//$producto->setCodigo($_POST['codigo']);
	$producto->setDescripcion($_POST['descripcion']);
	$producto->setPrecio($_POST['precio']);
	$producto->setMarca($_POST['marca']);
	$producto->setTipo($_POST['tipo']);
	//$foto=$_FILES["foto"];
	
	//print_r($foto);

/*if(isset($_FILES['foto']['name']))
	{
		$producto->setFoto($_POST['codigo'].".jpg");
	}else{
		$producto->setFoto("default.jpg");
	}
	if($producto->create())
	{
	  	echo "Producto agregado";
	  	/*if(isset($_FILES['foto']['name']))
		{
			$temp=$_FILES['foto']['tmp_name'];
				move_uploaded_file($temp,"../../im/".$producto->getFoto());
		}

	}
	else{
echo "Producto no agregado";

              }

             header("Location: ../view/index.php");


}
//if (isset($_POST['actualizar'])) 
if($opcion==2) {

	$producto->setCodigo($_POST['codigo']);
	$producto->setDescripcion($_POST['descripcion']);
	$producto->setPrecio($_POST['precio']);
	$producto->setMarca($_POST['marca']);
	$producto->setTipo($_POST['tipo']);


	/*if(isset($_FILES['foto']['name']))
		{
			$producto->setFoto($_POST['codigo'].".jpg");
		}else{
			$producto->setFoto("default.jpg");
		}*/
		/*if($producto->update())
		{
		  	/*if(isset($_FILES['foto']['name']))
			{
				$temp=$_FILES['foto']['tmp_name'];
					move_uploaded_file($temp,"../../im/".$producto->getFoto());
			}
		  	echo "Producto modificado";
		}else{
	echo "Producto no modificado";
	              }
	              header("Location: ../view/index.php");

}
//if (isset($_POST['eliminar'])) 
if($opcion==3) {

	//$producto=new producto();
	$producto->setCodigo($_POST['codigo']);

	if($producto->delete())
	{
		/*if(file_exists("../../im/".$_POST["codigo"].".jpg")){

			unlink("../../im/".$_POST["codigo"].".jpg");
		}

	  	echo "Producto eliminado";
	}else{
echo "Producto no eliminado";
              }
              header("Location: ../view/index.php");

}*/

?>
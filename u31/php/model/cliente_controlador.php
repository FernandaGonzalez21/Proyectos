<?php 
require_once "conexion.php";
require_once "cliente.php";

//conexion temporal
$conexion = new Conexion();

$cliente=new cliente($conexion->getConection());

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$data="";
switch ($opcion) {
//echo "agregar";
	case 1:		
	$cliente->setIdCliente($_POST['IdCliente']);
	$cliente->setNombre($_POST['nombre']);
	$cliente->setApellido1($_POST['apellido1']);
	$cliente->setApellido2($_POST['apellido2']);
	$cliente->setDireccion($_POST['direccion']);
	$cliente->setTelefono($_POST['telefono']);
	$cliente->setCorreoElectronico($_POST['correoElectronico']);
	$cliente->setRFC($_POST['RFC']);

	if($cliente->create())
	{
	$data=$cliente->readid();	
	}
	break;

	case 2:
	$cliente->setIdCliente($_POST['IdCliente']);
	$cliente->setNombre($_POST['nombre']);
	$cliente->setApellido1($_POST['apellido1']);
	$cliente->setApellido2($_POST['apellido2']);
	$cliente->setDireccion($_POST['direccion']);
	$cliente->setTelefono($_POST['telefono']);
	$cliente->setCorreoElectronico($_POST['correoElectronico']);
	$cliente->setRFC($_POST['RFC']);

	if($cliente->update())
	{
	$data=$cliente->readid();
	}
	break;

	case 3:
	
	$cliente->setIdCliente($_POST['IdCliente']);
	$data=$cliente->delete();

	break;

	case 4:
	$data=$cliente->readall();

	break;
	
	default:
		break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion=null;



?>
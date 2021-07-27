<?php
class Conexion{
	private $con;
	public function __CONSTRUCT(){

	try {
	$this->con = new PDO("sqlsrv:Server=XD\MSSQLSERVER2;Database=Cerveceria","gambito","gambitosa");

	//set the PDO error mode to exception
	$this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	//echo "Connected successfully";

	}catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
    }
}
public function getConection(){
	return $this->con;
}

}

?>
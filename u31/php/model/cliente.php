<?php

require_once "crud.php";
class cliente  implements CRUD  { 


	private $Idcliente;
	private $nombre;
	private $apellido1;
	private $apellido2;
	private $direccion;
	private $telefono;
	private $correoElectronico;
	private $RFC;
	private $con;

	public function __CONSTRUCT($conexion){
	 $this->con = $conexion;	

	} 
	/*public function __CONSTRUCT($Idcliente, $nombre, $apellido1, $apellido2, $direccion){
		$this -> Idcliente = $Idcliente;
		$this -> nombre = $nombre;
		$this -> apellido1 = $apellido1;
		$this -> apellido2 = $apellido2;
		$this -> direccion = $direccion;
		$this -> conn = $this->GetConection();
	    }*/


	
		//SETTER
		public function getIdCliente() {
		return $this->IdCliente;
	}
		public function setIdCliente($IdCliente) {
			$this -> IdCliente = $IdCliente;
		}

		public function getNombre() {
		return $this->nombre;
	}
		public function setNombre($nombre) {
			$this -> nombre = $nombre;
		}

		public function getApellido1() {
		return $this->apellido1;
	}
		public function setApellido1($apellido1) {
			$this -> apellido1 = $apellido1;
		}

		public function getApellido2() {
		return $this->apellido2;
	}
		public function setApellido2($apellido2) {
			$this -> apellido2 = $apellido2;
		}

		public function getDireccion() {
		return $this->direccion;
	}	
		public function setDireccion($direccion) {
			$this -> direccion = $direccion;
		}
		public function getTelefono() {
		return $this->telefono;
	}	
		public function setTelefono($telefono) {
			$this -> telefono = $telefono;
		}

		public function getCorreoElectronico() {
		return $this->correoElectronico;
	}	
		public function setCorreoElectronico($correoElectronico) {
			$this -> correoElectronico = $correoElectronico;
		}

		public function getRFC() {
		return $this->RFC;
	}	
		public function setRFC($RFC) {
			$this -> RFC = $RFC;
		}
	


	public function create(){
		try{
			$stmt = $this->con->prepare("INSERT INTO cliente(IdCliente, nombre, apellido1, apellido2, direccion, telefono, correoElectronico, RFC) VALUES (?,?,?,?,?,?,?,?)");

$stmt->execute(array($this->IdCliente,$this->nombre,$this->apellido1,$this->apellido2,$this->direccion,$this->telefono,$this->correoElectronico,$this->RFC));

	echo "New records created successfully";
	echo "Cliente registrado";;
	return true;

	//$stmt->close();

	}catch(PDOException $e) {
	echo "Connection Failed: " . $e->getMessage();
}
		}
	
	public function update(){
		try{
	$sql = "UPDATE cliente SET nombre=?, apellido1=?, apellido2=?, direccion=?, telefono=?, correoElectronico=?, RFC=? WHERE IdCliente=?";

  // Prepare statement
  $stmt = $this->con->prepare($sql);

  // execute the query
  $stmt->execute(array($this->nombre,$this->apellido1,$this->apellido2,$this->direccion,$this->telefono,$this->correoElectronico,$this->RFC,$this->IdCliente));

  // echo a message to say the UPDATE succeeded
  echo $stmt->rowCount() . " records UPDATED successfully";
  return true;
	} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
	}
}
public function delete(){
      try {

          $sql = "DELETE FROM cliente WHERE IdCliente=?";

          // Prepare statement
          $stmt = $this->con->prepare($sql);

          // execute the query
          $stmt->execute(array($this->IdCliente));


          // echo a message to say the UPDATE succeeded
          echo $stmt->rowCount() . " records DELETE successfully";
           return true;
          
        } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
}
public function readall(){


        try {

         // $stmt = $this->con->prepare("SELECT * FROM cliente");
          $stmt = $this->con->prepare("SELECT IdCliente,nombre,apellido1,apellido2,direccion,telefono,correoElectronico,RFC FROM cliente");
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $result = $stmt->fetchAll();
        
        return $result;
        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
}

}
public function readid(){
        try {

          //$stmt = $this->con->prepare("SELECT * FROM cliente WHERE IdCliente=?" );
          $stmt = $this->con->prepare("SELECT IdCliente,nombre,apellido1,apellido2,direccion,telefono,correoElectronico,RFC FROM cliente WHERE IdCliente=?");	
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute(array($this->IdCliente));
          $result = $stmt->fetchAll();
        return $result;
        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();

    }    
}
}
?>
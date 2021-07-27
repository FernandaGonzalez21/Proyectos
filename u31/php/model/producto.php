<?php
/**
*
*/

require_once "crud.php";
class Producto  implements CRUD  { 


	private $codigo;
	private $descripcion;
	private $precio;
	private $marca;
	private $tipo;
	private $con;

	public function __CONSTRUCT($conexion){
	 $this->con = $conexion;	

	} 
	/*public function __CONSTRUCT($codigo, $descripcion, $precio, $marca, $tipo){
		$this -> codigo = $codigo;
		$this -> descripcion = $descripcion;
		$this -> precio = $precio;
		$this -> marca = $marca;
		$this -> tipo = $tipo;
		$this -> con = $this->GetConection();
	    }*/


	
		//SETTER
		public function getCodigo() {
		return $this->codigo;
	}
		public function setCodigo($codigo) {
			$this ->codigo = $codigo;
			return $this;
		}

		public function getDescripcion() {
		return $this->descripcion;
	}
		public function setDescripcion($descripcion) {
			$this ->descripcion = $descripcion;
			return $this;
		}

		public function getPrecio() {
		return $this->precio;
	}
		public function setPrecio($precio) {
			$this ->precio = $precio;
			return $this;
		}

		public function getMarca() {
		return $this->marca;
	}
		public function setMarca($marca) {
			$this ->marca = $marca;
			return $this;
		}

		public function getTipo() {
		return $this->tipo;
	}	
		public function setTipo($tipo) {
			$this ->tipo = $tipo;
			return $this;
		}






	
	public function create(){
		try{
			$stmt = $this->con->prepare("INSERT INTO producto(descripcion, precio, marca, tipo) VALUES (?,?,?,?)");

$stmt->execute(array($this->descripcion,$this->precio,$this->marca,$this->tipo));

	echo "New records created successfully";
	//echo "producto registrado";
	return true;

	//$stmt->close();
	
	}catch(PDOException $e) {
	echo "Connection Failed: " . $e->getMessage();
}
		}
	
	public function update(){
		try{
	$sql = "UPDATE producto SET descripcion=?, precio=?, marca=?, tipo=? WHERE codigo=?";

  // Prepare statement
  $stmt = $this->con->prepare($sql);

  // execute the query
  $stmt->execute(array ($this->descripcion,$this->precio,$this->marca,$this->tipo,$this->codigo));

  // echo a message to say the UPDATE succeeded
  echo $stmt->rowCount() . " records UPDATED successfully";
  return true;
	} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
	}
}
public function delete(){
      try {

          $sql = "DELETE FROM producto WHERE codigo=?";

          // Prepare statement
          $stmt = $this->con->prepare($sql);

          // execute the query
          $stmt->execute(array($this->codigo));


          // echo a message to say the UPDATE succeeded
          echo $stmt->rowCount() . " records DELETE successfully";
           return true;
          
        } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
}
public function readall(){


        try {

          //$stmt = $this->con->prepare("SELECT * FROM producto");
          $stmt = $this->con->prepare("SELECT codigo,descripcion,precio,marca,tipo FROM producto");
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

          $stmt = $this->con->prepare("SELECT codigo,descripcion,precio,marca,tipo FROM producto WHERE codigo=?" );
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute(array($this->codigo));
          $result = $stmt->fetchAll();
        return $result;
        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();

    }    
}
}
?>
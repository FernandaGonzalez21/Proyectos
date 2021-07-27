<?php

require_once "crud.php";

class Usuarios implements CRUD{

    private $idUsuario;
    private $Correo;
    private $Clave;
    private $Permisos;
    private $Puesto;
    private $Nombre;
    private $Apellido1;
    private $Apellido2;
    private $fechaNac;
    private $RFC;
    private $Foto;
    private $con;

    public function __CONSTRUCT($conexion){
        $this->con = $conexion;
    }

    //Setter y Getter
    public function getidUsuario()
    {
        return $this->idUsuario;
    }
    
    public function setidUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
        return $this;
    }

    public function getCorreo()
    {
        return $this->Correo;
    }

    public function setCorreo($Correo)
    {
        $this->Correo = $Correo;
        return $this;
    }

    public function getClave()
    {
        return $this->Clave;
    }

    public function setClave($Clave)
    {
        $this->Clave = $Clave;
        return $this;
    }

    public function getPermisos()
    {
        return $this->Permisos;
    }

    public function setPermisos($Permisos)
    {
        $this->Permisos = $Permisos;
        return $this;
    }

    public function getPuesto()
    {
        return $this->Puesto;
    }

    public function setPuesto($Puesto)
    {
        $this->Puesto = $Puesto;
        return $this;
    }

    public function getNombre()
    {
        return $this->Nombre;
    }

    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
        return $this;
    }

    public function getApellido1()
    {
        return $this->Apellido1;
    }

    public function setApellido1($Apellido1)
    {
        $this->Apellido1 = $Apellido1;
        return $this;
    }

    public function getApellido2()
    {
        return $this->Apellido2;
    }

    public function setApellido2($Apellido2)
    {
        $this->Apellido2 = $Apellido2;
        return $this;
    }

    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;
        return $this;
    }

    public function getRFC()
    {
        return $this->RFC;
    }

    public function setRFC($RFC)
    {
        $this->RFC = $RFC;
        return $this;
    }
    public function getFoto()
    {
        return $this->Foto;
    }
    
    public function setFoto($Foto)
    {
        $this->Foto = $Foto;
        return $this;
    }

    //funciones CRUD
    public function create(){
        try{
            $stmt = $this->con->prepare("INSERT INTO usuarios (Correo, Clave, Permisos, Puesto, Nombre, Apellido1, Apellido2, fechaNac, RFC, Foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
            $stmt->execute(array($this->Correo, $this->Clave, $this->Permisos, $this->Puesto, $this->Nombre, $this->Apellido1, $this->Apellido2, $this->fechaNac, $this->RFC, $this->Foto));
            echo "New records created successfully";
            return true;
            }
            catch(PDOException $e) {
               echo "Connection failed: " . $e->getMessage();
            }
        }//Fin create

    public function update(){
        try {          
          $sql = "UPDATE usuarios SET Correo=?, Clave=?, Permisos=?, Puesto=?, Nombre=?, Apellido1=?, Apellido2=?, fechaNac=?, RFC=?, Foto=? WHERE idUsuario=? ";
          // Prepare statement
          $stmt = $this->con->prepare($sql);
          // execute the query
          $stmt->execute(array ($this->Correo, $this->Clave, $this->Permisos, $this->Puesto, $this->Nombre, $this->Apellido1, $this->Apellido2, $this->fechaNac, $this->RFC, $this->Foto, $this->idUsuario));
          // echo a message to say the UPDATE succeeded
          echo $stmt->rowCount() . "records UPDATED successfully";
          return true;
        } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
    }//fin update 

    public function delete(){
        try {
            $sql = "DELETE FROM usuarios WHERE idUsuario=?";
            // Prepare statement
            $stmt = $this->con->prepare($sql);
            // execute the query
            $stmt->execute(array($this->idUsuario));
            // echo a message to say the UPDATE succeeded
            echo $stmt->rowCount() . "records DELETED successfully"; 
              return true;         
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }
    }//Fin delete

    public function readall(){
        try {
          $stmt = $this->con->prepare("SELECT * FROM usuarios");
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $result = $stmt->fetchAll();
        return $result;
        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
    }//Fin readall

    public function readid(){
        try {
          $stmt = $this->con->prepare("SELECT * FROM usuarios WHERE idUsuario=?");
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute(array($this->idUsuario));
          $result = $stmt->fetchAll();          
          return $result;
        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
    }//Fin readid
}
?>
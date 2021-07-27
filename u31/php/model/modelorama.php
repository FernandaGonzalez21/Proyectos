<?php
/**
*
*/


require_once "crud.php";
class Modelorama implements CRUD{

    private $idSucursal;
    private $nameSucursal;
    private $Direccion;
    private $Telefono;
    private $Correo;
    private $RFC;
    private $Foto;
    private $con;

    public function __CONSTRUCT($conexion){
        $this->con = $conexion;
    }

        //Setters&Getters
    public function getIdSucursal(){
        return $this->idSucursal;
    }
    
    public function setIdSucursal($idSucursal){
        $this->idSucursal = $idSucursal;
        return $this;
    }

    public function getNameSucursal(){
        return $this->nameSucursal;
    }
    
    public function setNameSucursal($nameSucursal){
        $this->nameSucursal = $nameSucursal;
        return $this;
    }

    public function getDireccion(){
        return $this->Direccion;
    }
    
    public function setDireccion($Direccion){
        $this->Direccion = $Direccion;
        return $this;
    }

    public function getTelefono(){
        return $this->Telefono;
    }
    
    public function setTelefono($Telefono){
        $this->Telefono = $Telefono;
        return $this;
    }

    public function getCorreo(){
        return $this->Correo;
    }
    
    public function setCorreo($Correo){
        $this->Correo = $Correo;
        return $this;
    }

    public function getRFC(){
        return $this->RFC;
    }
    
    public function setRFC($RFC){
        $this->RFC = $RFC;
        return $this;
    }
    public function getFoto(){
        return $this->Foto;
    }

    public function setFoto($Foto){
         $this->Foto = $Foto;
        return $this;
    }


    //Funciones CRUD
        public function create(){

            try {
                $stmt = $this->con->prepare("INSERT INTO modelorama(nameSucursal, Direccion, Telefono, Correo, RFC, Foto) VALUES (?,?,?,?,?,?)");

                $stmt->execute(array($this->nameSucursal,$this->Direccion,$this->Telefono,$this->Correo,$this->RFC,$this->Foto));

                echo "New records created successfully";
                //echo "Modelorama registrado";;
                return true;
                //$stmt->close();

                }catch(PDOException $e) {
                echo "Connection Failed: " . $e->getMessage();
                }                
            }//fin function create
        
            public function update(){

            try {
                $sql = "UPDATE modelorama SET nameSucursal=?, Direccion=?, Telefono=?, Correo=?, RFC=?, Foto=? WHERE idSucursal=?";
              
                // Prepare statement
                $stmt = $this->con->prepare($sql);
              
                // execute the query
                $stmt->execute(array($this->nameSucursal,$this->Direccion,$this->Telefono,$this->Correo,$this->RFC,$this->Foto,$this->idSucursal));
              
                // echo a message to say the UPDATE succeeded
                echo $stmt->rowCount() . " records UPDATED successfully";
                return true;
              } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
              }              
            }

        public function delete(){
            try {
                $sql = "DELETE FROM modelorama WHERE idSucursal=?";

                // Prepare statement
                $stmt = $this->con->prepare($sql);

                // execute the query
                $stmt->execute(array($this->idSucursal));


                // echo a message to say the UPDATE succeeded
                echo $stmt->rowCount() . " records DELETE successfully";
                return true;
                
                } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
                }
            }
        public function readall(){
            try {
            $stmt = $this->con->prepare("SELECT * FROM modelorama");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $result = $stmt->fetchAll();
            
            return $result;

            }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            }            
        }
        public function readid(){
        try {
          $stmt = $this->con->prepare("SELECT * FROM modelorama WHERE idSucursal=?");
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute(array($this->idSucursal));
          $result = $stmt->fetchAll();          
          return $result;
        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
    }

    }

?>
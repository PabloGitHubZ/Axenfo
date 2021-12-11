<?php

namespace Clases;

use PDO;
use PDOException;

class Switcho extends Conexion {
    /**
    * @access protected
    * @var integer
    */ 
    private $id;
    /**#@+
    * @access protected
    * @var string
    */
    private $nombre;
    private $ip;
    private $marca;
    private $modelo;
    private $numero_serie;
    /**#@-*/

    // Constructor para la clase Switch
    public function __construct() {
        parent::__construct();
    }
    /**
    * getSwitch
    * 
    * Obtiene el objeto Switch por su id
    *
    * @access public
    * @param integer $id ID del Switch
    * @return objeto Switch
    */  
    function getSwitch($id) {
        $consulta = "select * from switches where id=:i";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            die("Error al recuperar switch: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
    * getSwitchN
    * 
    * Obtiene el objeto Switch por su nombre
    *
    * @access public
    * @param string $nombre Nombre del Switch
    * @return objeto Switch
    */  
    function getSwitchN($nombre) {
        $consulta = "select * from switches where nombre=:n";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':n' => $nombre]);
        } catch (PDOException $ex) {
            die("Error al recuperar switch: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
    * getSwitches
    * 
    * Obtiene todas los Switches
    *
    * @access public
    * @param 
    * @return array con los objetos Switch de la BBDD
    */          
    function getSwitches() {
        $consulta = "select * from switches order by id";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar switches: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
    * existeSwitch
    * 
    * Verifica si existe un Switch por su ID
    *
    * @access public
    * @param integer $d ID del Switch
    * @return boolean true si existe, false si no existe
    */    
    function existeSwitch($d) {
        $consulta = "select * from switches where id=:i";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':i' => $i]);
        } catch (PDOException $ex) {
            die("Error al comprobar switches: " . $ex->getMessage());
        }
        if ($stmt->rowCount() == 0) return false;
        return true;
    }

    /**
    * nuevoSwitch
    * 
    * Crea un nuevo registro en la BBDD Switches
    *
    * @access public
    * @param
    * @return
    */  
    function nuevoSwitch() {
        $insert = "insert into switches(nombre, ip, numero_serie) values(:n, :i, :s)";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':i' => $this->ip,
                ':s' => $this->numero_serie,
            ]);
        } catch (PDOException $ex) {
            die("Error al crear switch: " . $ex->getMessage());
        }
    }

    /**
    * actualizarSwitch
    * 
    * Actualiza un Switch por su ID
    *
    * @access public
    * @param integer $id ID del Switch
    * @return
    */  
    function actualizarSwitch($id) {
        $insert = "update switches set nombre=:n, ip=:p, marca=:m, modelo=:d, numero_serie=:s where id=:i";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':i' => $id,
                ':n' => $this->nombre,
                ':p' => $this->ip,
                ':m' => $this->marca,
                ':d' => $this->modelo,
                ':s' => $this->numero_serie,
            ]);
        } catch (PDOException $ex) {
            die("Error al actualizar switch: " . $ex->getMessage());
        }
    }    

    /**
    * borrarSwitch
    * 
    * Elimina un Switch por su ID
    *
    * @access public
    * @param integer $id ID del Switch
    * @return
    */  
    function borrarSwitch($id) {
        $borrado = "delete from switches where id=:i";
        $stmt = $this->conexion->prepare($borrado);
        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            die("Error al borrar switch: " . $ex->getMessage());
        }
    }

    // getters y setters ------------------------------
    
    public function getId() {
        return $this->id;
    } 
    public function getNombre() {
        return $this->nombre;
    } 
    public function getIp() {
        return $this->ip;
    } 
    public function getMarca() {
        return $this->marca;
    }     
    public function getSn() {
        return $this->numero_serie;
    }    
    
    public function setId($id) {
        $this->id = $id;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setIp($ip) {
        $this->ip = $ip;
    }
    public function setMarca($marca) {
        $this->marca = $marca;
    }
    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }
    public function setSn($sn) {
        $this->numero_serie = $sn;
    }
}


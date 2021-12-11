<?php

namespace Clases;

use PDO;
use PDOException;

class Controladora extends Conexion {
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
    private $numero_serie;
    /**#@-*/
    
    // Constructor para la clase Controladora
    public function __construct() {
        parent::__construct();
    }

    /**
    * getControladora
    * 
    * Obtiene el objeto controladora por su id
    *
    * @access public
    * @param integer $id ID de la controladora
    * @return objeto controladora
    */      
    function getControladora($id) {
        $consulta = "select * from controladoras where id=:i";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            die("Error al recuperar controladora: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
    * getControladoraN
    * 
    * Obtiene el objeto controladora por su nombre
    *
    * @access public
    * @param string $nombre Nombre de la controladora
    * @return objeto controladora
    */      
    function getControladoraN($nombre) {
        $consulta = "select * from controladoras where nombre=:n";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':n' => $nombre]);
        } catch (PDOException $ex) {
            die("Error al recuperar controladora: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
    * getControladoras
    * 
    * Obtiene todas las controladoras
    *
    * @access public
    * @param 
    * @return array con los objetos controladora de la BBDD
    */      
    function getControladoras() {
        $consulta = "select * from controladoras order by id";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar controladoras: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
    * existeControladora
    * 
    * Verifica si existe una controladora por su ID
    *
    * @access public
    * @param integer $id ID de la controladora
    * @return boolean true si existe, false si no existe
    */    
    function existeControladora($d) {
        $consulta = "select * from controladoras where id=:i";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':i' => $i]);
        } catch (PDOException $ex) {
            die("Error al comprobar controladora: " . $ex->getMessage());
        }
        if ($stmt->rowCount() == 0) return false;
        return true;
    }

    /**
    * nuevaControladora
    * 
    * Crea un nuevo registro en la BBDD controladoras
    *
    * @access public
    * @param
    * @return
    */    
    function nuevaControladora() {
        $insert = "insert into controladoras(nombre, ip, numero_serie) values(:n, :p, :s)";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':p' => $this->ip,
                ':s' => $this->numero_serie,
            ]);
        } catch (PDOException $ex) {
            die("Error al crear controladora: " . $ex->getMessage());
        }
    }

    /**
    * actualizarControladora
    * 
    * Actualiza una controladora por su ID
    *
    * @access public
    * @param integer $id ID de la controladora
    * @return
    */    
    function actualizarControladora($id) {
        $insert = "update controladoras set nombre=:n, ip=:p, numero_serie=:s where id=:i";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':i' => $id,
                ':n' => $this->nombre,
                ':p' => $this->ip,
                ':s' => $this->numero_serie,
            ]);
        } catch (PDOException $ex) {
            die("Error al actualizar nodo: " . $ex->getMessage());
        }
    }    

    /**
    * borraControladora
    * 
    * Elimina una controladora por su ID
    *
    * @access public
    * @param integer $id ID de la controladora
    * @return
    */    
    function borrarControladora($id) {
        $borrado = "delete from controladoras where id=:i";
        $stmt = $this->conexion->prepare($borrado);
        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            die("Error al borrar controladoras: " . $ex->getMessage());
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

    public function setSn($sn) {
        $this->numero_serie = $sn;
    }
}


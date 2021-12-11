<?php

namespace Clases;

use PDO;
use PDOException;

class Olt extends Conexion {
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
    /**
    * @access protected
    * @var integer
    */
    private $numero_tarjetas;
    
    
    // Constructor para la clase OLT
    public function __construct() {
        parent::__construct();
    }
    /**
    * getOlt
    * 
    * Obtiene el objeto Olt por su id
    *
    * @access public
    * @param integer $id ID de la Olt
    * @return objeto Olt
    */  
    function getOlt($id) {
        $consulta = "select * from olts where id=:i";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            die("Error al recuperar olt: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
    * getOltN
    * 
    * Obtiene el objeto Olt por su nombre
    *
    * @access public
    * @param string $nombre Nombre de la Olt
    * @return objeto Olt
    */  
    function getOltN($nombre) {
        $consulta = "select * from olts where nombre=:n";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':n' => $nombre]);
        } catch (PDOException $ex) {
            die("Error al recuperar olt: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
    * getOlts
    * 
    * Obtiene todas las Olts
    *
    * @access public
    * @param 
    * @return array con los objetos Olt de la BBDD
    */          
    function getOlts() {
        $consulta = "select * from olts order by id";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar olts: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
    * existeOlt
    * 
    * Verifica si existe una Olt por su ID
    *
    * @access public
    * @param integer $id ID de la Olt
    * @return boolean true si existe, false si no existe
    */    
    function existeOlt($d) {
        $consulta = "select * from olts where id=:i";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':i' => $i]);
        } catch (PDOException $ex) {
            die("Error al comprobar olt: " . $ex->getMessage());
        }
        if ($stmt->rowCount() == 0) return false;
        return true;
    }

    /**
    * nuevaOlt
    * 
    * Crea un nuevo registro en la BBDD Olt
    *
    * @access public
    * @param
    * @return
    */  
    function nuevaOlt() {
        $insert = "insert into olts(nombre, ip, numero_serie) values(:n, :p, :s)";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':p' => $this->ip,
                ':s' => $this->numero_serie,
            ]);
        } catch (PDOException $ex) {
            die("Error al crear olt: " . $ex->getMessage());
        }
    }

    /**
    * actualizarOlt
    * 
    * Actualiza una Olt por su ID
    *
    * @access public
    * @param integer $id ID de la Olt
    * @return
    */  
    function actualizarOlts($id) {
        $insert = "update olts set nombre=:n, ip=:p, marca=:m, modelo=:d, numero_serie=:s, numero_tarjetas=:t where id=:i";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':i' => $id,
                ':n' => $this->nombre,
                ':p' => $this->ip,
                ':m' => $this->marca,
                ':d' => $this->modelo,
                ':s' => $this->numero_serie,
                ':t' => $this->numero_tarjetas,
            ]);
        } catch (PDOException $ex) {
            die("Error al actualizar olt: " . $ex->getMessage());
        }
    }    

    /**
    * borrarOlt
    * 
    * Elimina una Olt por su ID
    *
    * @access public
    * @param integer $id ID de la Olt
    * @return
    */  
    function borrarOlt($id) {
        $borrado = "delete from olts where id=:i";
        $stmt = $this->conexion->prepare($borrado);
        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            die("Error al borrar olt: " . $ex->getMessage());
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
        return $this->sn;
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
    public function setTarjetas($tarjetas) {
        $this->numero_tarjetas = $tarjetas;
    }
    public function setSn($sn) {
        $this->numero_serie = $sn;
    }
}



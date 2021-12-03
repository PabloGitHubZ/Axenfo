<?php

namespace Clases;

use PDO;
use PDOException;

class Olt extends Conexion {
    private $id;
    private $nombre;
    private $ip;
    private $marca;
    private $sn;

    public function __construct() {
        parent::__construct();
    }
 
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

    function nuevaOlt() {
        $insert = "insert into olts(nombre, ip, marca, sn) values(:n, :i, :m, :s)";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':i' => $this->ip,
                ':m' => $this->marca,
                ':s' => $this->sn,
            ]);
        } catch (PDOException $ex) {
            die("Error al crear olt: " . $ex->getMessage());
        }
    }

    function actualizarOlts($id) {
        $insert = "update olts set nombre=:n, ip=:i, marca=:d, sn=:s where id=:i";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':i' => $id,
                ':n' => $this->nombre,
                ':i' => $this->ip,
                ':m' => $this->marca,
                ':s' => $this->sn,
            ]);
        } catch (PDOException $ex) {
            die("Error al actualizar olt: " . $ex->getMessage());
        }
    }    

    function borrarOlt($id) {
        $borrado = "delete from olts where id=:i";
        $stmt = $this->conexion->prepare($borrado);
        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            die("Error al borrar olt: " . $ex->getMessage());
        }
    }
    
    function borrarOlts() {
        $borrado = "delete from olts";
        $stmt = $this->conexion->prepare($borrado);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al borrar olts: " . $ex->getMessage());
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
    public function setSn($sn) {
        $this->sn = $sn;
    }
}


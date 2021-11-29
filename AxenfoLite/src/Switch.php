<?php

namespace Clases;

use PDO;
use PDOException;

class Switcho extends Conexion {
    private $id;
    private $nombre;
    private $ip;
    private $marca;
    private $sn;

    public function __construct() {
        parent::__construct();
    }
 
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

    function nuevoSwitch() {
        $insert = "insert into switches(nombre, ip, marca, sn) values(:n, :i, :m, :s)";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':i' => $this->ip,
                ':m' => $this->marca,
                ':s' => $this->sn,
            ]);
        } catch (PDOException $ex) {
            die("Error al crear switch: " . $ex->getMessage());
        }
    }

    function actualizarSwitch($id) {
        $insert = "update switches set nombre=:n, ip=:i, marca=:d, sn=:s where id=:i";
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
            die("Error al actualizar switch: " . $ex->getMessage());
        }
    }    

    function borrarSwitch($id) {
        $borrado = "delete from switches where id=:i";
        $stmt = $this->conexion->prepare($borrado);
        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            die("Error al borrar switch: " . $ex->getMessage());
        }
    }
    
    function borrarSwitches() {
        $borrado = "delete from switches";
        $stmt = $this->conexion->prepare($borrado);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al borrar switches: " . $ex->getMessage());
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


<?php

namespace Clases;

use PDO;
use PDOException;

class Controladora extends Conexion {
    private $id;
    private $nombre;
    private $ip;
    private $marca;
    private $sn;

    public function __construct() {
        parent::__construct();
    }
 
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

    function nuevaControladora() {
        $insert = "insert into controladoras(nombre, ip, marca, sn) values(:n, :i, :m, :s)";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':i' => $this->ip,
                ':m' => $this->marca,
                ':s' => $this->sn,
            ]);
        } catch (PDOException $ex) {
            die("Error al crear controladora: " . $ex->getMessage());
        }
    }

    function actualizarControladora($id) {
        $insert = "update controladoras set nombre=:n, ip=:i, marca=:d, sn=:s where id=:i";
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
            die("Error al actualizar nodo: " . $ex->getMessage());
        }
    }    

    function borrarControladora($id) {
        $borrado = "delete from controladoras where id=:i";
        $stmt = $this->conexion->prepare($borrado);
        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            die("Error al borrar controladoras: " . $ex->getMessage());
        }
    }
    
    function borrarControladoras() {
        $borrado = "delete from controladoras";
        $stmt = $this->conexion->prepare($borrado);
        try {
            $stmt->execute();
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


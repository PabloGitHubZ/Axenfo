<?php

namespace Clases;

use PDO;
use PDOException;

class Tarjeta extends Conexion {
    private $id;
    private $nombre;
    private $ip;
    private $marca;
    private $sn;

    public function __construct() {
        parent::__construct();
    }
 
    function getTarjeta($id) {
        $consulta = "select * from tarjetas where id=:i";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            die("Error al recuperar tarjeta: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    function getTarjetas() {
        $consulta = "select * from tarjetas order by id";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar tarjetas: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function existeTarjeta($d) {
        $consulta = "select * from tarjetas where id=:i";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':i' => $i]);
        } catch (PDOException $ex) {
            die("Error al comprobar tarjeta: " . $ex->getMessage());
        }
        if ($stmt->rowCount() == 0) return false;
        return true;
    }

    function nuevaTarjeta() {
        $insert = "insert into tarjetas(nombre, ip, marca, sn) values(:n, :i, :m, :s)";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':i' => $this->ip,
                ':m' => $this->marca,
                ':s' => $this->sn,
            ]);
        } catch (PDOException $ex) {
            die("Error al crear tarjeta: " . $ex->getMessage());
        }
    }

    function actualizarTarjeta($id) {
        $insert = "update tarjetas set nombre=:n, ip=:i, marca=:d, sn=:s where id=:i";
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
            die("Error al actualizar tarjetas: " . $ex->getMessage());
        }
    }    

    function borrarTarjeta($id) {
        $borrado = "delete from tarjetas where id=:i";
        $stmt = $this->conexion->prepare($borrado);
        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            die("Error al borrar tarjeta: " . $ex->getMessage());
        }
    }
    
    function borrarTarjetas() {
        $borrado = "delete from tarjetas";
        $stmt = $this->conexion->prepare($borrado);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al borrar tarjetas: " . $ex->getMessage());
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




<?php

namespace Clases;

use PDO;
use PDOException;

class Nodo extends Conexion {
    private $id;
    private $nombre;
    private $ubicacion;
    private $direccion_fisica;
    private $controladora;
    private $switch;
    private $olt;
    private $con_incidencia;
    private $estado_construccion;

    public function __construct() {
        parent::__construct();
    }

    function getNodo($id) {
        $consulta = "select * from nodos where id=:i";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            die("Error al recuperar nodo: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    function getNodos() {
        $consulta = "select * from nodos order by id";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar nodos: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function existeNodo($d) {
        $consulta = "select * from nodos where nombre=:n";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':n' => $nombre]);
        } catch (PDOException $ex) {
            die("Error al comprobar nodo: " . $ex->getMessage());
        }
        if ($stmt->rowCount() == 0) return false;
        return true;
    }

    function creaNodo() {
        $insert = "insert into nodos(nombre, ubicacion, direccion_fisica) values(:n, :u, :d)";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':a' => $this->ubicacion,
                ':d' => $this->direccion_fisica,         
            ]);
        } catch (PDOException $ex) {
            die("Error al crear nodo: " . $ex->getMessage());
        }
    }

    function actualizarNodo($id) {
        $insert = "update nodos set nombre=:n, ubicacion=:u, direccion_fisica=:d where id=:i";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':i' => $id,
                ':n' => $this->nombre,
                ':u' => $this->ubicacion,
                ':d' => $this->direccion_fisica,
            ]);
        } catch (PDOException $ex) {
            die("Error al actualizar nodo: " . $ex->getMessage());
        }
    }    

    function borrarNodo($id) {
        $borrado = "delete from nodos where id=:i";
        $stmt = $this->conexion->prepare($borrado);
        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            die("Error al borrar nodo: " . $ex->getMessage());
        }
    }
    
    function borrarNodos() {
        $borrado = "delete from nodos";
        $stmt = $this->conexion->prepare($borrado);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al borrar nodos: " . $ex->getMessage());
        }
    }

    function hayNodos() {
        $consulta = "select * from nodos";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al comprobar si hay datos: " . $ex->getMessage());
        }
        if ($stmt->rowCount() == 0) return false;
        return true;
    }

    // getters y setters ------------------------------

    public function getId() {
        return $this->id;
    } 
    public function getNombre() {
        return $this->nombre;
    } 
    public function getUbicacion() {
        return $this->ubicacion;
    } 
    public function getDireccion() {
        return $this->direccion_fisica;
    }     
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }

    public function setDireccion($direccion_fisica) {
        $this->direccion_fisica = $direccion_fisica;
    }

}


<?php

namespace Clases;

use PDO;
use PDOException;

class Nodo extends Conexion {
    private $id;
    private $nombre;
    private $ubicacion;
    private $direccion_fisica;
    private $latitud;
    private $longitud;
    private $controladora;
    private $switch;
    private $olt;
    private $estado;
    private $pendiente;

    public function __construct() {
        parent::__construct();
    }
    
    function getNodoID($id) {
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
    
    function getNodo($nombre) {
        $consulta = "select * from nodos where nombre=:n";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':n' => $nombre]);
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

    function buscarNodos($clave) {
        $consulta = "select id, nombre, ubicacion, direccion_fisica, estado
                     from nodos where id like '%" . $clave . "%' or nombre like '%" . $clave . "%' or ubicacion like '%" . $clave . "%' or direccion_fisica like '%" . $clave  . "%' or estado like '%" . $clave . "%'";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar nodos: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    function existeNodo($n) {
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
        $insert = "insert into nodos(nombre, ubicacion, direccion_fisica, latitud, longitud, controladora, olt, switch) values(:n, :u, :d, :l, :g, :c, :o, :s)";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':u' => $this->ubicacion,
                ':d' => $this->direccion_fisica,
                ':l' => $this->latitud,
                ':g' => $this->longitud,
                ':c' => $this->controladora,
                ':o' => $this->olt,
                ':s' => $this->switch
            ]);
        } catch (PDOException $ex) {
            die("Error al crear nodo: " . $ex->getMessage());
        }
    }

    function actualizarNodo($id) {
        $insert = "update nodos set ubicacion=:u, direccion_fisica=:d, latitud=:c, longitud=:g, estado=:s, pendiente=:p where id=:i";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':i' => $id,
                ':u' => $this->ubicacion,
                ':d' => $this->direccion_fisica,
                ':c' => $this->latitud,
                ':g' => $this->longitud,
                ':s' => $this->estado,
                ':p' => $this->pendiente
            ]);
        } catch (PDOException $ex) {
            die("Error al actualizar nodo: " . $ex->getMessage());
        }
    }

    function actualizarNodoIncidencia($id) {
        echo "<script> console.log('4'); </script>";
        $insert = "update nodos set estado=:s where id=:i";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':i' => $id,
                ':s' => $this->estado
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
    public function getControl() {
        return $this->controladora;
    }    
    public function getSwitch() {
        return $this->switch;
    }    
    public function getOLT() {
        return $this->olt;
    }      
    public function getEstado() {
        return $this->estado;
    }    
    public function getLatitud() {
        return $this->latitud;
    }  
    public function getLongitud() {
        return $this->longitud;
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

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    
    public function setLatitud($latitud) {
        $this->latitud = $latitud;
    }
    public function setLongitud($longitud) {
        $this->longitud = $longitud;
    }
    
    public function setPendiente($pendiente) {
        $this->pendiente = $pendiente;
    }
    
    public function setControl($controladora) {
        $this->controladora = $controladora;
    }
    
    public function setOlt($olt) {
        $this->olt = $olt;
    }
    
    public function setSwitch($switch) {
        $this->switch = $switch;
    }       
}


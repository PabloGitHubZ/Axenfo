<?php

namespace Clases;

use PDO;
use PDOException;

class Incidencia extends Conexion {
    private $id;
    private $nodo;
    private $fecha_inicio;
    private $fecha_cierre;
    private $tipo;
    private $descripcion;
    private $estado;

    public function __construct() {
        parent::__construct();
    }

    function getIncidencia($id) {
        $consulta = "select * from incidencias where id=:i";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            die("Error al recuperar incidencia: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    function getIncidencias() {
        $consulta = "select * from incidencias order by id";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar incidencias: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function existeIncidencia($n) {
        $consulta = "select * from incidencias where nodo=:n";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':n' => $nodo]);
        } catch (PDOException $ex) {
            die("Error al comprobar incidencia: " . $ex->getMessage());
        }
        if ($stmt->rowCount() == 0) return false;
        return true;
    }
    
    function buscarIncidencias($clave) {
        $consulta = "select nodo, fecha_inicio, tipo, descripcion, estado
                     from incidencias where nodo like '%" . $clave . "%' or fecha_inicio like '%" . $clave . "%' or tipo like '%" . $clave . "%' or descripcion like '%" . $clave . "%' or estado like '%" . $clave . "%'";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar nodos: " . $ex->getMessage());
        }
        $this->conexion = null;
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    function creaIncidencia() {
        $insert = "insert into incidencias(nodo, fecha_inicio, tipo, descripcion, estado) values(:n, :f, :t, :d, :e)";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':n' => $this->nodo,
                ':f' => $this->fecha_inicio,
                ':t' => $this->tipo,
                ':d' => $this->descripcion,  
                ':e' => $this->estado,   
            ]);
        } catch (PDOException $ex) {
            die("Error al crear incidencia: " . $ex->getMessage());
        }
    }

    function actualizarIncidencia($id) {
        $insert = "update incidencias set nodo=:n, fecha_inicio=:f, fecha_cierre=:c, tipo=:t, descripcion=:d, estado=:e where id=:i";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':i' => $id,
                ':n' => $this->nodo,
                ':f' => $this->fecha_inicio,
                ':c' => $this->fecha_cierre,
                ':t' => $this->tipo,
                ':d' => $this->descripcion,
                ':e' => $this->estado,
            ]);
        } catch (PDOException $ex) {
            die("Error al actualizar incidencia: " . $ex->getMessage());
        }
    }    

    function borrarIncidencia($id) {
        $borrado = "delete from incidencias where id=:i";
        $stmt = $this->conexion->prepare($borrado);
        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            die("Error al borrar incidencia: " . $ex->getMessage());
        }
    }
    
    function borrarIncidencias() {
        $borrado = "delete from incidencias";
        $stmt = $this->conexion->prepare($borrado);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al borrar incidencias: " . $ex->getMessage());
        }
    }

    function hayIncidencias() {
        $consulta = "select * from incidencias";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al comprobar si hay incidencias: " . $ex->getMessage());
        }
        if ($stmt->rowCount() == 0) return false;
        return true;
    }

    // getters y setters ------------------------------

    public function getId() {
        return $this->id;
    } 
    public function getNodo() {
        return $this->nodo;
    } 
    public function getFecha() {
        return $this->fecha_inicio;
    } 
    public function getDescripcion() {
        return $this->descripcion;
    }     
    public function getEstado() {
        return $this->estado;
    }     
    
    public function setNodo($nodo) {
        $this->nodo = $nodo;
    }

    public function setFechaInicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function setFechaCierre($fecha_cierre) {
        $this->fecha_cierre = $fecha_cierre;
    }
       
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

}


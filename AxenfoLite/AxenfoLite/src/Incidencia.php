<?php

namespace Clases;

use PDO;
use PDOException;

class Incidencia extends Conexion {
    /**
    * @access protected
    * @var integer
    */ 
    private $id;    
    private $nodo;
    /**#@+
    * @access protected
    * @var string
    */
    private $fecha_inicio;
    private $fecha_cierre;
    private $tipo;
    private $descripcion;
    private $estado;
    /**#@-*/
    
    // Constructor para la clase Incidencia
    public function __construct() {
        parent::__construct();
    }
    
    /**
    * getIncidencia
    * 
    * Obtiene el objeto Incidencia por su id
    *
    * @access public
    * @param integer $id ID de la Incidencia
    * @return objeto Incidencia
    */ 
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

    /**
    * getIncidencias
    * 
    * Obtiene todas las Incidencias
    *
    * @access public
    * @param 
    * @return array con los objetos Incidencias de la BBDD
    */          
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

    /**
    * existeIncidencia
    * 
    * Verifica si existe una Incidencia por su nodo asociado
    *
    * @access public
    * @param integer $n ID del nodo asociado
    * @return boolean true si existe false si no existe
    */    
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

    /**
    * buscarIncidencias
    * 
    * Busca si existen incidencias mediante una clave
    *
    * @access public
    * @param string $clave clave de búsqueda
    * @return array listado de objetos incidencia
    */        
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

    /**
    * creaIncidencia
    * 
    * Crea un nuevo registro en la BBDD Incidencias
    *
    * @access public
    * @param
    * @return
    */       
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

    /**
    * actualizaIncidencia
    * 
    * Actualiza una Incidencia por su ID
    *
    * @access public
    * @param integer $id ID de la Incidencia
    * @return
    */  
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

    /**
    * borrarIncidencia
    * 
    * Elimina una Incidencia por su ID
    *
    * @access public
    * @param integer $id ID de la Incidencia
    * @return
    */  
    function borrarIncidencia($id) {
        $borrado = "delete from incidencias where id=:i";
        $stmt = $this->conexion->prepare($borrado);
        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            die("Error al borrar incidencia: " . $ex->getMessage());
        }
    }

    /**
    * hayControladora
    * 
    * Comprueba si hay Incidencias en la BBDD
    *
    * @access public
    * @param 
    * @return boolean true si hay incidencias, false si no las hay
    */  
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


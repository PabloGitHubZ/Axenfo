<?php

namespace Clases;

use PDO;
use PDOException;

class Conexion {
    /**#@+
    * @access protected
    * @var string
    */
    private $host;
    private $db;
    private $user;
    private $pass;
    private $dsn;
    protected $conexion;
    /**#@-*/
    
    // Constructor para la clase Conexion
    public function __construct() {
        $this->host = "localhost";
        $this->db = "axenfodb";
        $this->user = "noc";
        $this->pass = "axenfopass";
        $this->dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
        $this->crearConexion();
    }
    /**
    * Crea una nueva conexión
    *
    * Crea una conexión con los valores indicados en el constructor
    *
    * @access public
    * @param 
    * @return objeto conexion
    */  
    public function crearConexion() {
        try {
            $this->conexion = new PDO($this->dsn, $this->user, $this->pass);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            die("Error en la conexión: mensaje: " . $ex->getMessage());
        }
        return $this->conexion;
    }
}

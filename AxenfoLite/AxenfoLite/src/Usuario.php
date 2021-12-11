<?php 

namespace Clases;

use PDO;
use PDOException;

class Usuario extends Conexion {
    /**#@+
    * @access protected
    * @var string
    */
    private $usuario;
    private $clave;
    /**#@-*/

    // Constructor para la clase Usuario
    public function __construct() {
        parent::__construct();
    } 
    
    /**
    * comprobarUsuario
    * 
    * Comprueba el usuario y la clave para el acceso
    *
    * @access public
    * @param string $user usuario
    * @param string $pass password
    * @return boolean true si está en la base de datos y false si no está
    */     
    public function comprobarUsuario($user, $pass) {
        $consulta = "select usuario from usuarios where usuario=:u and clave=:c";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':u' => $user,
                            ':c' => $pass]);
        } catch (PDOException $ex) {
            die("Error al comprobar usuario: " . $ex->getMessage());
        }
        if ($stmt->rowCount() == 0) return false;
        return true;
    }
}


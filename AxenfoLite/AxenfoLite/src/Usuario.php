<?php 

namespace Clases;

use PDO;
use PDOException;

class Usuario extends Conexion {
    private $usuario;
    private $clave;

    public function __construct() {
        parent::__construct();
    } 
    
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
        $_SESSION['usuario'] = $user;
        $_SESSION['nodo']= 0;
        return true;
    }
}


<?php 

namespace Clases;
require '../src/Conexion.php';

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
        echo("<script>console.log('PHP: " . $stmt . "');</script>");
        try {
            $stmt->execute([':u' => $user,
                            ':c' => $pass]);
        } catch (PDOException $ex) {
            die("Error al comprobar usuario: " . $ex->getMessage());
        }
        echo("<script>console.log('PHP: " . $stmt . "');</script>");
        
        if ($stmt->rowCount() == 0) return false;
        $_SESSION['usuario'] = $user;
        $_SESSION['nodo']= 0;
        return true;
    }
    
//    
//
////metodo insertar regiustro
//public function insertar($nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$permisos){
//	$sql="INSERT INTO usuario (nombre,tipo_documento,num_documento,direccion,telefono,email,cargo,login,clave,imagen,condicion) VALUES ('$nombre','$tipo_documento','$num_documento','$direccion','$telefono','$email','$cargo','$login','$clave','$imagen','1')";
//	//return ejecutarConsulta($sql);
//	 $idusuarionew=ejecutarConsulta_retornarID($sql);
//	 $num_elementos=0;
//	 $sw=true;
//	 while ($num_elementos < count($permisos)) {
//
//	 	$sql_detalle="INSERT INTO usuario_permiso (idusuario,idpermiso) VALUES('$idusuarionew','$permisos[$num_elementos]')";
//
//	 	ejecutarConsulta($sql_detalle) or $sw=false;
//
//	 	$num_elementos=$num_elementos+1;
//	 }
//	 return $sw;
//}
//
//public function editar($idusuario,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$imagen,$permisos){
//	$sql="UPDATE usuario SET nombre='$nombre',tipo_documento='$tipo_documento',num_documento='$num_documento',direccion='$direccion',telefono='$telefono',email='$email',cargo='$cargo',login='$login',imagen='$imagen' 
//	WHERE idusuario='$idusuario'";
//	 ejecutarConsulta($sql);
//
//	 //eliminar permisos asignados
//	 $sqldel="DELETE FROM usuario_permiso WHERE idusuario='$idusuario'";
//	 ejecutarConsulta($sqldel);
//
//	 	 $num_elementos=0;
//	 $sw=true;
//	 while ($num_elementos < count($permisos)) {
//
//	 	$sql_detalle="INSERT INTO usuario_permiso (idusuario,idpermiso) VALUES('$idusuario','$permisos[$num_elementos]')";
//
//	 	ejecutarConsulta($sql_detalle) or $sw=false;
//
//	 	$num_elementos=$num_elementos+1;
//	 }
//	 return $sw;
//}
//public function editar_clave($idusuario,$clave){
//	$sql="UPDATE usuario SET clave='$clave' WHERE idusuario='$idusuario'";
//	return ejecutarConsulta($sql);
//}
//public function mostrar_clave($idusuario){
//	$sql="SELECT idusuario, clave FROM usuario WHERE idusuario='$idusuario'";
//	return ejecutarConsultaSimpleFila($sql);
//}
//public function desactivar($idusuario){
//	$sql="UPDATE usuario SET condicion='0' WHERE idusuario='$idusuario'";
//	return ejecutarConsulta($sql);
//}
//public function activar($idusuario){
//	$sql="UPDATE usuario SET condicion='1' WHERE idusuario='$idusuario'";
//	return ejecutarConsulta($sql);
//}
//
////metodo para mostrar registros
//public function mostrar($idusuario){
//	$sql="SELECT * FROM usuario WHERE idusuario='$idusuario'";
//	return ejecutarConsultaSimpleFila($sql);
//}
//
////listar registros
//public function listar(){
//	$sql="SELECT * FROM usuario";
//	return ejecutarConsulta($sql);
//}
//
////metodo para listar permmisos marcados de un usuario especifico
//public function listarmarcados($idusuario){
//	$sql="SELECT * FROM usuario_permiso WHERE idusuario='$idusuario'";
//	return ejecutarConsulta($sql);
//}
}
 ?>

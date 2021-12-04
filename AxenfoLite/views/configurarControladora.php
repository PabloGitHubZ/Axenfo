<?php

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Nodo.php";
require_once "../src/Controladora.php";
use Clases\Nodo;
use Clases\Controladora;

$controladora = new Controladora;
$idControladora = $_GET['control'];
$controlActual = $controladora->getControladora($idControladora);

?>
    <div class="content-wrapper">
        <h1 class="page-header text-center">Actualizar Controladora <?php echo $controlActual->nombre; ?></h1>
        <div class="form-row" id="formNodo">
            <form action="" name="formControladora" id="formControladora" method="POST">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-danger" type="submit" id="borrar" name="borrar"><i class="glyphicon glyphicon-alert"></i> Eliminar Controladora</button>
            </div>    
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="ubicacion">Nombre:</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $controlActual->nombre; ?>">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="direccion">IP:</label>
                <input type="text" class="form-control" name="ip" id="ip" value="<?php echo $controlActual->ip; ?>">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="direccion">Número de Serie:</label>
                <input type="text" class="form-control" name="serial" id="serial" value="<?php echo $controlActual->numero_serie; ?>">
            </div>
              
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-primary" type="submit" id="guardar" name="guardar"><i class="fa fa-save"></i> Guardar</button>
                <a id="btngrupos" href="vistaGlobal.php"><button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
            </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/borrar.js"></script>
    
    <?php

    if (isset($_POST['guardar'])) {
        $controladora = new Controladora;
        $nombre = trim($_POST['nombre']);
        $ip = trim($_POST['ip']);
        $serial = trim($_POST['serial']);
        $controladora->setNombre(ucwords($nombre));
        $controladora->setIp($ip);
        $controladora->setSn($serial);
        $controladora->actualizarControladora($idControladora);
        echo "<script> console.log('324qwerqwerwe34'); </script>";
        $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Cambio en controladora: " . $nombre . " " . $ip . " " . $serial) or die("Error escribiendo en el archivo log");
        fclose($archivoLog);
        
        $controladora = null;    
        
        header("Location:listadoControladoras.php");
    }

    if (isset($_POST['borrar'])) {
        echo "<script> confirmarDispositivo(); </script>";
        $controladora = new Controladora;
        $controladora->borrarNodo($idControladora);
        
        $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Controladora eliminada: " . $nombre) or die("Error escribiendo en el archivo log");
        fclose($archivoLog);   
        
        $controladora = null;       
        header("Location:listadoControladoras.php");
     }
    
    ?>
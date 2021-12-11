<?php
require 'cabecera.php';
use Clases\Nodo;
use Clases\Controladora;

$controladora = new Controladora;
$idControladora = $_GET['control'];
$controlActual = $controladora->getControladora($idControladora);

?>
    <div class="content-wrapper">
        <h1 class="page-header text-center">Actualizar <?php echo $controlActual->nombre; ?></h1>
        <div class="form-row" id="formControladora">
            <form action="" name="formControladora" id="formControladora" method="POST">  
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="nombre">Nombre:</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $controlActual->nombre; ?>">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="ip">IP:</label>
                <input type="text" class="form-control" name="ip" id="ip" value="<?php echo $controlActual->ip; ?>">
                <button class="btn btn-warning" type="submit" id="comprobar" name="comprobar" onclick="validaIP()"><i class="fa fa-warning"></i> Comprobar IP</button>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="serial">Número de Serie:</label>
                <input type="text" class="form-control" name="serial" id="serial" value="<?php echo $controlActual->numero_serie; ?>">
            </div>
              
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-primary" type="submit" id="guardar" name="guardar"><i class="fa fa-save"></i> Guardar</button>
                <a href="vistaGlobal.php"><button class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
            </div>
            </form>
        </div>
    </div>
    <script type='text/javascript' src='../views/js/validarIP.js'></script>
    
    <?php
    
    $controladora = new Controladora();
    $nombre = trim($_POST['nombre']);
    $ip = trim($_POST['ip']);
    $serial = trim($_POST['serial']);  
    
    if (isset($_POST['guardar'])) {
        
        $controladora->setNombre(ucwords($nombre));
        $controladora->setIp($ip);
        $controladora->setSn($serial);
        $controladora->actualizarControladora($idControladora);

        $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Cambio en controladora: " . $nombre . " " . $ip . " " . $serial) or die("Error escribiendo en el archivo log");
        fclose($archivoLog);

        $controladora = null;    
        echo "<script> alert('Registro modificado'); $(location).attr('href','vistaGlobal.php'); </script>"; 
    }
   
    ?>
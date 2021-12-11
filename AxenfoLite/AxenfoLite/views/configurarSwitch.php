<?php
require 'cabecera.php';
use Clases\Nodo;
use Clases\Switcho;

$switch = new Switcho();
$idSwitch = $_GET['switch'];
$switchActual = $switch->getSwitch($idSwitch);

?>
    <div class="content-wrapper">
        <h1 class="page-header text-center">Actualizar <?php echo $switchActual->nombre; ?></h1>
        <div class="form-row" id="formSwitch">
            <form action="" name="formSwitch" id="formSwitch" method="POST">   
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="ubicacion">Nombre:</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $switchActual->nombre; ?>">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="direccion">IP:</label>
                <input type="text" class="form-control" name="ip" id="ip" value="<?php echo $switchActual->ip; ?>">
                <button class="btn btn-warning" type="submit" id="comprobar" name="comprobar" onclick="validaIP()"><i class="fa fa-warning"></i> Comprobar IP</button>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca" id="marca" value="<?php echo $switchActual->marca; ?>">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo" id="modelo" value="<?php echo $switchActual->modelo; ?>">
            </div> 
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="direccion">Número de Serie:</label>
                <input type="text" class="form-control" name="serial" id="serial" value="<?php echo $switchActual->numero_serie; ?>">
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
    
    $switch = new Switcho();
    $nombre = trim($_POST['nombre']);
    $ip = trim($_POST['ip']);
    $serial = trim($_POST['serial']);
    $marca = trim($_POST['marca']);
    $modelo = trim($_POST['modelo']);
    
    if (isset($_POST['guardar'])) {
        $switch->setNombre(ucwords($nombre));
        $switch->setIp($ip);
        $switch->setSn($serial);
        $switch->setMarca($marca);
        $switch->setModelo($modelo);
        $switch->actualizarSwitch($idSwitch);

        $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Cambio en Switch: " . $nombre . " " . $ip . " " . $serial) or die("Error escribiendo en el archivo log");
        fclose($archivoLog);
        
        $switch = null;    
        echo "<script> alert('Registro modificado'); $(location).attr('href','vistaGlobal.php'); </script>"; 
    }
    
    ?>
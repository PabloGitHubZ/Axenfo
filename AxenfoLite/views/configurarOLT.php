<?php

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Nodo.php";
require_once "../src/Olt.php";
use Clases\Nodo;
use Clases\Olt;

$olt = new Olt();
$idOlt = $_GET['olt'];
$oltActual = $olt->getOlt($idOlt);

?>
    <div class="content-wrapper">
        <h1 class="page-header text-center">Actualizar <?php echo $oltActual->nombre; ?></h1>
        <div class="form-row" id="formOLT">
            <form action="" name="formOLT" id="formOLT" method="POST">
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="nombre">Nombre:</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $oltActual->nombre; ?>">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="ip">IP:</label>
                <input type="text" class="form-control" name="ip" id="ip" value="<?php echo $oltActual->ip; ?>">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca" id="marca" value="<?php echo $oltActual->marca; ?>">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo" id="modelo" value="<?php echo $oltActual->modelo; ?>">
            </div>                
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="direccion">Número de Serie:</label>
                <input type="text" class="form-control" name="serial" id="serial" value="<?php echo $oltActual->numero_serie; ?>">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="direccion">Número de Tarjetas:</label>
                <input type="text" class="form-control" name="tarjetas" id="tarjetas" value="<?php echo $oltActual->numero_tarjetas; ?>">
            </div>              
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-primary" type="submit" id="guardar" name="guardar"><i class="fa fa-save"></i> Guardar</button>
                <a id="btngrupos" href="vistaGlobal.php"><button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
            </div>
            </form>
        </div>
    </div>
    
    <?php
    
    $olt = new Olt();
    $nombre = trim($_POST['nombre']);
    $ip = trim($_POST['ip']);
    $serial = trim($_POST['serial']);
    $marca = trim($_POST['marca']);
    $modelo = trim($_POST['modelo']);
    $tarjetas = trim($_POST['tarjetas']);
    
    if (isset($_POST['guardar'])) {
        $olt->setNombre(ucwords($nombre));
        $olt->setIp($ip);
        $olt->setSn($serial);
        $olt->setMarca($marca);
        $olt->setModelo($modelo);
        $olt->setTarjetas($tarjetas);
        $olt->actualizarOlts($idOlt);

        $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Cambio en OLT: " . $nombre . " " . $ip . " " . $serial) or die("Error escribiendo en el archivo log");
        fclose($archivoLog);
        
        $olt = null;    
        echo "<script> alert('Registro modificado'); $(location).attr('href','vistaGlobal.php'); </script>"; 
    }
   
    ?>
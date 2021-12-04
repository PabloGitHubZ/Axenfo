<?php

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Nodo.php";
require_once '../src/Controladora.php';
require_once '../src/OLT.php';
require_once '../src/Switch.php';

use Clases\Nodo;
use Clases\Controladora;
use Clases\Olt;
use Clases\Switcho;

    $nodo = new Nodo();
    $controladora = new Controladora();
    $olt = new Olt();
    $switch = new Switcho();
    
    $idNodo = $_GET['nodo'];
    $_SESSION['nodo'] = $idNodo;

    $nodoActual = $nodo->getNodoID($idNodo);
    $numeroControladora = $nodoActual->controladora;
    $numeroOlt = $nodoActual->olt;
    $numeroSwitch = $nodoActual->switch;
    
?>

<div class="content-wrapper">
    <h1 class="page-header text-center"> <?php echo $nodoActual->nombre; ?></h1>
        <div class="panel-body">
            <div class="box-tools pull-right">
                <a id="modificaNodo" href="configurarNodo.php?nodo=<?php echo $nodoActual->id; ?>"><button class="btn btn-warning">Modificar</button></a> 
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="ubicacion">Ubicación:</label>
                <output class="form-control" type="text" name="ubicacion" id="ubicacion"><?php echo $nodoActual->ubicacion; ?></output>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="direccion">Dirección:</label>
                <output class="form-control" type="text" name="direccion" id="direccion"><?php echo $nodoActual->direccion_fisica; ?></output>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="direccion">Estado de construcción:</label>
                <output class="form-control" type="text" name="estado" id="estado"><?php echo $nodoActual->estado; ?></output>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="direccion">En incidencia:</label>
                <output class="form-control" type="text" name="con_incidencia" id="con_incidencia"><?php echo $nodoActual->con_incidencia; ?></output>
            </div>
        </div>    
    
<?php    
 
    if ($numeroControladora != null) {
        $controladoraActual = $controladora->getControladora($numeroControladora);

?>


        <div class="panel-body">
            <div class="box-tools pull-right">
                <a id="modificaControladora" href="configurarControladora.php?nodo=<?php echo $nodoActual->id; ?>"><button class="btn btn-warning">Modificar</button></a> 
            </div>
            <h2 class="panel-primary">Controladora</h2>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="nombre">Nombre:</label>
                <output type="text" class="form-control" name="nombre" id="nombre"><?php echo $controladoraActual->nombre; ?></output>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="ip">IP:</label>
                <output type="text" class="form-control" name="ip" id="ip"><?php echo $controladoraActual->ip; ?></output>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="serial">Número de Serie:</label>
                <output type="text" class="form-control" name="serial" id="serial"><?php echo $controladoraActual->numero_serie; ?></output>
            </div>
        </div>
    
<?php    
    
    }
    if ($numeroOlt != null) {
        $oltActual = $olt->getOlt($numeroOlt);

?>
    
        <div class="panel-body">
            <div class="box-tools pull-right">
                <a id="modificaOLT" href="configurarOLT.php?nodo=<?php echo $nodoActual->id; ?>"><button class="btn btn-warning">Modificar</button></a> 
            </div>
            <h2 class="panel-primary">OLT</h2>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="nombre">Nombre:</label>
                <output type="text" class="form-control" name="nombre" id="nombre"><?php echo $oltActual->nombre; ?></output>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="ip">IP:</label>
                <output type="text" class="form-control" name="ip" id="ip"><?php echo $oltActual->ip; ?></output>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="marca">Marca:</label>
                <output type="text" class="form-control" name="marca" id="marca"><?php echo $oltActual->marca; ?></output>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="serial">Número de Serie:</label>
                <output type="text" class="form-control" name="serial" id="serial"><?php echo $oltActual->numero_serie; ?></output>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="serial">Número de tarjetas:</label>
                <output type="text" class="form-control" name="numero_tarjetas" id="numero_tarjetas"><?php echo $oltActual->numero_tarjetas; ?></output>
            </div>
        </div>
    
<?php

    }
    if ($numeroSwitch != null) {
        $switchActual = $switch->getSwitch($numeroSwitch);

?>    
    
        <div class="panel-body">
            <div class="box-tools pull-right">
                <a id="modificaSwitch" href="configurarSwitch.php"><button class="btn btn-warning">Modificar</button></a> 
            </div>
            <h2 class="panel-primary">Switch</h2>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="nombre">Nombre:</label>
                <output type="text" class="form-control" name="nombre" id="nombre"><?php echo $switchActual->nombre; ?></output>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="ip">IP:</label>
                <output type="text" class="form-control" name="ip" id="ip"><?php echo $switchActual->ip; ?></output>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="marca">Marca:</label>
                <output type="text" class="form-control" name="marca" id="marca"><?php echo $switchActual->marca; ?></output>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="serial">Número de Serie:</label>
                <output type="text" class="form-control" name="serial" id="serial"><?php echo $switchActual->numero_serie; ?></output>
            </div>
        </div>
        </div>
</div>

<?php    
 
}

?>
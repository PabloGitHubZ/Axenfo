<?php

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Nodo.php";
use Clases\Nodo;
$_SESSION['nodo']='nodo vigo';

    $nodo = new Nodo();
    $nombreNodo = $_SESSION['nodo'];
    $nodoActual = $nodo->getNodo($nombreNodo);
?>

<div class="container">
    <h1 class="page-header text-center"> Nodo <?php echo $_SESSION['nodo']; ?></h1>
        <div class="panel-body">
            <div class="box-tools pull-right">
                <a id="modificaNodo" href="configurarNodo.php"><button class="btn btn-warning">Modificar</button></a> 
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
                <output class="form-control" type="text" name="estado" id="estado"><?php echo $nodoActual->estado_construccion; ?></output>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="direccion">En incidencia:</label>
                <output class="form-control" type="text" name="con_incidencia" id="con_incidencia"><?php echo $nodoActual->con_incidencia; ?></output>
            </div>
        </div>
        <div class="panel-body">
            <div class="box-tools pull-right">
                <a id="modificaControladora" href="configurarNodo.php"><button class="btn btn-warning">Modificar</button></a> 
            </div>
            <h2 class="panel-primary">Controladora</h2>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="ip">IP:</label>
                <input type="text" class="form-control" name="ip" id="ip" placeholder="IP">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="serial">Número de Serie:</label>
                <input type="text" class="form-control" name="serial" id="serial" placeholder="Número de serie">
            </div>
        </div>
        <div class="panel-body">
            <div class="box-tools pull-right">
                <a id="modificaOLT" href="configurarNodo.php"><button class="btn btn-warning">Modificar</button></a> 
            </div>
            <h2 class="panel-primary">OLT</h2>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="ip">IP:</label>
                <input type="text" class="form-control" name="ip" id="ip" placeholder="IP">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="serial">Número de Serie:</label>
                <input type="text" class="form-control" name="serial" id="serial" placeholder="Número de serie">
            </div>
        </div>
        <div class="panel-body">
            <div class="box-tools pull-right">
                <a id="modificaSwitch" href="configurarNodo.php"><button class="btn btn-warning">Modificar</button></a> 
            </div>
            <h2 class="panel-primary">Switch</h2>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="ip">IP:</label>
                <input type="text" class="form-control" name="ip" id="ip" placeholder="IP">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="serial">Número de Serie:</label>
                <input type="text" class="form-control" name="serial" id="serial" placeholder="Número de serie">
            </div>
        </div>
        </div>
</div>

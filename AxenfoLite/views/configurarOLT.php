<?php

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Nodo.php";
require_once "../src/Olt.php";
use Clases\Nodo;
use Clases\Olt;

$nodo = new Nodo();
$idNodo = $_GET['nodo'];
$_SESSION['nodo'] = $idNodo;
$nodoActual = $nodo->getNodoID($idNodo);

?>
    <div class="content-wrapper">
        <h1 class="page-header text-center">Actualizar OLT <?php echo $nodoActual->nombre; ?></h1>
        <div class="box-tools pull-right">
            <a href="configurarControladora.php?nodo=<?php echo $nodoActual->id; ?>"><button class="btn btn-warning"><i class='glyphicon glyphicon-arrow-up'></i> Actualizar Controladora</button></a>
            <a href="configurarSwitch.php?nodo=<?php echo $nodoActual->id; ?>"><button class="btn btn-warning"><i class='glyphicon glyphicon-arrow-up'></i> Actualizar Switch</button></a>
        </div> 
        <div class="form-row" id="formNodo">
            <form action="" name="formControladora" id="formControladora" method="POST">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-danger" type="submit" id="borrar" name="borrar"><i class="glyphicon glyphicon-alert"></i> Eliminar OLT</button>
            </div>                
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="ubicacion">Nombre:</label>
                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="<?php echo $controladora->nombre; ?>">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="direccion">IP:</label>
                <input type="text" class="form-control" name="ip" id="ip" placeholder="IP">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="direccion">Marca:</label>
                <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="direccion">Número de Serie:</label>
                <input type="text" class="form-control" name="serial" id="serial" placeholder="Número de serie">
            </div>
              
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-primary" type="submit" id="guardar" name="guardar"><i class="fa fa-save"></i> Guardar</button>
                <a id="btngrupos" href="vistaGlobal.php"><button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
            </div>
            </form>
        </div>
    </div>
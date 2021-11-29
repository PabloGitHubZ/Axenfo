<?php

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Incidencia.php";
use Clases\Incidencia;

$incidencia = new Incidencia();
$idIncidencia = $_GET['incidencia'];
$_SESSION['incidencia'] = $idIncidencia;
$incidenciaActual = $incidencia->getIncidencia($idIncidencia);

?>

<div class="content-wrapper">
    <h1 class="page-header text-center">Modificar Incidencia <?php echo $_SESSION['incidencia']; ?></h1>
        <div class="form-row" id="formNodo">
          <form action="" name="formNodo" id="formNodo" method="POST">
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label for="ubicacion">Nodo:</label>
              <input class="form-control" type="text" name="nodo" id="nodo" placeholder="Nodo">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label for="direccion">Fecha:</label>
              <input type="text" class="form-control" name="fecha" id="fecha" placeholder="Fecha">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label for="direccion">Descripción:</label>
              <input type="text" class="form-control" name="descripción" id="descripción" placeholder="Descripción">
            </div>
            <div class="form-group col-lg-8 col-md-8 col-xs-12">
              <label for="nombre">Estado:</label>
              <select name="componente">
                   <option value="1">Abierto</option> 
                   <option value="2">En curso</option> 
                   <option value="3">Cerrado</option>
               </select>
            </div>
              
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <button class="btn btn-primary" type="submit" id="guardar"><i class="fa fa-save"></i> Guardar</button>
              <a id="btngrupos" href="vistaGlobal.php"><button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
            </div>
          </form>
        </div>
</div>

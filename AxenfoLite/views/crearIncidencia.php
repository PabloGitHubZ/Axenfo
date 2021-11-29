<?php

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Incidencia.php";
use Clases\Incidencia;
?>

<div class="content-wrapper">
    <h1 class="page-header text-center">Crear nueva incidencia</h1>
        <div class="form-row" id="formNodo">
          <form action="" name="formNodo" id="formNodo" method="POST">
            <div class="form-group col-lg-8 col-md-8 col-xs-12">
              <label for="nombre">Nombre del Nodo:</label>
<!--              <input type="hidden" id="id" name="id" value="<?php echo $_GET["id"];?>">
              <input class="form-control" type="hidden" name="idNodo" id="idNodo">-->
              <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" required>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label for="ubicacion">Fecha:</label>
                    <input class="form-control" type="date" name="fecha" id="fecha" placeholder="Fecha" required>
            </div>
              <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label for="direccion">Descripción:</label>
              <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción" required>
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

<script type="text/javascript" src="js/nuevaIncidencia.js"></script>

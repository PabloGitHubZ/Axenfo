<?php
require 'cabecera.php';
use Clases\Incidencia;
use Clases\Nodo;

?>

<div class="content-wrapper">
    <h1 class="page-header text-center">Crear nueva incidencia</h1>
    <div class="form-row" id="formIncidencia">
        <form action="" name="formIncidencia" id="formIncidencia" method="POST">
            <div class="form-group col-lg-8 col-md-8 col-xs-12">
              <label for="idNodo">Nombre del Nodo:</label>
              <select name="idNodo">
                <?php
                    $nodo = new Nodo();
                    $nodos = $nodo->getNodos();
                    foreach ($nodos as $nodo) {       
                    echo "<option value='$nodo->id'>$nodo->nombre</option>'";  
                    }
                    $nodo = null;
                ?>
              </select>
            </div>
            <div class="form-group col-lg-8 col-md-8 col-xs-12">
                <label for="fecha">Fecha apertura:</label>
                <input class="form-control" type="date" name="fecha" id="fecha" placeholder="Fecha" required>
            </div>
            <div class="form-group col-lg-8 col-md-8 col-xs-12">
                <label for="tipo">Tipo de incidencia:</label>
                <select name="tipo">
                   <option value="CPD">CPD</option> 
                   <option value="Planta Externa">Planta Externa</option> 
                </select>
            </div>   
            <div class="form-group col-lg-8 col-md-8 col-xs-12">
                <label for="descripcion">Descripción:</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción" required>
            </div>
              
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <button class="btn btn-primary" type="submit" id="guardar" name="guardar"><i class="fa fa-save"></i> Guardar</button>
              <a href="vistaGlobal.php"><button class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
            </div>
        </form>
    </div>
</div>

    <?php

    if (isset($_POST['guardar'])) {
        
        $nodo = new Nodo();

        $idNodo = $_POST['idNodo'];
        $fecha = $_POST['fecha'];
        $tipo = $_POST['tipo'];
        $descripcion = $_POST['descripcion'];
        $estado = "Abierto"; 
        $estado_nodo = "En incidencia";
        $nodoActual = $nodo->getNodoID($idNodo);
        $nombreNodo = $nodoActual->nombre;
        
        $incidencia = new Incidencia();
        $incidencia->setNodo($idNodo);
        $incidencia->setFechaInicio($fecha);
        $incidencia->setTipo($tipo);
        $incidencia->setDescripcion($descripcion);
        $incidencia->setEstado($estado);    
        $incidencia->creaIncidencia();
        
        $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Nueva incidencia: " . $idNodo . " " . $fecha . " " . $tipo . " " . $descripcion) or die("Error escribiendo en el archivo log");
        fclose($archivoLog); 
        
        $nodo = new Nodo();
        $nodo->setEstado($estado_nodo);
        $nodo->actualizarNodoIncidencia($idNodo);
        $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Cambio en nodo: " . $nombreNodo . " " . $estado_nodo) or die("Error escribiendo en el archivo log");
        fclose($archivoLog);
        
        $incidencia = null; $nodo = null;   
        echo "<script> alert('Incidencia creada'); $(location).attr('href','vistaGlobal.php'); </script>"; 
    }
    ?>
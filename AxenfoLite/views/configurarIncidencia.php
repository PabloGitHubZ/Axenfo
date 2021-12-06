<?php

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Incidencia.php";
require_once "../src/Nodo.php";
use Clases\Nodo;
use Clases\Incidencia;

$incidencia = new Incidencia();
$idIncidencia = $_GET['incidencia'];
$_SESSION['incidencia'] = $idIncidencia;
$incidenciaActual = $incidencia->getIncidencia($idIncidencia);
$nodo = new Nodo();
$nodoAfectado = $nodo->getNodoID($incidenciaActual->nodo);
$nombreNodo = $nodoAfectado->nombre;
$idNodo = $nodoAfectado->id;

?>
    <div class="content-wrapper">
        <h1 class="page-header text-center">Actualizar Incidencia <?php echo $idIncidencia; ?></h1>
        <div class="form-group box-tools pull-right">
            <a href="alertaBorrado.php?incidencia=<?php echo $incidenciaActual->id; ?>"><button class="btn btn-danger"><i class="glyphicon glyphicon-alert"></i> Eliminar Incidencia</button></a>
        </div>
        <div class="form-row" id="formNodo">
          <form action="" name="form_Incidencia" id="form_Incidencia" method="POST">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!--<button class="btn btn-danger" type="submit" name="borrar" id="borrar" ><i class="glyphicon glyphicon-alert"></i> Eliminar Incidencia</button>-->
                
            </div>     
              <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label for="nodo">Nodo afectado:</label>
              <output class="form-control" type="text" name="nodo" id="nodo"><?php echo $nombreNodo; ?></output>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label for="FechaInicio">Fecha apertura:</label>
              <input type="date" class="form-control" name="fechaInicio" id="fechaInicio" value="<?php echo $incidenciaActual->fecha_inicio; ?>">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label for="tipo">Tipo:</label>
              <output type="text" class="form-control" name="tipo" id="tipo" value="<?php echo $incidenciaActual->tipo; ?>"></output>
                <select name="tipo">
                   <option value="CPD">CPD</option> 
                   <option value="Planta Externa">Planta Externa</option> 
                </select>
            </div> 
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label for="fechaCierre">Fecha cierre:</label>
              <input type="date" class="form-control" name="fechaCierre" id="fechaCierre" value="<?php echo $incidenciaActual->fecha_cierre; ?>">
            </div>               
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label for="estado">Estado:</label>
              <output class="form-control" type="text" name="estado" id="estado"><?php echo $incidenciaActual->estado; ?></output>
              <select name="estado">
                   <option value="Abierto">Abierto</option> 
                   <option value="En curso">En curso</option> 
                   <option value="Cerrado">Cerrado</option>
               </select>
            </div>                
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label for="descripcion">Descripción:</label>
              <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $incidenciaActual->descripcion; ?>">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <button class="btn btn-primary" type="submit" id="guardar" name="guardar"><i class="fa fa-save"></i> Guardar</button>
              <a id="btngrupos" href="vistaGlobal.php"><button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
            </div>
          </form>
        </div>
    </div>

    <?php

    if (isset($_POST['guardar'])) {
        $incidencia = new Incidencia();
        $fechaInicio = $_POST['fechaInicio'];
        $fechaCierre = $_POST['fechaCierre'];
        $tipo = $_POST['tipo'];
        $estado = $_POST['estado'];
        $descripcion = $_POST['descripcion'];
        $incidencia->setNodo($idNodo);
        $incidencia->setFechaInicio($fechaInicio);
        $incidencia->setFechaCierre($fechaCierre);
        $incidencia->setTipo($tipo);
        $incidencia->setDescripcion($descripcion);
        $incidencia->setEstado($estado);
        $incidencia->actualizarIncidencia($idIncidencia);
        
        $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Cambio en incidencia: " . $idIncidencia . " " . $nombreNodo . " " . $fechaInicio . " " . $estado . " " . $fechaCierre) or die("Error escribiendo en el archivo log");
        fclose($archivoLog);
        
        $incidencia = null;    
        header("Location:configurarNodo.php?nodo=" . $nodo->getId());
    }
    
    ?>
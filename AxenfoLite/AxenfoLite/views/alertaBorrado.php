<?php
require 'cabecera.php';
use Clases\Nodo;
use Clases\Incidencia;
use Clases\Controladora;
use Clases\Olt;
use Clases\Switcho;

?>

<html>
<body>
<div class="content-wrapper">
    <section class="content"><!--    AVISO DE BORRADO    --> 
        <div class="box-header with-border">  
            <h1 class="box-title text-center">Cuidado! <br> ¿Estás seguro quieres eliminar este registro?<br> 
                <button class="btn btn-danger"><i class="glyphicon glyphicon-alert"></i></button> Los datos no se podrán recuperar <button class="btn btn-danger"><i class="glyphicon glyphicon-alert"></i></button>
            </h1>
            <h2 class="box-title text-center">El borrado de los nodos causa el borrado de sus equipos</h2>  
        </div>
        <div class="form-row" id="formularioBorrado">
            <form action="" name="formBorrado" id="formBorrado" method="POST"> 
                
                <?php
                
                if (isset($_GET['nodo'])) { // Si es un nodo lo que se quiere borrar, muestra los datos del nodo
                    $nodo = new Nodo(); 
                    $controladora = new Controladora;
                    $olt = new Olt();
                    $switch = new Switcho();
                    
                    $idNodo = $_GET['nodo'];
                    $opcion = "nodo";
                    $nodoActual = $nodo->getNodoID($idNodo);
                    $nombreNodo = $nodoActual->nombre;
                    
                    $idControladora = $nodoActual->controladora;
                    $idOlt = $nodoActual->olt;
                    $idSwitch = $nodoActual->switch;
                }
                
                if (isset($_GET['incidencia'])) { // Si es una incidencia lo que se quiere borrar, muestra los datos de la incidencia
                    $incidencia = new Incidencia();
                    $idIncidencia = $_GET['incidencia'];
                    $opcion = "incidencia";
                    $incidenciaActual = $incidencia->getIncidencia($idIncidencia);
                    $descripcion = $incidenciaActual->descripcion;
                }
                
                ?>
                
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label for="registro">Registro:</label>
                    <output class="form-control" type="text"  name="registro" id="registro" required><?php if ($opcion == "incidencia") echo "incidencia " . $incidenciaActual->id; else echo $nombreNodo; ?></output>
                </div>
                <div class="panel-body table-responsive">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-danger" type="submit" id="borrar" name="borrar"><i class="glyphicon glyphicon-alert"></i> Si, Eliminar Registro</button>
                        <a id="btngrupos" href="vistaGlobal.php"><button class="btn btn-success" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
                    </div>    
                </div>
                
                <?php
                    if (isset($_POST['borrar']) and ($opcion == "nodo")) { // Si es un nodo lo que se quiere borrar, lo borra y guarda el registro
                        $nodo = new Nodo();
                        $controladora = new Controladora;
                        $olt = new Olt();
                        $switch = new Switcho();
                        $nodo->borrarNodo($idNodo);
                        $controladora->borrarControladora($idControladora);
                        $olt->borrarOlt($idOlt);
                        $switch->borrarSwitch($idSwitch);
                        $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
                        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Nodo eliminado: " . $nombreNodo) or die("Error escribiendo en el archivo log");
                        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Controladora eliminada: " . $nombreNodo) or die("Error escribiendo en el archivo log");
                        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " OLT eliminada: " . $nombreNodo) or die("Error escribiendo en el archivo log");
                        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Switch eliminado: " . $nombreNodo) or die("Error escribiendo en el archivo log");
                        fclose($archivoLog);
                        $nodo = null; $controladora = null; $olt = null; $switch = null;
                        echo "<script> alert('Registro borrado'); $(location).attr('href','vistaGlobal.php'); </script>"; 
                    }
                    
                    if (isset($_POST['borrar']) and ($opcion == "incidencia")) { // Si es una incidencia lo que se quiere borrar, la borra y guarda el registro
                        $incidencia = new Incidencia();
                        $incidencia->borrarIncidencia($idIncidencia);
                        $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
                        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Incidencia eliminada: " . $idIncidencia . " " . $descripcion) or die("Error escribiendo en el archivo log");
                        fclose($archivoLog);   
                        $incidencia = null;
                        echo "<script> alert('Registro borrado'); $(location).attr('href','vistaGlobal.php'); </script>"; 
                    } 
      
                ?>
                
            </form>       
        </div>
    </section>
</div>
</body>
</html>
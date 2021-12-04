<?php

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Nodo.php";
use Clases\Nodo;

$nodo = new Nodo();
$idNodo = $_GET['nodo'];
$_SESSION['nodo'] = $idNodo;
$nodoActual = $nodo->getNodoID($idNodo);

?>
    <div class="content-wrapper">
        <h1 class="page-header text-center">Actualizar <?php echo $nodoActual->nombre; ?></h1>
        <div class="box-tools pull-right">
            <a href="configurarControladora.php?nodo=<?php echo $nodoActual->id; ?>"><button class="btn btn-warning"><i class='glyphicon glyphicon-arrow-up'></i> Actualizar Controladora</button></a>
            <a href="configurarOLT.php?nodo=<?php echo $nodoActual->id; ?>"><button class="btn btn-warning"><i class='glyphicon glyphicon-arrow-up'></i> Actualizar OLT</button></a>
            <a href="configurarSwitch.php?nodo=<?php echo $nodoActual->id; ?>"><button class="btn btn-warning"><i class='glyphicon glyphicon-arrow-up'></i> Actualizar Switch</button></a>
        </div> 
        <div class="form-row" id="formNodo">
            <form action="" name="formNodo" id="formNodo" method="POST">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-danger" type="submit" id="borrar" name="borrar"><i class="glyphicon glyphicon-alert"></i> Eliminar Nodo</button>
                </div>
                <div class="form-group col-lg-8 col-md-8 col-xs-12">
                    <label for="nombre">Nombre del Nodo:</label>
                    <output class="form-control" type="text"  name="nombre" id="nombre" required><?php echo $nodoActual->nombre; ?></output>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="ubicacion">Ubicación:</label>
                    <input class="form-control" type="text" name="ubicacion" id="ubicacion" value="<?php echo $nodoActual->ubicacion; ?>" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="direccion">Dirección</label>
                    <input class="form-control" type="text" name="direccion" id="direccion" value="<?php echo $nodoActual->direccion_fisica; ?>" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="coordenadas">Coordenadas</label>
                    <input class="form-control" type="text" name="coordenadas" id="coordenadas" value="<?php echo $nodoActual->coordenadas; ?>">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="estado">Estado</label>
                    <output class="form-control" type="text"  name="estadoActual" id="estadoActual"><?php echo $nodoActual->estado; ?></output>
                    <select name="estado">
                        <option value="En construccion">En construcción</option> 
                        <option value="Funcionando">Funcionando</option> 
                        <option value="En incidencia">En incidencia</option> 
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="pendiente">Pendiente de</label>
                    <output class="form-control" type="text"  name="pendienteDe" id="pendienteDe"><?php echo $nodoActual->pendiente; ?></output>
                    <select name="pendiente">
                        <option value="Instalación Equipos">Instalación Equipos</option> 
                        <option value="Implementación Red">Implementación Red</option> 
                        <option value="Configuración Equipos">Configuración Equipos</option>
                        <option value="Pruebas físicas">Pruebas físicas</option> 
                        <option value="Pruebas de Software">Pruebas de Software</option>
                    </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-primary" type="submit" id="guardar" name="guardar"><i class="fa fa-save"></i> Guardar</button>
                    <a id="btngrupos" href="vistaGlobal.php"><button class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
                </div>
            </form>       
        </div>
    </div>
    <script type="text/javascript" src="js/borrar.js"></script>
    
    <?php

    if (isset($_POST['guardar'])) {
        $nodo = new Nodo();
        $nombre = $nodoActual->nombre;
        $ubicacion = trim($_POST['ubicacion']);
        $direccion = trim($_POST['direccion']);
        $coordenadas = trim($_POST['coordenadas']);
        $estado = $_POST['estado'];
        $pendiente = $_POST['pendiente'];

        $nodo->setUbicacion(ucwords($ubicacion));
        $nodo->setDireccion($direccion);
        $nodo->setCoordenadas($coordenadas);
        $nodo->setEstado($estado);
        $nodo->setPendiente($pendiente);
        $nodo->actualizarNodo($idNodo);
        
        $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Cambio en nodo: " . $nombre . " " . $ubicacion . " " . $direccion . " " . $estado . " " . $pendiente) or die("Error escribiendo en el archivo log");
        fclose($archivoLog);
        
        $nodo = null;    
        header("Location:configurarNodo.php?nodo=" . $nodo->getId());
    }

    if (isset($_POST['borrar'])) {
        echo "<script> confirmarNodo(); </script>";
        $nodo = new Nodo();
        $nombre = $nodoActual->nombre;
        $nodo->borrarNodo($idNodo);
        
        $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Nodo eliminado: " . $nombre) or die("Error escribiendo en el archivo log");
        fclose($archivoLog);   
        
        $nodo = null;       
        header("Location:listadoNodos.php");
     }
    
    ?>

    
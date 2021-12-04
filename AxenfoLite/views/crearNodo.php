<?php

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Nodo.php";
use Clases\Nodo;

?>

    <div class="content-wrapper">
        <h1 class="page-header text-center">Crear nuevo Nodo</h1>
        <div class="form-row" id="formNodo">
            <form action="" name="formNodo" id="formNodo" method="POST">
                <div class="form-group col-lg-8 col-md-8 col-xs-12">
                    <label for="nombre">Nombre del Nodo:</label>
                    <input class="form-control" type="text" id="nombre" placeholder="Nombre" name="nombre" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="ubicacion">Ubicación:</label>
                    <input class="form-control" type="text" name="ubicacion" id="ubicacion" maxlength="100" placeholder="Ubicación" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="direccion">Dirección</label>
                    <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Dirección" required>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-primary" type="submit" id="guardar" name="guardar"><i class="fa fa-save"></i> Guardar</button>
                    <a id="btngrupos" href="vistaGlobal.php"><button class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
                </div>
            </form>
        </div>
    </div>

    <?php

    if (isset($_POST['guardar'])) {
        $nombre = trim($_POST['nombre']);
        $ubicacion = trim($_POST['ubicacion']);
        $direccion = trim($_POST['direccion']);
        $nodo = new Nodo();
        if ($nodo->existeNodo($nombre)) {
            $nodo = null;
            echo("Ya existe ese nodo");   
        }
        $nodo->setNombre(ucwords($nombre));
        $nodo->setUbicacion(ucwords($ubicacion));
        $nodo->setDireccion($direccion);
        $nodo->creaNodo();
        
        $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Nuevo nodo: " . $nombre . " " . $ubicacion . " " . $direccion) or die("Error escribiendo en el archivo log");
        fclose($archivoLog);
        
        $nodo = null;    
        
        header("Location:configurarNodo.php?nodo=" . $nodo->getId());
    }
    ?>


 

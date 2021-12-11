<?php

require 'cabecera.php';
use Clases\Nodo;
use Clases\Controladora;
use Clases\Olt;
use Clases\Switcho;

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
                    <a href="vistaGlobal.php"><button class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
                </div>
            </form>
        </div>
    </div>

    <?php

    if (isset($_POST['guardar'])) {
        $nombre = trim($_POST['nombre']);
        $ubicacion = trim($_POST['ubicacion']);
        $direccion = trim($_POST['direccion']);
        
        $ipInicial = "0.0.0.0";
        $serialInicial = "000000";
        $latitud = "0";
        $longitud = "0";
        $nombreControladora = "Controladora " . $nombre;
        $nombreOLT = "OLT " . $nombre;
        $nombreSwitch = "Switch " . $nombre;
        $nodo = new Nodo();
        
        if ($nodo->existeNodo($nombre)) {
            $nodo = null;
            echo "<script> alert('Ya existe ese nodo'); </script>";  
            header("Location:vistaGlobal.php");
        }
        else {
            $controladora = new Controladora();
            $olt = new Olt();
            $switch = new Switcho();
            
            $controladora->setNombre($nombreControladora);
            $controladora->setIp($ipInicial);
            $controladora->setSn($serialInicial);
            $controladora->nuevaControladora();
            $controlActual = $controladora->getControladoraN($nombreControladora);
            "<script> console.log('34234'); </script>";
            $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
            fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Nueva controladora: " . $nombreControladora . " " . $ipInicial . " " . $serialInicial) or die("Error escribiendo en el archivo log");
            fclose($archivoLog);

            $olt->setNombre($nombreOLT);
            $olt->setIp($ipInicial);
            $olt->setSn($serialInicial);
            $olt->nuevaOlt();
            $oltActual = $olt->getOltN($nombreOLT);
            $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
            fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Nueva OLT: " . $nombreOLT . " " . $ipInicial . " " . $serialInicial) or die("Error escribiendo en el archivo log");
            fclose($archivoLog);

            $switch->setNombre($nombreSwitch);
            $switch->setIp($ipInicial);
            $switch->setSn($serialInicial);
            $switch->nuevoSwitch();
            $switchActual = $switch->getSwitchN($nombreSwitch);
            $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
            fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Nuevo Switch: " . $nombreSwitch . " " . $ipInicial . " " . $serialInicial) or die("Error escribiendo en el archivo log");
            fclose($archivoLog);        

            $nodo->setNombre(ucwords($nombre));
            $nodo->setUbicacion(ucwords($ubicacion));
            $nodo->setDireccion(ucwords($direccion));
            $nodo->setLatitud($latitud);
            $nodo->setLongitud($longitud);
            $nodo->setControl($controlActual->id);
            $nodo->setOlt($oltActual->id);
            $nodo->setSwitch($switchActual->id);
            $nodo->creaNodo();
            $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
            fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Nuevo nodo: " . $nombre . " " . $ubicacion . " " . $direccion) or die("Error escribiendo en el archivo log");
            fclose($archivoLog);
            
            sleep(1);
            $nodo = null; $controladora = null; $olt = null; $switch = null;
            $nodo = new Nodo();
            $nodoActual = $nodo->getNodo($nombre);
            echo "<script> alert('Nodo creado'); $(location).attr('href','listadoNodos.php'); </script>"; 
        }
    }
    ?>


 

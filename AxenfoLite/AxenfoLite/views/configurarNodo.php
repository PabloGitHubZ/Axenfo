<?php
require 'cabecera.php';
use Clases\Nodo;
//Obtengo el nodo actual pasado por la URL
$nodo = new Nodo();
$idNodo = $_GET['nodo'];
$nodoActual = $nodo->getNodoID($idNodo);
$nombre = $nodoActual->nombre;


?>
    <script type="text/javascript" src="js/borrar.js"></script>
    <div class="content-wrapper">
        <h1 class="page-header text-center">Actualizar <?php echo $nodoActual->nombre; ?></h1>
        <a href="configurarControladora.php?control=<?php echo $nodoActual->controladora; ?>"><button class="btn btn-warning"><i class='glyphicon glyphicon-arrow-up'></i> Actualizar Controladora</button></a>
        <a href="configurarOLT.php?olt=<?php echo $nodoActual->olt; ?>"><button class="btn btn-warning"><i class='glyphicon glyphicon-arrow-up'></i> Actualizar OLT</button></a>
        <a href="configurarSwitch.php?switch=<?php echo $nodoActual->switch; ?>"><button class="btn btn-warning"><i class='glyphicon glyphicon-arrow-up'></i> Actualizar Switch</button></a>
        <div class="form-group box-tools pull-right">
            <a href="alertaBorrado.php?nodo=<?php echo $nodoActual->id; ?>"><button class="btn btn-danger"><i class="glyphicon glyphicon-alert"></i> Eliminar Nodo</button></a>
        </div>
        <div class="form-row" id="formularioNodo">
            <form action="" name="formNodo" id="formNodo" method="POST">

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
                    <label for="latitud">Coordenadas: latitud</label>
                    <input class="form-control" type="text" name="latitud" id="latitud" value="<?php echo $nodoActual->latitud; ?>">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <label for="longitud">Coordenadas: longitud</label>
                    <input class="form-control" type="text" name="longitud" id="longitud" value="<?php echo $nodoActual->longitud; ?>">
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
                        <option value="Nada Pendiente">Nada Pendiente</option>
                        <option value="Instalación Equipos">Instalación Equipos</option> 
                        <option value="Implementación Red">Implementación Red</option> 
                        <option value="Configuración Equipos">Configuración Equipos</option>
                        <option value="Pruebas Físicas">Pruebas físicas</option> 
                        <option value="Pruebas de Red">Pruebas de Red</option>
                    </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-primary" type="submit" id="guardar" name="guardar"><i class="fa fa-save"></i> Guardar</button>
                    <a href="vistaGlobal.php"><button class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
                </div>
            </form>       
        </div>
    </div>
    
    <?php
    $nodo = new Nodo();
    $nombre = $nodoActual->nombre;
    
    if (isset($_POST['guardar'])) { //Modificamos los datos en el registro
        $ubicacion = trim($_POST['ubicacion']);
        $direccion = trim($_POST['direccion']);
        $latitud = trim($_POST['latitud']);
        $longitud = trim($_POST['longitud']);
        $estado = $_POST['estado'];
        $pendiente = $_POST['pendiente'];

        $nodo->setUbicacion(ucwords($ubicacion));
        $nodo->setDireccion($direccion);
        $nodo->setLatitud($latitud);
        $nodo->setLongitud($longitud);
        $nodo->setEstado($estado);
        $nodo->setPendiente($pendiente);
        $nodo->actualizarNodo($idNodo);
        
        $archivoLog = fopen("log.txt", 'a') or die("Error creando archivo de log");
        fwrite($archivoLog, "\n" . date("d/m/Y H:i:s") . " Cambio en nodo: " . $nombre . " " . $ubicacion . " " . $direccion . " " . $estado . " " . $pendiente) or die("Error escribiendo en el archivo log");
        fclose($archivoLog);
        
        $nodo = null;
        echo "<script> alert('Registro modificado'); $(location).attr('href','vistaGlobal.php'); </script>"; 
    }

    ?>

    
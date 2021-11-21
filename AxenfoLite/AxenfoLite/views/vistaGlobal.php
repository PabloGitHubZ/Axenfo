<?php

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Nodo.php";
require_once "../src/Incidencia.php";
use Clases\Nodo;
use Clases\Incidencia;

?>
 
<html>
    <head>
    <meta charset="utf-8">
    <title>Vista general</title>
    
    <!--  ******************  CSS  **************************  --> 
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../public/dist/css/adminlte.css">

    <!--  ******************  SCRIPTS  **************************  --> 
    <script src="../public/bootstrap/js/jquery.min.js"></script>
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>    
    <script src="../public/dist/js/adminlte.min.js"></script>
    
    </head>
    <body>
    <!--    NODOS EN CONSTRUCCIÓN    -->    
    <div class="container">
	<h1 class="panel-default text-center">Nodos en construcción</h1>
	<div class="row">
            <div class="panel-body table-responsive">
            <a href="crearNodo.php"><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Agregar Nodo</button></a>
		<table class="table table-bordered table-striped">
                    <thead>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Estado</th>
                    </thead>
                    <tbody>     

                    <?php

                        $nodo = new Nodo();
                        $nodos = $nodo->getNodos();
                        foreach ($nodos as $nodo) {
                            //if ($nodo->getEstado() != "Funcionando") {
                    ?>
                            <tr>
                                <td><?php echo $nodo->nombre; ?></td>
                                <td><?php echo $nodo->ubicacion; ?></td>
                                <td><?php echo $nodo->estado_construccion; ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a id="ver" href="vistaNodo.php"><button class="btn btn-warning">Ver</button></a>
                                    <a id="modificar" href="configurarNodo.php"><button class="btn btn-warning">Modificar</button></a>
                                    <a id="borrar" href="eliminaNodo.php"><button class="btn btn-warning">Eliminar</button></a>
                                </td>
                            </tr>
                    <?php
                        }
                        if (isset($_POST['modificar'])) {
                            $_SESSION['nodo'] = $nombre;
                            header('Location:modificaNodo.php'); 
                        }
                        if (isset($_POST['ver'])) {
                            $_SESSION['nodo'] = $nombre;
                            header('Location:vistaNodo.php');  
                        }
                        //}   
                    ?>

                    </tbody>
                </table>
            </div>
        </div>  
    </div>    
    <!--    NODOS CON INCIDENCIA    -->    
    <div class="container">
        <h1 class="panel-default text-center">Incidencias</h1>
        <div class="row">
            <div class="panel-body table-responsive">
            <a href="crearIncidencia.php"><button class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Agregar Incidencia</button></a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>Nodo</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                    </thead>
                    <tbody>

                    <?php
                    
                        $incidencia = new Incidencia();
                        $incidencias = $incidencia->getIncidencias();
                        foreach ($incidencias as $incidencia) {

                    ?>
                        <tr>
                            <td><?php echo $incidencia->nodo; ?></td>
                            <td><?php echo $incidencia->fecha; ?></td>
                            <td><?php echo $incidencia->descripcion; ?></td>
                            <td><?php echo $incidencia->estado; ?></td>
                            <td>
                                <a id="ver" href="vistaNodo.php"><button class="btn btn-warning">Ver</button></a>
                                <a id="modificar" href="configurarNodo.php"><button class="btn btn-warning">Modificar</button></a>
                                <a id="borrar" href="eliminaNodo.php"><button class="btn btn-warning">Eliminar</button></a>
                            </td> 
                        </tr>
                       
                    <?php
                        }
                    ?>

                    </tbody>
                </table> 
            </div>
	</div>
    </div>  
    
    <!--    MAPA    -->
    <div class="container iframe-mode" id="map" data-widget="iframe" style="width:30%; height:600px" data-loading-screen="100">    
        <script async src=""></script>
        <script type="text/javascript" src="js/mapa.js"></script>
    </div>
    
</body>
</html>







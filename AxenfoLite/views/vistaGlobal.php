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
    
    </head>
    <body>
        
    <!--    NODOS EN CONSTRUCCIÓN    -->   
    <div class="content-wrapper">
    <div class="container">
	<h1 class="panel-default text-center">Nodos en construcción</h1>
	<div class="row">
            <div class="panel-body table-responsive">
            <a href="crearNodo.php"><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Agregar Nodo</button></a>
            <a href="listadoNodos.php"><button class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span> Ver Nodos</button></a>
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
                            if ($nodo->estado != "Funcionando") {
                    ?>
                            <tr>
                                <td><?php echo $nodo->nombre; ?></td>
                                <td><?php echo $nodo->ubicacion; ?></td>
                                <td><?php // echo $nodo->estado_construccion; ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a id="ver" href="vistaNodo.php?nodo=<?php echo $nodo->id; ?>"><button class="btn btn-warning">Ver</button></a>
                                    <a id="modificar" href="configurarNodo.php?nodo=<?php echo $nodo->id; ?>"><button class="btn btn-warning">Modificar</button></a>
                                </td>
                            </tr>
                    <?php
                            }
                        }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>  
    </div>    
        
    <!--    NODOS CON INCIDENCIA    -->    
    <div class="container">
        <h1 class="panel-default text-center">Incidencias abiertas</h1>
        <div class="row">
            <div class="panel-body table-responsive">
            <a href="crearIncidencia.php"><button class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Agregar Incidencia</button></a>
            <a href="listadoIncidencias.php"><button class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span> Ver Incidencias</button></a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>Fecha apertura</th>
                        <th>Nodo afectado</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                    </thead>
                    <tbody>

                    <?php
                    
                        $incidencia = new Incidencia();
                        $incidencias = $incidencia->getIncidencias();
                        foreach ($incidencias as $incidencia) {
                            if ($incidencia->estado != "Cerrado") {
                                $nodo = new Nodo();
                                $nodoAfectado = $nodo->getNodoID($incidencia->nodo);
                    ?>
                            <tr>
                                <td><?php echo $incidencia->fecha_inicio; ?></td>
                                <td><?php echo $nodoAfectado->nombre; ?></td>
                                <td><?php echo $incidencia->descripcion; ?></td>
                                <td><?php echo $incidencia->estado; ?></td>
                                <td>
                                    <a id="modificar" href="configurarIncidencia.php?incidencia=<?php echo $incidencia->id; ?>"><button class="btn btn-warning">Modificar</button></a>
                                </td> 
                            </tr>
                       
                    <?php
                            }
                        }
                    ?>

                    </tbody>
                </table> 
            </div>
	</div>
    </div>  
    
    <!--    MAPA    -->
    <div class="container iframe-mode" id="map" data-widget="iframe" style="width:500; height:500px" data-loading-screen="100">    
        <script async src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script>
        <script type="text/javascript" src="js/mapa.js"></script>
    </div>
    </div>
</body>
</html>







<?php

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Nodo.php";

use Clases\Nodo;

  $nodo = new Nodo();
  $hayNodos = $nodo->hayNodos();
  if ($hayNodos == true) {
      $nodos = $nodo->getNodos();
      var_dump($nodos);
  }
  
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Vista general</title>
	<link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../public/bootstrap/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="../public/dist/css/adminlte.css">
<!--        <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/custom.css">-->

    <!--  ******************  SCRIPTS  **************************  --> 
    <script src="../public/bootstrap/js/jquery.min.js"></script>
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>    
    <script src="../public/dist/js/adminlte.min.js"></script>
    
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Nodos en construcción</h1>
	<div class="row">
		<div class="col-sm-12">
                    <a id="btngrupos" href="crearNodo.php"><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Agregar Nodo</button></a>
                        
                
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>Nombre</th>
					<th>Ubicación</th>
					<th>Estado
                                        <div class="progress">
                                              <div class="progress-bar progress-bar-info" role="progressbar"
                                                   aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                   style="width: 20%">
                                                <span class="sr-only">20% completado</span>
                                              </div>
                                            </div>

                                            <div class="progress">
                                              <div class="progress-bar progress-bar-warning" role="progressbar"
                                                   aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                   style="width: 60%">
                                                <span class="sr-only">60% completado (aviso)</span>
                                              </div>
                                            </div>                     </th>
				</thead>
				<tbody id="tbody"></tbody>
			</table>
		</div>
            </div>  
</div>
<div class="container">
	<h1 class="page-header text-center">Nodos en incidencia</h1>
	<div class="row">
		<div class="col-sm-12">
                    <a id="btngrupos" href="crearIncidencia.php"><button class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Agregar Incidencia</button></a>
                        
                
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>Nombre</th>
					<th>Ubicación</th>
					<th>Dirección</th>
					<th>Estado
                                        <div class="progress">
                                              <div class="progress-bar progress-bar-info" role="progressbar"
                                                   aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                   style="width: 20%">
                                                <span class="sr-only">20% completado</span>
                                              </div>
                                            </div>

                                            <div class="progress">
                                              <div class="progress-bar progress-bar-warning" role="progressbar"
                                                   aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                   style="width: 60%">
                                                <span class="sr-only">60% completado (aviso)</span>
                                              </div>
                                            </div>                     </th>
				</thead>
				<tbody id="tbody"></tbody>
			</table> 
		</div>
	</div>
</div>  
    
    <!--<iframe auto name="map" height="500" width="500" src="mapa.html">-->   
    <div class="content-wrapper iframe-mode" style=float:right" id="map" data-widget="iframe" data-loading-screen="100">

            
	<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeNUxnutZvqXpFc1s88gJDPQVUTGn3elc&callback=initMap"></script>
	<script type="text/javascript" src="js/mapa.js"></script>

    </div>
    
</body>
</html>
<?php // } ?>







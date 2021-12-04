<?php

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Nodo.php";
require_once "../src/Incidencia.php";
use Clases\Nodo;
use Clases\Incidencia;

?>

<div class="content-wrapper">
    <section class="content">
    <div class="row">  
    <div class="col-md-12">
        <div class="box">
        <div class="box-header with-border">
            <h1 class="box-title text-center">Resultados de búsqueda</h1>
        </div>
        <h1 class="box-title text-center">Nodos</h1>    
        <div class="panel-body table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <th>Nombre</th>
              <th>Ubicacion</th>
              <th>Dirección</th>
              <th>Estado</th>
              <th></th>
            </thead>
            <tbody>

            <?php

            if (isset($_POST['buscar'])) {
            //Recogemos las claves enviadas
            $clave = $_POST['busqueda'];

            //Conectamos con la base de datos en la que vamos a buscar
            $nodo = new Nodo();
            $incidencia = new Incidencia();
            $busqueda = $nodo->buscarNodos($clave);
            $busqueda_2 = $incidencia->buscarIncidencias($clave);

            if ($busqueda != null) {
                foreach ($busqueda as $nodo) {

            ?>
                <tr>
                    <td><?php echo $nodo->nombre; ?></td>
                    <td><?php echo $nodo->ubicacion; ?></td>
                    <td><?php echo $nodo->direccion_fisica; ?></td>
                    <td><?php echo $nodo->estado; ?></td>
                    <td>
                        <a id="ver" href="vistaNodo.php?nodo=<?php echo $nodo->id; ?>"><button class="btn btn-warning">Ver</button></a>
                        <a id="modificar<?php $_SESSION['nodo'] = $id; ?>" href="configurarNodo.php?nodo=<?php echo $nodo->id; ?>"><button class="btn btn-warning">Modificar</button></a>
                    </td>
                </tr>

            <?php
                }
            }
            ?>

            </tbody>  
            </table>
        </div>

        <h1 class="box-title text-center">Incidencias</h1> 
        <div class="panel-body table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <th>Nodo</th>
              <th>Fecha</th>
              <th>Descripción</th>
              <th>Estado</th>
              <th></th>
            </thead>
            <tbody>

            <?php
            if ($busqueda_2 != null) {
                foreach ($busqueda_2 as $incidencia) {
            ?>
                <tr>
                    <td><?php echo $incidencia->nodo; ?></td>
                    <td><?php echo $incidencia->fecha_inicio; ?></td>
                    <td><?php echo $incidencia->descripcion; ?></td>
                    <td><?php echo $incidencia->estado; ?></td>
                    <td>
                      <a class="modificar" href="configurarIncidencia.php"><button id="modificar" class="btn btn-warning">Modificar</button></a>
                    </td>                        
                </tr>
            <?php
                }
            }               
            ?>

            </tbody>  
            </table>

        <?php
        if ($busqueda == null && $busqueda_2 == null) echo '<h2>No se encuentran resultados con los criterios de búsqueda indicados.</h2>';
        }
        ?>

        </div>
        </div>
    </div>
    </div>
    </section>
</div>

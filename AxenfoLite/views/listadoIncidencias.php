<?php 

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Incidencia.php";
require_once "../src/Nodo.php";
use Clases\Nodo;
use Clases\Incidencia;
 
 ?>
    <div class="content-wrapper">
        <section class="content">
        <div class="row">  
        <div class="col-md-12">
            <div class="box">
            <div class="box-header with-border">
                <h1 class="box-title text-center">Lista de Incidencias</h1>
                <div class="box-tools pull-right">
                <a href="crearIncidencia.php"><button class="btn btn-danger"><i class='glyphicon glyphicon-plus'></i> Agregar incidencia</button></a>
                </div> 
                <a href="listadoNodos.php" class="btn btn-info"></i> Nodos</a>
                <a href="listadoControladoras.php" class="btn btn-info"></i> Controladoras</a>
                <a href="listadoOlts.php" class="btn btn-info"></i> OLTs</a>
                <a href="listadoSwitches.php" class="btn btn-info"></i> Switches</a>
            </div>

            <div class="panel-body table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                  <th>ID</th>
                  <th>Fecha Apertura</th>
                  <th>Nodo afectado</th>
                  <th>Tipo</th>
                  <th>Descripción</th>
                  <th>Estado</th>
                  <th>Fecha Cierre</th>
                  <th></th>
                </thead>
                <tbody>

                <?php
                    
                    $incidencia = new Incidencia();
                    $incidencias = $incidencia->getIncidencias();
                    foreach ($incidencias as $incidencia) {
                        $nodo = new Nodo();
                        $nodoAfectado = $nodo->getNodoID($incidencia->nodo);
                ?>
                    <tr>
                        <td><?php echo $incidencia->id; ?></td>
                        <td><?php echo $incidencia->fecha_inicio; ?></td>
                        <td><?php echo $nodoAfectado->nombre; ?></td>
                        <td><?php echo $incidencia->tipo; ?></td>
                        <td><?php echo $incidencia->descripcion; ?></td>
                        <td><?php echo $incidencia->estado; ?></td>
                        <td><?php echo $incidencia->fecha_cierre; ?></td>
                        <td>
                            <a class="modificar" href="configurarIncidencia.php?incidencia=<?php echo $incidencia->id; ?>"><button id="modificar" class="btn btn-warning">Modificar</button></a>              
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
        </div>
        </section>
    </div>
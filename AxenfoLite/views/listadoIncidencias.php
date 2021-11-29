<?php 

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Incidencia.php";
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
                <a href="crearNodo.php"><button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Agregar Nodo</button></a> 
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
                  <th>Nodo</th>
                  <th>Fecha</th>
                  <th>Descripción</th>
                  <th>Estado</th>
                  <th></th>
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
                            <a class="borrar" href="configurarIncidencia.php?nodo=<?php echo $incidencia->id; ?>"><button id="modificar" class="btn btn-warning">Modificar</button></a>
                          <a class="borrar" href="eliminaIncidencia.php"><button class="btn btn-warning">Eliminar</button></a>
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
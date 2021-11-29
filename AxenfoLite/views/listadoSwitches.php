<?php 

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Nodo.php";
require_once "../src/Switch.php";
use Clases\Nodo;
use Clases\Switcho;
 
 ?>
    <div class="content-wrapper">
        <section class="content">
        <div class="row">  
        <div class="col-md-12">
            <div class="box">
            <div class="box-header with-border">
                <h1 class="box-title text-center">Lista de Switches</h1>
                <div class="box-tools pull-right">
                <a href="crearNodo.php"><button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Agregar Nodo</button></a> 
                <a href="crearIncidencia.php"><button class="btn btn-danger"><i class='glyphicon glyphicon-plus'></i> Agregar incidencia</button></a>
                </div> 
                <a href="listadoNodos.php" class="btn btn-info"></i> Nodos</a>
                <a href="listadoControladoras.php" class="btn btn-info"></i> Controladoras</a>
                <a href="listadoOlts.php" class="btn btn-info"></i> OLTs</a>
                <a href="listadoIncidencias.php" class="btn btn-info"></i> Incidencias</a>
            </div>

            <div class="panel-body table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                  <th>Nombre</th>
                  <th>IP</th>
                  <th>Marca</th>
                  <th>Serial</th>
                  <th></th>
                </thead>
                <tbody>

                <?php
                
                    $switch = new Switcho();
                    $switches = $switch->getSwitches();
                    foreach ($switches as $switch) {
                            
                ?>
                    <tr>
                        <td><?php echo $switch->nombre; ?></td>
                        <td><?php echo $switch->ip; ?></td>
                        <td><?php echo $switch->marca; ?></td>
                        <td><?php echo $switch->numero_serie; ?></td>
                        <td>
                          <a class="modificar" id="modificar" href=""><button class="btn btn-warning">Modificar</button></a>
                          <a class="borrar" id="borrar" href="eliminaNodo.php"><button class="btn btn-warning">Eliminar</button></a>
                        </td>
                    </tr>
                <?php
                    }
//                    if (isset($_POST['modificar'])) {
//                        $_SESSION['nodo'] = $nombre;
//                        header('Location:modificaNodo.php'); 
//                    }
                ?>

                </tbody>  
                </table>
            </div>
            </div>
        </div>
        </div>
        </section>
    </div>
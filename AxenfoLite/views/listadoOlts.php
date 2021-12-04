<?php 

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Nodo.php";
require_once "../src/Olt.php";
use Clases\Nodo;
use Clases\Olt;
 
 ?>
    <div class="content-wrapper">
        <section class="content">
        <div class="row">  
        <div class="col-md-12">
            <div class="box">
            <div class="box-header with-border">
                <h1 class="box-title text-center">Lista de OLTs</h1>
                <div class="box-tools pull-right">
                <a href="crearNodo.php"><button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Agregar Nodo</button></a> 
                <a href="crearIncidencia.php"><button class="btn btn-danger"><i class='glyphicon glyphicon-plus'></i> Agregar incidencia</button></a>
                </div> 
                <a href="listadoNodos.php" class="btn btn-info"></i> Nodos</a>
                <a href="listadoControladoras.php" class="btn btn-info"></i> Controladoras</a>
                <a href="listadoSwitches.php" class="btn btn-info"></i> Switches</a>
                <a href="listadoIncidencias.php" class="btn btn-info"></i> Incidencias</a>
            </div>

            <div class="panel-body table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                  <th>Nombre</th>
                  <th>IP</th>
                  <th>Marca</th>
                  <th>Serial</th>
                  <th>Número de tarjetas</th>
                  <th></th>
                </thead>
                <tbody>

                <?php
                
                    $olt = new Olt();
                    $olts = $olt->getOlts();
                    foreach ($olts as $olt) {
                            
                ?>
                    <tr>
                        <td><?php echo $olt->nombre; ?></td>
                        <td><?php echo $olt->ip; ?></td>
                        <td><?php echo $olt->marca; ?></td>
                        <td><?php echo $olt->numero_serie; ?></td>
                        <td><?php echo $olt->numero_tarjetas; ?></td>
                        <td>
                            <a id="modificar" href="configurarOLT.php?control=<?php echo $olt->id; ?>"><button class="btn btn-warning">Modificar</button></a>
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
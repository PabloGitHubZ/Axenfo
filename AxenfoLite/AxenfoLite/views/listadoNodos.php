<?php 

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Nodo.php";
use Clases\Nodo;
 
 ?>
    <div class="content-wrapper">
        <section class="content">
        <div class="row">  
        <div class="col-md-12">
            <div class="box">
            <div class="box-header with-border">
                <h1 class="box-title text-center">Lista de Nodos</h1>
                <div class="box-tools pull-right">
                <a href="crearNodo.php"><button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Agregar Nodo</button></a> 
                <a href="crearIncidencia.php"><button class="btn btn-danger"><i class='glyphicon glyphicon-plus'></i> Agregar incidencia</button></a>
                </div> 
                <a href="listadoControladoras.php" class="btn btn-info"></i> Controladoras</a>
                <a href="listadoOlts.php" class="btn btn-info"></i> OLTs</a>
                <a href="listadoSwitches.php" class="btn btn-info"></i> Switches</a>
                <a href="listadoIncidencias.php" class="btn btn-info"></i> Incidencias</a>
            </div>

            <div class="panel-body table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                  <th>Nombre</th>
                  <th>Ubicacion</th>
                  <th>Dirección</th>
                  <th>Funcionamiento</th>
                  <th>Estado construcción</th>
                  <th></th>
                </thead>
                <tbody>

                <?php
                
                    $nodo = new Nodo();
                    $hayNodos = $nodo->hayNodos();
                    if ($hayNodos == true) {
                        $nodos = $nodo->getNodos();
                        foreach ($nodos as $nodo) {
                            
                ?>
                        <tr>
                            <td><?php echo $nodo->nombre; ?></td>
                            <td><?php echo $nodo->ubicacion; ?></td>
                            <td><?php echo $nodo->direccion_fisica; ?></td>
                            <td><?php if ($nodo->con_incidencia == false) echo "SI"; ?></td>
                            <td><?php echo $nodo->estado_construccion; ?></td>
                            <td>
                              <a id="ver" href="vistaNodo.php"><button class="btn btn-warning">Ver</button></a>
                              <a id="modificar" href="configurarNodo.php"><button class="btn btn-warning">Modificar</button></a>
                              <a id="borrar" href="eliminaNodo.php"><button class="btn btn-warning">Eliminar</button></a>
                            </td>
                        </tr>
                <?php
                        }
                    }
                    if (isset($_POST['modificar'])) {
                        $_SESSION['nodo'] = $nombre;
                        header('Location:configurarNodo.php'); 
                    }
                    if (isset($_POST['ver'])) {
                        $_SESSION['nodo'] = $nombre;
                        header('Location:vistaNodo.php');
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
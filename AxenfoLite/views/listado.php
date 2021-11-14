<?php 

//session_start();

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
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">  
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
    <h1 class="box-title">Lista de Nodos: </h1>
    <div class="box-tools pull-right">
        <a id="btngrupos" href="crearNodo.php"><button class="btn btn-success"><i class="fa fa-plus-circle"></i>Agregar Nodo</button> 
        <a id="btngrupos" href="crearIncidencia.php"><button class="btn btn-info"><i class='fa fa-th-large'></i> Agregar incidencia</button></a>
       </div> 
    <a id="btnasistencia" href="nodos.php?idgrupo=<?php echo $idgrupo; ?>" class="btn btn-warning"><i class='fa fa-check'></i> Controladoras</a>
  <a  id="btnconducta" href="conducta.php?idgrupo=<?php echo $idgrupo; ?>" class="btn btn-primary"><i class='fa fa-smile-o'></i> OLTs</a>
  <a id="btncalificaciones" href="calificaciones.php?idgrupo=<?php echo $idgrupo; ?>" class="btn btn-danger"><i class='fa fa-tasks'></i> Switches</a>
  <a id="btncursos" href="cursos.php?idgrupo=<?php echo $idgrupo; ?>" class="btn btn-primary"><i class='fa fa-th-large'></i> Incidencias</a>
  <a  id="btnlistas" href="listasis.php?idgrupo=<?php echo $idgrupo; ?>" class="btn btn-info"><i class='fa fa-th-list'></i> Listas</a>



</div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Nombre</th>
      <th>Ubicacion</th>
      <th>Dirección</th>
        <th>Funcionamiento</th>
      <th>Estado construcción</th>
      <th>Pendiente pruebas</th>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>

<!--fin centro-->
      </div>
      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

<!-- <script src="js/vista_grupo.js"></script>-->
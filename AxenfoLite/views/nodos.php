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

<div class="container">
		<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
	  		<a class="navbar-brand" href="code.html" target="_blank">Axenfo</a>
	  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
	  		</button>

		  	<div class="collapse navbar-collapse" id="navbarColor02">
			    <ul class="navbar-nav mr-auto">
			      	<li class="nav-item">
			        <a class="nav-link" href="https://www.youtube.com/channel/UCoBEy_rD5FsKHFHtTPTimjQ/videos?spfreload=10" target="_blank">Más Proyectos</a>
			      	</li>
			      	<li class="nav-item dropdown">
		              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false">Redes Sociales <span class="caret"></span></a>
		              <div class="dropdown-menu" aria-labelledby="download">
		                <a class="dropdown-item" href="https://www.facebook.com/AnthonCode" target="_blank">facebook</a>
		                <div class="dropdown-divider"></div>
		                <a class="dropdown-item" href="https://www.youtube.com/c/AnthonCode" target="_blank">youtube</a>
		                <div class="dropdown-divider"></div>
		                <a class="dropdown-item" href="https://AnthonCode.blogspot.com" target="_blank">Blog</a>
		              </div>
		            </li>
			      	<li class="nav-item">
			        <a class="nav-link" href="http://facebook.com/anthoncode" target="_blank"><i class="fa fa-facebook-official"></i> Like</a>
			      	</li>
			      	<li class="nav-item">
			        <a class="nav-link text-warning" href="" target="_blank"><i class="fa fa-code"></i> Sistemas en PHP</a>
			    </ul>
			    <form class="form-inline my-2 my-lg-0">
			      <input class="form-control mr-sm-2" placeholder="Search" type="text">
			      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
			    </form>
		  	</div>
		</nav>

		<div class="row">
			<div class="col-sm-12">
				<a href="http://www.4avisos.com/sistema-de-ventas-en-php-mysql-ajax/" target="_blank">
					<img src="http://www.4avisos.com/wp-content/uploads/2018/09/sistema-de-venta-en-php.gif" alt="sitema de ventas -" width="500px" height="200px">
				</a>
				<a href="http://www.4avisos.com/sistema-gestion-escolar-lesson-en-codeigniter/" target="_blank">
					<img src="http://www.4avisos.com/wp-content/uploads/2018/08/sistema-de-gestion-escolar.gif" alt="sitema de gestion escolar" width="500px" height="200px">
				</a>
			</div>
		</div>	
	</div>



    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">  
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Grupo: <?php echo $nombre_grupo; ?> <button class="btn btn-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i>Agregar Alumno</button>  </h1>
   <a id="btnasistencia" href="asistencia.php?idgrupo=<?php echo $idgrupo; ?>" class="btn btn-warning"><i class='fa fa-check'></i> Asistencia</a>
  <a  id="btnconducta" href="conducta.php?idgrupo=<?php echo $idgrupo; ?>" class="btn btn-primary"><i class='fa fa-smile-o'></i> Comportamiento</a>
  <a id="btncalificaciones" href="calificaciones.php?idgrupo=<?php echo $idgrupo; ?>" class="btn btn-danger"><i class='fa fa-tasks'></i> Calificaciones</a>
  <a id="btncursos" href="cursos.php?idgrupo=<?php echo $idgrupo; ?>" class="btn btn-primary"><i class='fa fa-th-large'></i> Cursos</a>
  <a  id="btnlistas" href="listasis.php?idgrupo=<?php echo $idgrupo; ?>" class="btn btn-info"><i class='fa fa-th-list'></i> Listas</a>




  <div class="box-tools pull-right">
    <a id="btngrupos" href="escritorio.php"><button class="btn btn-info"><i class='fa fa-th-large'></i> Grupos</button></a>
  </div>
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Opciones</th>
      <th>Imagen</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Telefono</th>
      <th>Dirección</th>
      <th>Email</th>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
      <th>Opciones</th>
      <th>Imagen</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Telefono</th>
      <th>Dirección</th>
      <th>Email</th>
    </tfoot>   
  </table>
</div>
<div class="panel-body" id="formularioregistros">
  <form action="" name="formulario" id="formulario" method="POST">
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Nombres(*):</label>
          <input type="hidden" id="idgrupo" name="idgrupo" value="<?php echo $_GET["idgrupo"];?>">
      <input class="form-control" type="hidden" name="idalumno" id="idalumno">
      <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Apellidos(*):</label>
            <input class="form-control" type="text" name="apellidos" id="apellidos" maxlength="100" placeholder="Nombre" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
    </div>
       <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Dirección(*)</label>
      <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Dirección" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
    </div>
       <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Email(*)</label>
      <input class="form-control" type="email" name="email" id="email" maxlength="256" placeholder="ejemplo@ejemplo.com">
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Teléfono(*)</label>
      <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Dirección" required>
    </div>
        <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Imagen:</label>
      <input class="form-control" type="file" name="imagen" id="imagen">
      <input type="hidden" name="imagenactual" id="imagenactual">
      <img src="" alt="" width="150px" height="120" id="imagenmuestra">
    </div>
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button>

      <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
    </div>
  </form>
</div>
<!--fin centro-->
      </div>
      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<?php 
 ?>
 <script src="scripts/vista_grupo.js"></script>


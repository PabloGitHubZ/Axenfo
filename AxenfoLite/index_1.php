<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>CRUD con Ajax usando PDO y Bootstrap/Modal</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
</head>
<body>
<div class="container">
	<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  		<a class="navbar-brand" href="code.html" target="_blank">AnthonCode</a>
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
		        <a class="nav-link text-warning" href="code.html" target="_blank"><i class="fa fa-code"></i> Sistemas en PHP</a>
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" placeholder="Search" type="text">
		      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
		    </form>
	  	</div>
	</nav>
	<h1 class="page-header text-center">CRUD con Ajax usando PDO</h1>
	<div class="row">
		<div class="col-sm-12">
			<button id="addnew" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar nuevo</button>
            <div id="alert" class="alert alert-dismissible alert-success text-center" style="margin-top:20px; display:none;">
            	  <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span id="alert_message"></span>
            </div>  
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Dirección</th>
					<th>Acción</th>
				</thead>
				<tbody id="tbody"></tbody>
			</table>
		</div>
	</div>
</div>
<!-- LLamamos a Modal -->
<?php include('modal.html'); ?>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/app.js"></script>
</body>
</html>
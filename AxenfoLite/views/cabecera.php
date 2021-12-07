<?php
session_start();
require_once "../src/Conexion.php";
require_once "../src/Usuario.php";
require_once "../src/Nodo.php";
require_once "../src/Incidencia.php";
require_once "../src/Controladora.php";
require_once "../src/Olt.php";
require_once "../src/Switch.php";
use Clases\Usuario;
?>

<html>
<head>
    <meta charset="utf-8">
    <title>AXENFO</title>

    <!--  ******************  CSS  **************************  -->   
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../public/dist/css/adminlte.css">
    <!--  ******************  SCRIPTS  **************************  --> 
    <script src="../public/bootstrap/js/jquery.min.js"></script>
    <script src="../public/bootstrap/js/bootstrap.min.js"></script> 
    <script src="../public/dist/js/adminlte.min.js"></script>    

</head>
<body>
    <nav class="navbar navbar-static-top fixed">
        <a href="vistaGlobal.php" class="logo">
            <span class="title" style="color: black"><h1><b>AXENFO </b>| Xestión de Nodos</h1></span>
        </a>
        <form action="buscar.php" method="post">
            <input type="text" name="busqueda" size="20" maxlength="30" placeholder="Buscar">
            <button class="glyphicon glyphicon-search" name="buscar" id="buscar" type="submit"></button>
        </form>

        <ul class="nav navbar-nav">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
            <span class="user-menu" style="color: black"><?php echo $_SESSION['usuario']; ?></span>
            </a>
            <ul class="dropdown-menu">
            <a href="salir.php" class="btn btn-default btn-block">Cerrar sesión</a>
            </ul>
        </ul>
    </nav>
    
    <aside class="main-sidebar" style="background: #009999">
        <section class="sidebar">
            <a href="vistaGlobal.php" class="logo">
                <img src="Logo_w.png" alt="Logo" width="220" height="220">
            </a>
            <ul class="sidebar-menu" data-widget="tree" style="color: white"><br>

                <li class="treeview">
                    <i class="fa fa-th-large"></i> <span>Nodos</span>
                    <ul class="treeview-menu">
                    <li><a style="color: white" href="crearNodo.php">Nuevo nodo</a></li>
                    <li><a style="color: white" href="listadoNodos.php">Listado nodos</a></li>
                    </ul>
                </li><br>
                <li class="treeview">
                    <i class="fa fa-tasks"></i> <span>Equipos</span>      
                    <ul class="treeview-menu">
                        <li><a style="color: white" href="listadoControladoras.php">Controladoras</a></li>
                        <li><a style="color: white" href="listadoOlts.php">OLTs</a></li>
                        <li><a style="color: white" href="listadoSwitches.php">Switches</a></li>
                    </ul>
                </li><br>
                <li class="treeview">
                    <i class="fa fa-th-list"></i> <span>Incidencias</span>
                    <ul class="treeview-menu">
                    <li><a style="color: white" href="crearIncidencia.php">Nueva incidencia</a></li>
                    <li><a style="color: white" href="listadoIncidencias.php">Listado incidencias</a></li>
                    </ul> 
                </li><br>
      
                <li><a style="color: darkblue" href="Página de documentacion"><i class="fa fa-question-circle"></i> <span></span>Ayuda</a></li>
                <li><a style="color: darkblue" href="Página de datos de Axenfo"><i class="fa  fa-exclamation-circle"></i> <span></span>Acerca de</a></li>
            </ul>
      
        </section>
    </aside>
 </body>
</html>
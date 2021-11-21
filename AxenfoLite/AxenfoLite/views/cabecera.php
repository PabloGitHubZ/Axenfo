<?php 
 
session_start();
$_SESSION['usuario'] = 'admin'; //Pendiente de cambiar cuando se loguee correctamente
$_SESSION['nodo']= 0;
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
        <ul class="nav navbar-nav">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
            <span class="user-menu" style="color: black"><?php echo $_SESSION['usuario']; ?></span>
            </a>
            <ul class="dropdown-menu">
            <a href="salir.php" class="btn btn-default btn-block">Cerrar sesión</a>
            </ul>
        </ul>
    </nav>
    
    <aside class="main-sidebar">
    <section class="sidebar">
        <a href="vistaGlobal.php" class="logo">
        <img src="Logo.png" alt="Logo" width="150" height="150">
        </a>
        <ul class="sidebar-menu" data-widget="tree" style="color: #999999"><br>

        <?php   if ($_SESSION['nodo']==0) { ?>
    
            <li class="treeview">
                <i class="fa fa-th-large"></i> <span>Nodos</span>
                <ul class="treeview-menu">
                    <li><a href="crearNodo.php">Nuevo nodo</a></li>
                    <li><a href="listadoNodos.php">Listado nodos</a></li>
                </ul>
            </li><br>
            <li class="treeview">
                <i class="fa fa-tasks"></i> <span>Equipos</span>      
                <ul class="treeview-menu">
                    <li><a href="listadoControladoras.php"></i>Controladoras</a></li>
                    <li><a href="listadoOlts.php"></i>OLTs</a></li>
                    <li><a href="listadoSwitches.php"></i>Switches</a></li>
                </ul>
            </li><br>
            <li class="treeview">
                <i class="fa fa-th-list"></i> <span>Incidencias</span>
                <ul class="treeview-menu">
                   <li><a href="crearIncidencia.php"></i>Nueva incidencia</a></li>
                   <li><a href="listadoIncidencias.php"></i>Listado incidencias</a></li>
                </ul> 
            </li><br>
        
        <?php   };    
                if ($_SESSION['nodo'] != 0) { ?>
   
            <li class="treeview">
                <i class="fa fa-th-large"></i> <span>Nodo <?php echo $_SESSION['nodo']; ?></span>
                <ul class="treeview-menu">
                    <li><a href="vistaNodo.php">Ver datos</a></li>
                </ul>
            </li><br>
            <li class="treeview">
                <i class="fa fa-th-list"></i> <span>Incidencias</span>
                <ul class="treeview-menu">
                   <li><a href="crearIncidencia.php"></i>Nueva incidencia</a></li>
                   <li><a href="listadoIncidencias.php"></i>Listado incidencias</a></li>
                </ul> 
            </li><br>
    
        <?php }; ?>        

        <li><a href="Página de documentacion"><i class="fa fa-question-circle"></i> <span></span>Ayuda</a></li>
        <li><a href="Página de datos de Axenfo"><i class="fa  fa-exclamation-circle"></i> <span></span>Acerca de</a></li>
      </ul>
      
    </section>
    </aside>
    </body>
</html>
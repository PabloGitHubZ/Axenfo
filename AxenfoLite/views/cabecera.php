 <?php 
  session_start();
//  $_SESSION['usuario'] = admin;
  $_SESSION['nodo'] = 1;
  ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>AXENFO</title>

    <!--  ******************  CSS  **************************  -->   
	<link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../public/bootstrap/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="../public/dist/css/adminlte.css">
<!--	<link rel="stylesheet" type="text/css" href="../public/bootstrap/css/custom.css">-->
    
    <!--  ******************  SCRIPTS  **************************  --> 
    <script src="../public/bootstrap/js/jquery.min.js"></script>
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>    
    <script src="../public/dist/js/adminlte.min.js"></script>

<!--          ******************  CSS BASES DE DATOS  ************************** (MODIFICAR  !!!!!!! )  
        <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
        <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
        <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="../public/plugins/datatables-select/css/select.bootstrap4.min.css">-->

    </head>

  <header class="main-header">
    <!-- Logo -->
    <a href="listado.php" class="logo">
      <span class="logo"><h1><b>AXENFO </b>| Xestión de Nodos</h1></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="listado.php" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

        <li class="dropdown user user-menu">
            <a href="nodos.php" class="dropdown-toggle" data-toggle="dropdown">
              <span class="user-menu"><?php echo $_SESSION['usuario']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../salir.php" class="btn btn-default btn-flat">Cerrar sesión</a>
                </div>
              </li>
            </ul>
        </li>
        </ul>
      </div>
    </nav>
  </header>
    
    
    
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
     
      
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
    <br>
    <?php 
        if ($_SESSION['nodo'] == 1) {
        echo ' <li><a href="listado.php"><i class="fa  fa-dashboard (alias)"></i> <span>Nodos</span></a>
              </li>';
        }
    ?> 


    <?php 
    if ($_SESSION['nodo'] == 0) {
        echo '<li class="treeview">
      <a href="#">
        <i class="fa fa-shopping-cart"></i> <span>Nodos</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="listado.php"><i class="fa fa-circle-o"></i> </a></li>
      </ul>
    </li>';
    }
    ?>

          <?php
           if ($_SESSION['nodo']==1):?>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-check"></i> <span>Equipos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="crearNodo.php"><i class="fa fa-circle-o"></i>Nuevo nodo</a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-smile-o"></i> <span>Equipos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="controladoras.php"><i class="fa fa-circle-o"></i>Ver controladoras</a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-tasks"></i> <span>Equipos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="olts.php"><i class="fa fa-circle-o"></i>Ver OLTs</a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-th-large"></i> <span>Equipos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a id="btncursos" href="cursos.php"><i class="fa fa-circle-o"></i>Ver Switches</a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-th-list"></i> <span>Incidencias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a id="btnlistas" href="listasis.php?"><i class="fa fa-circle-o"></i>Agregar incidencia</a></li>
          </ul>
        </li>
          <?php endif; ?>


        <?php 
            if ($_SESSION['nodo']==1) {
              echo '  <li class="treeview">
                      <a href="#">
                        <i class="fa fa-users"></i> <span>dfjdjkdfkj</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="nodos.php"><i class="fa fa-circle-o"></i> nodos</a></li>
                        <li><a href="listado.php"><i class="fa fa-circle-o"></i> listado</a></li>
                      </ul>
                    </li>';
              
              
            }
        ?>     
        <li><a href="Página de documentacion"><i class="fa fa-question-circle"></i> <span></span>Ayuda</a>
        <li><a href="Página de datos de Axenfo"><i class="fa  fa-exclamation-circle"></i> <span></span>Acerca de</a>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
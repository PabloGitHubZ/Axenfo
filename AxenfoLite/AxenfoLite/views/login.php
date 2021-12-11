<?php
require_once "../src/Conexion.php";
require_once "../src/Usuario.php";
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
    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="logo/Logo.png" alt="Logo" width="200" height="200">
            <div><b>AXENFO</b> | Xestión de Nodos</div>
        </div>
        <div class="login-box-body">
            <form method="POST" id="acceso">
            <div class="form-group has-feedback">
                <input type="text" id="user" name="user" class="form-control" placeholder="Usuario">
                <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Password">
                <span class="fa fa-key form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                </div>
                <div class="col-xs-4">
                <button type="submit" id="ingresar" name="ingresar" class="btn btn-primary btn-block">Ingresar</button>
                </div>
            </div>
            </form>        
        </div>
    </div>
        
    <?php
    
    if (isset($_POST['ingresar'])) {
        $usuario = new Usuario();
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $acceso = $usuario->comprobarUsuario($user, $pass);
        if ($acceso == true) { 
            session_start();
            $_SESSION['usuario'] = $user;
            header('Location:vistaGlobal.php');
        }
        else echo "<script> alert('Datos incorrectos'); </script>";  
    }
    ?>    
       
    </body>
</html> 

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

    
    <?php 
        
        require_once "../src/Usuario.php";
        use Clases\Usuario;
        $usuario = new Usuario();
    ?>   
    
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <div><b>AXENFO</b> | Xestión de Nodos</div>
        </div>
      <div class="login-box-body">
        <form method="post" id="acceso">
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
              <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
            </div>
          </div>
        </form>        
      </div>
    </div>

    <script type="text/javascript" src="js/login.js"></script>
    
    <?php 
       
//        $usuario = new Usuario();
//        $user = $_POST['user'];
//        $passNohash = $_POST['pass'];
//        $pass = hash("SHA256", $passNohash);
//        $valido = $usuario->comprobarUsuario($login, $pass);
        
    ?>

  </body>
</html> 

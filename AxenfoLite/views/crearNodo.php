<?php

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Nodo.php";
 use Clases\Nodo;

?>

<div class="container">
    <h1 class="page-header text-center">Crear nuevo Nodo</h1>
        <div class="form-row" id="formNodo">
          <form action="" name="formNodo" id="formNodo" method="POST">
            <div class="form-group col-lg-8 col-md-8 col-xs-12">
              <label for="nombre">Nombre del Nodo:</label>
        <!--      <input type="hidden" id="id" name="id" value="<?php echo $_GET["id"];?>">
              <input class="form-control" type="hidden" name="idalumno" id="idalumno">-->
              <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" required>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label for="ubicacion">Ubicación:</label>
                    <input class="form-control" type="text" name="ubicacion" id="ubicacion" maxlength="100" placeholder="Ubicación">
            </div>
              <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label for="direccion">Dirección</label>
              <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección" required>
            </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label for="imagen">Imagen</label>
              <input class="form-control" type="file" name="imagen" id="imagen">
              <input type="hidden" name="imagenactual" id="imagenactual">
              <img src="" alt="" width="150px" height="120" id="imagenmuestra">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <button class="btn btn-primary" type="submit" id="guardar"><i class="fa fa-save"></i>Guardar</button>

              <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i>Cancelar</button>
            </div>
          </form>
        </div>
</div>

 <script type="text/javascript" src="js/nodo.js"></script>

<?php

//    $nom = $_REQUEST['nombre'];
//    $ubi = $_REQUEST['ubicacion'];
//    $dir = $_REQUEST['direccion'];

    
    //hacerlo con js !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $nodo = new Nodo();
//    if (strlen($nom) == 0 || strlen($ubi) == 0 || strlen($dir) == 0) 
//        echo("Todos los campos deben contener algún carácter válido");
//    if ($nodo->existeNodo($nombre)) {
//        $nodo = null;
//        echo("Ese nodo ya existe");
//    }
//
//    $nodo->setNombre(ucwords($nom));
//    $nodo->setUbicacion(ucwords($ubi));
//    $nodo->setDireccion($dir);
//    $nodo->creaNodo();
//    $nodo = null;
//    $_SESSION['mensaje'] = "Nodo creado con exito";
//    header('Location:listado.php');



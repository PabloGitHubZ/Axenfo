<?php
session_start();

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Nodo.php";
 use Clases\Nodo;
?>

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

<!-- <script src="js/vista_grupo.js"></script>-->

<?php
//Borramos todos los datos antes de crearlos
$jugador = (new Jugador())->borrarTodo();
$jugador = null;
//--------------------------------
$faker = Factory::create('es_Es');

$cantidad = 12; // Crearemos 15  jugadores
for ($i = 0; $i < $cantidad; $i++) {
    $jugador = new Jugador();
    $jugador->setNombre($faker->firstName('male' | 'female'));
    $jugador->setApellidos($faker->lastName . " " . $faker->lastName);
    $jugador->setDorsal($faker->unique()->numberBetween(1, 60));
    $jugador->setPosicion($faker->numberBetween(1, 6));
    $jugador->create();
    $jugador = null;
}
$_SESSION['mensaje'] = 'Datos de Ejemplo Creados Correctamente';
header('Location:jugadores.php');

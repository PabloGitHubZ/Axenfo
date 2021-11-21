<?php

require 'cabecera.php';
require_once "../src/Conexion.php";
require_once "../src/Nodo.php";
use Clases\Nodo;

?>

<div class="container">
    
    <h1 class="page-header text-center">Configurar Nodo <?php echo $_SESSION['nodo']; ?></h1>
    <div class="form-row" id="formNodo">
        <form action="" name="formNodo" id="formNodo" method="POST">
            <div class="form-group col-lg-8 col-md-8 col-xs-12">
                <label for="nombre">Componente:</label>
                <select name="componente">
                    <option value="1">Controladora</option> 
                    <option value="2">Switch</option> 
                    <option value="3">OLT</option>
                </select>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="ubicacion">Nombre:</label>
                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="direccion">IP:</label>
                <input type="text" class="form-control" name="ip" id="ip" placeholder="IP">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="direccion">Marca:</label>
                <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                <label for="direccion">Número de Serie:</label>
                <input type="text" class="form-control" name="serial" id="serial" placeholder="Número de serie">
            </div>
              
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-primary" type="submit" id="guardar"><i class="fa fa-save"></i> Guardar</button>
                <a id="btngrupos" href="vistaGlobal.php"><button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
            </div>
        </form>
    </div>
</div>

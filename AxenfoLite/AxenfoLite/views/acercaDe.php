<?php
require 'cabecera.php';
?>

<div class="content-wrapper" style="background-image: url('logo/Logo_g.png'); opacity: 0.8">
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h1 class="box-title text-center">Acerca de Axenfo</h1>
            </div> 
        </div>
        <div class="box">
            <br><h3 class="box-title text-center"> Contexto y aplicación</h3>
            <h5 style="text-align: center">
            <br>Axenfo es un proyecto que surge como respuesta a la necesidad de almacenar y gestionar nodos y equipos de fibra óptica.
            <br>Orientado a los departamentos de NOC de operadores neutros de fibra que desplieguen en localidades pequeñas y zonas rurales.
            <br>En estos casos son necesarios muchos puntos de interconexión y equipos de gestión del tráfico.</h5><br>
            <br><h3 class="box-title text-center"> Estado actual: AxenfoLite</h3>
            <h5 style="text-align: center">
            <br>Inicialmente diseñado solo para saber el estado actual de cada nodo, se ha ido modificando para registrar las incidencias y 
            observar fácilmente las modificaciones en la pantalla principal.
            <br>Se ha intentado implementar una interfaz simple y cómoda, aunque siempre orientada a personal específico de departamentos de redes. 
            <br>Se ha codificado prácticamente en su totalidad en PHP para facilitar la integración con las herramientas de detección de incidencias.</h5><br>
            <br><h3 class="box-title text-center"> Futuro y objetivos</h3>
            <h5 style="text-align: center">
            <br>La aplicación tiene como objetivo final el control de los equipos, el estado real de los nodos y en futuro el estado de la red.
            <br>La integración con herramientas de detección de incidencias es el próximo desafío en lo que se va a trabajar.
            <br>Además se va a implementar una funcionalidad para exportar e importar datos en formato JSON.
            <br>También se está desarrollando la funcionalidad para que a través de Google Maps u otra herramienta se puedan visualizar los circuitos y gestionarlos.</h5><br>
            <br><h5> Histórico versiones</h5>
            <p>Noviembre - 2021: AxenfoLite 1.0 : Funcionalidad básica como CRUD de Nodos e Incidencias
            <br>Diciembre - 2021: AxenfoLite 1.1 : Añadido integración con Google Maps y opción de búsqueda     
            <br><h5> Contacto:</h5>
            <p>Pablo García Rodríguez
            <br>pablo.garcia.uni@gmail.com
            <br>https://github.com/PabloGitHubZ/Axenfo</p>
        </div>
    </section>
</div>


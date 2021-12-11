<script type="text/javascript">
    var map;
    var pathCoordinates = Array();
    
    <!--/**
     * Crea el mapa de Google Maps
     * 
     * @param google.maps.Map map mapa de Google Maps
     *
     */-->

    function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: 42.763394, lng: -8.019231},
    zoom: 8,
    });
 
    <?php
    require_once "../src/Conexion.php";
    require_once "../src/Usuario.php";
    require_once "../src/Nodo.php";
    use Clases\Nodo;

    $nodo = new Nodo();
    $nodos = $nodo->getNodos(); //Obtenemos la lista de nodos completa
    foreach ($nodos as $nodo) { 
        if ($nodo->estado == "Funcionando") { //A los nodos que estén funcionando les ponemos el marcador en verde
    ?>
                
            var marker<?php echo $nodo->id; ?> = new google.maps.Marker ({
              position: {lat: <?php echo $nodo->latitud; ?>, lng: <?php echo $nodo->longitud; ?>},
              map: map,
              title: '<?php echo $nodo->nombre; ?>',
              icon: { url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png"
              }
            });
            pathCoordinates.push({
                lat : <?php echo $nodo->latitud; ?>,
                lng : <?php echo $nodo->longitud; ?>
            });
        
        <?php
        }
        else { //A los nodos que no estén funcionando les ponemos el marcador en rojo
        ?>
                
            var marker<?php echo $nodo->id; ?> = new google.maps.Marker ({
              position: {lat: <?php echo $nodo->latitud; ?>, lng: <?php echo $nodo->longitud; ?>},
              map: map,
              title: '<?php echo $nodo->nombre; ?>',
            });
            pathCoordinates.push({
                lat : <?php echo $nodo->latitud; ?>,
                lng : <?php echo $nodo->longitud; ?>
            });
    <?php
        }
    }
    ?>
            

//Sin implementar. Proyecto previsto para conexiones entre nodos
//    function drawPath() {
//        new google.maps.Polyline({
//                path : pathCoordinates,
//                geodesic : true,
//                strokeColor : '#FF0000',
//                strokeOpacity : 1,
//                strokeWeight : 4,
//                map : map
//        });
//    }
</script> 
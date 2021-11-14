$("#formNodo").on('submit',function(e) {
    e.preventDefault();
    nombre = $("#nombre").val();
    ubicacion = $("#ubicacion").val();
    direccion_fisica = $("#direccion_fisica").val();
    $.post("../src/Nodo.php?op=creaNodo",
    {"nombre":nombre, "ubicacion":ubicacion, "direccion_fisica":direccion_fisica},
    function(data) {
        alert ("Nodo creado");
    });
});
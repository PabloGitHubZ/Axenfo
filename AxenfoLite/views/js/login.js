$("#acceso").on('submit',function(e) {
    e.preventDefault();
    user = $("#user").val();
    pass = $("#pass").val();
    $.post("../src/Usuario.php?op=comprobarUsuario",
    {"user":user, "pass":pass},
    function(data) {
        if (data != false) {
            $(location).attr("href","vistaGlobal.php");
        }
        else {
            console.log(user, pass, data);
            alert("Datos incorrectos");
        }
    });
});
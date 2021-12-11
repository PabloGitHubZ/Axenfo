$("#acceso").submit(function(e) {
    e.preventDefault();
    user = $("#user").val();
    pass = $("#pass").val();
    $.post("funcionLogin.php", {
        "user":user, 
        "pass":pass
    }, function(data) {
        if (data == true) {
            $(location).attr("href","vistaGlobal.php");
        }
        else {
        console.log(user, pass, data);
        alert("Datos incorrectos");
        }
    });
});
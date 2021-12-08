<?php
    session_unset(); //cierra la sesión cuando se ejecute
    session_destroy(); //cierra la sesión al cerrar la página
    header("Location: ../index.php"); 
?>
<?php
    session_start();
    $_SESSION['nombre'] = ''; // Con la funcion unset borramos de la sesion el nombre
    session_destroy();

    header("Location: ../controller/mainController.php")
?>
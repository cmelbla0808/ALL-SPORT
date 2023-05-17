<?php
    use \model\Usuario;
    use \model\Utils;

    // Añadimos el código del modelo
    require_once("../model/Usuario.php");
    require_once("../model/Utils.php");

    // Recogemos el Email
    $email = $_POST['email'];

    $gestorUsu = new Usuario();

    // Nos conectamos a la Bd 
    $conexPDO = Utils::conectar();

    // Obtenemos todos los datos del Usuario que hemos introducido su Email
    $datosUsuario = $gestorUsu->getUsuario($conexPDO, $email);

    /* 
        Encriptamos el Password que hemos introducido con el mismo salt que tiene el Usuario, 
        para que si al ser la misma contraseña se encripten igual y asi poder compararla con
        la contraseña encriptada de la BD
    */
    $password = crypt($_POST["password"],'$6$rounds=5000$'.$datosUsuario['salt'].'$');

    if ($password == $datosUsuario['password'] && $datosUsuario['activo'] = 1) {
        // Iniciamos la sesion 
        session_start();

        // Guardamos en la sesion el nombre
        $_SESSION['id'] = $datosUsuario['id'];
        $_SESSION['nombre'] = $datosUsuario['nombre'];
        $_SESSION['apellido'] = $datosUsuario['apellido'];
        $_SESSION['email'] = $datosUsuario['email'];
        $_SESSION['edad'] = $datosUsuario['edad'];
        $_SESSION['admin'] = $datosUsuario['admin'];
        $_SESSION['imagen'] = $datosUsuario['imagen'];

        header("Location: ../controller/mainController.php");
    }else {
        include("../views/login.php");
        echo '<script>alert("La contraseña es incorrecta");</script>';
    }

?>
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

    include("../views/recoverPasswordCode.php");

?>
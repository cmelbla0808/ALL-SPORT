<?php

    namespace controller;

    session_start();
    error_reporting(0);

    use \model\Usuario;
    use \model\Utils;

    // Añadimos el código del modelo
    require_once("../model/Usuario.php");
    require_once("../model/Utils.php");

    $gestorUsu = new Usuario();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();
    $datosUsuarios = $gestorUsu->getAllUsuario($conexPDO);

    include("../views/manage-user.php");


?>
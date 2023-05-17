<?php

    namespace controller;

    session_start();
    error_reporting(0);

    use \model\Chat;
    use \model\Utils;

    // Añadimos el código del modelo
    require_once("../model/Chat.php");
    require_once("../model/Utils.php");

    $gestorChat = new Chat();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();
    $datosChat = $gestorChat->getChatUser($conexPDO, $_SESSION["id"]);

    include("../views/allChats.php");


?>
<?php

namespace controller;

session_start();
error_reporting(0);

use \model\Chat;
use \model\Utils;

require_once("../model/Utils.php");
require_once("../model/Chat.php");


if (isset($_GET['id'])) {

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Creamos un array para guardar los datos del producto
    $mensage = array();
    $chat = array();

    $gestorChat = new Chat;

    $mensage = $gestorChat->getAllMensageChat($conexPDO, $_GET['id']);
    $chat = $gestorChat->getOneChat($_GET['id'], $conexPDO);

    // Rellenamos los datos del producto que le pasaremos a la vista
    $mensage["mensage"] = $mensage["mensage"];
    $mensage["idUsuario"] = $mensage["idUsuario"];

    $chat['nombreProducto'] = $chat['nombreProducto'];
    $chat['id'] = $chat['id'];

    include("../views/chat.php");

} else {

    header("Location: ../controller/mainController.php");

}

?>
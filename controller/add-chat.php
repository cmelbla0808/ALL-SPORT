<?php

namespace controller;

session_start();
error_reporting(0);

use \model\Chat;
use \model\Utils;

// Añadimos el código del modelo
require_once("../model/Chat.php");
require_once("../model/Utils.php");


if (isset($_GET["nombreProducto"]) && isset($_GET["idUsuario1"]) && isset($_GET["idUsuario2"]) && isset($_GET["imagen"]) && isset($_GET["nombreVendedor"])) {
    
    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    $existeChat = new Chat();
 
    $datosChatExiste = $existeChat -> getChatExist($conexPDO, $_GET["nombreProducto"]);
    
    if ($datosChatExiste['nombreProducto'] == $_GET["nombreProducto"]  && ($datosChatExiste['idUsuario1'] ==  $_GET["idUsuario1"] && $datosChatExiste['idUsuario2'] == $_GET["idUsuario2"])) {
        header("Location: ../controller/mensageChat.php?id=" . $datosChatExiste['id']);
    } else {

        // Creamos un array para guardar los datos del producto
        $chat = array();

        // Rellenamos los datos del producto que le pasaremos a la vista
        $chat["nombreProducto"] = $_GET["nombreProducto"];
        $chat["idUsuario1"] = $_GET["idUsuario1"];
        $chat["idUsuario2"] = $_GET["idUsuario2"];
        $chat["imagen"] = $_GET["imagen"];
        $chat["nombreVendedor"] = $_GET["nombreVendedor"];

        $gestorChat = new Chat();

        // Añadimos el registro
        $resultado = $gestorChat->addChat($chat, $conexPDO);

        header("Location: ../controller/chatUser.php");
    }


} else {
    // Declaramos la accion para que el formulario sepa a que controlador llamar con los datos
    $accion = "insertar";

    print("Algo ha fallado");
    
    // Sin datos del piloto cargados cargamos la vista
    //header("Location: ../controller/controller-manageCategories.php");

}

?>
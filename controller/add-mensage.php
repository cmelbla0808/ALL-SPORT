<?php

namespace controller;

session_start();
error_reporting(0);

use \model\Chat;
use \model\Utils;

// Añadimos el código del modelo
require_once("../model/Chat.php");
require_once("../model/Utils.php");


if (isset($_POST["idUsuario"]) && isset($_POST["message"]) && isset($_POST["idChat"])) {
    
    // Creamos un array para guardar los datos del producto
    $mensage = array();

    // Rellenamos los datos del producto que le pasaremos a la vista
    $mensage["idUsuario"] = $_POST["idUsuario"];
    $mensage["mensage"] = $_POST["message"];
    $mensage["idChat"] = $_POST["idChat"];

    $gestorChat = new Chat();

     // Nos conectamos a la Bd
     $conexPDO = Utils::conectar();

     // Añadimos el registro
     $resultado = $gestorChat->addMensage($mensage, $conexPDO);
    

    // Si ha ido bien el mensaje sera distint
    if ($resultado != null)
        $mensaje = "El Cliente se Inserto Correctamente";
    else
        $mensaje = "Ha habido un fallo al acceder a la Base de Datos\n salte por la ventana ya!";

    header("Location: ../controller/mensageChat.php?id=" . $mensage['idChat']. "");

} else {
    // Declaramos la accion para que el formulario sepa a que controlador llamar con los datos
    $accion = "insertar";

    print("Algo ha fallado");
    
    // Sin datos del piloto cargados cargamos la vista
    //header("Location: ../controller/controller-manageCategories.php");

}

?>
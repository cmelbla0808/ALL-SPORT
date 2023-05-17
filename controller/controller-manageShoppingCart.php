<?php

    namespace controller;

    session_start();
    error_reporting(0);

    use \model\Carrito;
    use \model\Utils;

    // Añadimos el código del modelo
    require_once("../model/Carrito.php");
    require_once("../model/Utils.php");

    $gestorCat = new Carrito();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();
    $datosCarrito = $gestorCat->getAllCarritoUser($conexPDO, $_SESSION['id']);

    if($datosCarrito != null) {
        include("../views/shoppingCart.php");
    } else {
        include("../views/shoppingCart.php");
    }


?>
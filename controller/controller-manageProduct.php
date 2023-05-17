<?php

    namespace controller;

    session_start();
    error_reporting(0);

    use \model\Producto;
    use \model\Utils;

    // Añadimos el código del modelo
    require_once("../model/Producto.php");
    require_once("../model/Utils.php");

    $gestorPro = new Producto();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();
    $datosProductos = $gestorPro->getAllProductoUser($conexPDO, $_SESSION["id"]);

    include("../views/manage-product.php");


?>
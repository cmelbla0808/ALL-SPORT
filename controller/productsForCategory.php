<?php

    namespace controller;

    session_start();
    error_reporting(0);

    use \model\Producto;
    use \model\Utils;
    use \model\Categoria;

    // Añadimos el código del modelo
    require_once("../model/Producto.php");
    require_once("../model/Utils.php");
    require_once("../model/Categoria.php");

    if (isset($_GET['id'])) {

    $gestorPro = new Producto();
    $gestorCat = new Categoria();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    $datosProductos = $gestorPro->getProductoCategoria($conexPDO, $_GET['id']);
    $datosCategorias = $gestorCat->getAllCategories($conexPDO);

    include("../views/productsForCategory.php");

    }else {

        header("Location: ../controller/mainController.php");
    }

?>
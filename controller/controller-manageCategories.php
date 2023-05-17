<?php

    namespace controller;

    session_start();
    error_reporting(0);

    use \model\Categoria;
    use \model\Utils;

    // Añadimos el código del modelo
    require_once("../model/Categoria.php");
    require_once("../model/Utils.php");

    $gestorCat = new Categoria();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();
    $datosCategorias = $gestorCat->getAllCategories($conexPDO);

    include("../views/manage-categories.php");


?>
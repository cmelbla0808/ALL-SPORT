<?php

use \model\Categoria;
use \model\Utils;

// Creamos un array para guardar los datos del piloto
$categoria = array();


if (isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_FILES["imagen"])) {

    // Rellenamos los datos del piloto que le pasaremos a la vista
    $categoria["id"] = $_POST["id"];
    $categoria["nombre"] = $_POST["nombre"];
    $categoria["descripcion"] = $_POST["descripcion"];
    $categoria["imagen"] = $_FILES["imagen"]["name"];

    $ruta = '../images/'.$_FILES["imagen"]['name'];
    move_uploaded_file($_FILES["imagen"]['tmp_name'], $ruta);

    require_once("../model/Categoria.php");
    require_once("../model/Utils.php");

    $gestorCat = new Categoria();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Modificamos el registro
    $resultado = $gestorCat->updateCategoria($categoria, $conexPDO);

    header("Location: ../controller/controller-manageCategories.php");
} else {

    header("Location: ../controller/mainController.php");
}

?>
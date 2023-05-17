<?php

use \model\Utils;
use \model\Categoria;


require_once("../model/Utils.php");
require_once("../model/Categoria.php");

// Creamos un array para guardar los datos del piloto
$categoria = array();

if (isset($_POST["id"])) {

    $categoria["id"] = $_POST["id"];

    $gestorCategoria = new Categoria();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    $datosCategoria = $gestorCategoria->getOneCategory($categoria["id"], $conexPDO);


    include("../views/updateCategory.php");

} else {
    header("Location: ../controller/controller-manageCategories.php");
}

?>

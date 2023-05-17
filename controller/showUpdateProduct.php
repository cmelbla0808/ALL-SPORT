<?php

use \model\Producto;
use \model\Utils;
use \model\Categoria;


require_once("../model/Producto.php");
require_once("../model/Utils.php");
require_once("../model/Categoria.php");

// Creamos un array para guardar los datos del piloto
$producto = array();

if (isset($_POST["id"])) {

    $producto["id"] = $_POST["id"];

    $gestorPro = new Producto();
    $gestorCategoria = new Categoria();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    $datosProducto = $gestorPro->getOneProducto($producto["id"], $conexPDO);
    $datosCategoria = $gestorCategoria->getAllCategories($conexPDO);

    include("../views/updateProduct.php");

} else {
    header("Location: ../controller/controller-manageProduct.php");
}

?>

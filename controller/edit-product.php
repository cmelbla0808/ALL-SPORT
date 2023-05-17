<?php

use \model\Producto;
use \model\Utils;

// Creamos un array para guardar los datos del piloto
$producto = array();


if (isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["precio"]) && isset($_POST["imagen"]) && isset($_POST["categoria_id"])) {

    // Rellenamos los datos del piloto que le pasaremos a la vista
    $producto["id"] = $_POST["id"];
    $producto["nombre"] = $_POST["nombre"];
    $producto["descripcion"] = $_POST["descripcion"];
    $producto["precio"] = strval($_POST["precio"]);
    $producto["imagen"] = $_POST['imagen'];
    $producto["categoria_id"] = $_POST["categoria_id"];

    if (isset($_POST["modificar"]) && $_POST["modificar"] == "false") {
        // Con los datos del piloto cargados cargamos la vista
        include("../views/editProducto.php");
    } else {
        require_once("../model/Producto.php");
        require_once("../model/Utils.php");

        $gestorPro = new Producto();

        // Nos conectamos a la Bd
        $conexPDO = Utils::conectar();

        // Modificamos el registro
        $resultado = $gestorPro->updateProducto($producto, $conexPDO);

        header("Location: ../controller/manage-product.php");
    }
} else {

    header("Location: ../controller/manage-product.php");
}

?>
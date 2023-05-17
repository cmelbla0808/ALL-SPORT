<?php

use \model\Producto;
use \model\Utils;

// Creamos un array para guardar los datos del piloto
$producto = array();


if (isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["edad"]) && isset($_POST["admin"])) {

    // Rellenamos los datos del piloto que le pasaremos a la vista
    $producto["id"] = $_POST["id"];
    $producto["nombre"] = $_POST["nombre"];
    $producto["apellido"] = $_POST["apellido"];
    $producto["email"] = $_POST["email"];
    $producto["edad"] = strval($_POST["edad"]);
    $producto["imagen"] = $_POST['imagen'];
    $producto["categoria_id"] = $_POST["categoria_id"];

    if (isset($_POST["modificar"]) && $_POST["modificar"] == "false") {
        // Con los datos del piloto cargados cargamos la vista
        include("../views/updateProduct.php");
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
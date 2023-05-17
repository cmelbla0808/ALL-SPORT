<?php

    use \model\Producto;
    use \model\Utils;

    // Añadimos el código del modelo
    require_once("../model/Producto.php");
    require_once("../model/Utils.php");

    $gestorPro = new Producto();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Borramos el cliente
    if (isset($_POST["id"])) {
        // Borramos y guardamos el resultado
        $resultado = $gestorPro->delProducto($_POST["id"], $conexPDO);
    }

    header("Location: ../controller/controller-manageProduct.php");

?>
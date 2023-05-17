<?php

    use \model\Carrito;
    use \model\Utils;

    // Añadimos el código del modelo
    require_once("../model/Carrito.php");
    require_once("../model/Utils.php");

    $gestorCar = new Carrito();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Borramos el cliente
    if (isset($_POST["id"])) {
        // Borramos y guardamos el resultado
        $resultado = $gestorCar->delProducto($_POST["id"], $conexPDO);
    }

    header("Location: ../controller/controller-manageShoppingCart.php");

?>
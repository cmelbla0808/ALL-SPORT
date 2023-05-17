<?php

namespace controller;

session_start();
error_reporting(0);

use \model\Producto;
use \model\Carrito;
use \model\Utils;

// Añadimos el código del modelo
require_once("../model/Carrito.php");
require_once("../model/Utils.php");
require_once("../model/Producto.php");



if (isset($_GET['id'])) {

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Creamos un array para guardar los datos del producto
    $carrito = array();

    $gestorProducto = new Producto;

    $producto = $gestorProducto->getOneProducto($_GET['id'],$conexPDO);

    // Rellenamos los datos del producto que le pasaremos a la vista
    $carrito["nombre"] = $producto["nombre"];
    $carrito["precio"] = $producto["precio"];
    $carrito["imagen"] = $producto["imagen"];
    $carrito["usuarios_id"] = $_SESSION['id'];
    $carrito["idProducto"] = $producto["id"];

    $gestorCarrito = new Carrito();

    // Añadimos el registro
    $resultado = $gestorCarrito->addProductoCarrito($carrito, $conexPDO);

   header("Location: ../controller/controller-manageShoppingCart.php");

} else {

    print("La id del producto es = " . $_GET['id']);
    // Sin datos del piloto cargados cargamos la vista
    //header("Location: ../controller/mainController.php");

}

?>
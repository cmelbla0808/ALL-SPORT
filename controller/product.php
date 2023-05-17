<?php

namespace controller;

session_start();
error_reporting(0);

use \model\Producto;
use \model\Utils;

require_once("../model/Utils.php");
require_once("../model/Producto.php");


if (isset($_GET['id'])) {

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Creamos un array para guardar los datos del producto
    $productoView = array();

    $gestorProducto = new Producto;

    $producto = $gestorProducto->getOneProducto($_GET['id'],$conexPDO);

    // Rellenamos los datos del producto que le pasaremos a la vista
    $productoView["usuarios_id"] = $producto["usuarios_id"];
    $productoView["nombre"] = $producto["nombre"];
    $productoView["precio"] = $producto["precio"];
    $productoView["imagen"] = $producto["imagen"];
    $productoView["name"] = $producto["name"];
    $productoView["descripcion"] = $producto["descripcion"];
    $productoView["lastName"] = $producto["lastName"];
    $productoView["fecha_registro"] = $producto["fecha_registro"];
    $productoView["imagenUser"] = $producto["imagenUser"];
    

    include("../views/product.php");

} else {

    header("Location: ../controller/mainController.php");

}

?>
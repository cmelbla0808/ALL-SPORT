<?php

namespace controller;

session_start();
error_reporting(0);

use \model\Producto;
use \model\Utils;


if (isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["precio"]) && isset($_POST["categoria_id"]) && isset($_POST["imagen"]) && isset($_POST["usuarios_id"])) {
    
    // Creamos un array para guardar los datos del producto
    $producto = array();

    // Rellenamos los datos del producto que le pasaremos a la vista
    $producto["nombre"] = htmlspecialchars($_POST["nombre"]);
    $producto["descripcion"] = htmlspecialchars($_POST["descripcion"]);
    $producto["precio"] = strval($_POST["precio"]);
    $producto["categoria_id"] = $_POST["categoria_id"];
    $producto["imagen"] = $_POST["imagen"];
    $producto["usuarios_id"] = $_POST["usuarios_id"];
    $producto["name"] = $_POST["name"];
    $producto["lastName"] = $_POST["lastName"];
    $producto["imagenUser"] = $_POST["imagenUser"];

    // Añadimos el código del modelo
    require_once("../model/Producto.php");
    require_once("../model/Utils.php");

    $gestorProducto = new Producto();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Añadimos el registro
    $resultado = $gestorProducto->addProducto($producto, $conexPDO);

    // Si ha ido bien el mensaje sera distint
    if ($resultado != null)
        $mensaje = "El Cliente se Inserto Correctamente";
    else
        $mensaje = "Ha habido un fallo al acceder a la Base de Datos\n salte por la ventana ya!";

    header("Location: ../controller/controller-manageProduct.php");

} else {
    // Declaramos la accion para que el formulario sepa a que controlador llamar con los datos
    $accion = "insertar";

    // Sin datos del piloto cargados cargamos la vista
    include("../views/add-product.php");

}

?>
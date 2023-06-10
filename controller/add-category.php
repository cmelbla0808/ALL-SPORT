<?php

namespace controller;

session_start();
error_reporting(0);

use \model\Categoria;
use \model\Utils;

// Añadimos el código del modelo
require_once("../model/Categoria.php");
require_once("../model/Utils.php");


if (isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_FILES["imagen"])) {
    
    // Creamos un array para guardar los datos del producto
    $categoria = array();

    // Rellenamos los datos del producto que le pasaremos a la vista
    $categoria["nombre"] = htmlspecialchars($_POST["nombre"]);
    $categoria["descripcion"] = htmlspecialchars($_POST["descripcion"]);
    $categoria["imagen"] = $_FILES["imagen"]["name"];

    $ruta = '../images/'.$_FILES["imagen"]['name'];
    move_uploaded_file($_FILES["imagen"]['tmp_name'], $ruta);

    $gestorCat = new Categoria();

     // Nos conectamos a la Bd
     $conexPDO = Utils::conectar();

     // Añadimos el registro
     $resultado = $gestorCat->addCategoria($categoria, $conexPDO);

    

    // Si ha ido bien el mensaje sera distint
    if ($resultado != null)
        $mensaje = "El Cliente se Inserto Correctamente";
    else
        $mensaje = "Ha habido un fallo al acceder a la Base de Datos\n salte por la ventana ya!";

    header("Location: ../controller/controller-manageCategories.php");

} else {
    // Declaramos la accion para que el formulario sepa a que controlador llamar con los datos
    $accion = "insertar";

    print("Algo ha fallamdo");
    
    // Sin datos del piloto cargados cargamos la vista
    //header("Location: ../controller/controller-manageCategories.php");

}

?>
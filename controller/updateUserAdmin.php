<?php

use \model\Usuario;
use \model\Utils;

// Creamos un array para guardar los datos del piloto
$usuario = array();


if (isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_POST["edad"]) && isset($_POST["admin"])) {

    // Rellenamos los datos del piloto que le pasaremos a la vista
    $usuario["id"] = $_POST["id"];
    $usuario["nombre"] = $_POST["nombre"];
    $usuario["apellido"] = $_POST["apellido"];
    $usuario["email"] = $_POST["email"];
    $usuario["edad"] = strval($_POST["edad"]);
    $usuario["admin"] = $_POST["admin"];

    require_once("../model/Usuario.php");
    require_once("../model/Utils.php");

    $gestorCat = new Usuario();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Modificamos el registro
    $resultado = $gestorCat->updateUsuarioAdmin($usuario, $conexPDO);

    //header("Location: ../controller/controller-manageUser.php");
} else {

    header("Location: ../controller/controller-manageUser.php");
}

?>
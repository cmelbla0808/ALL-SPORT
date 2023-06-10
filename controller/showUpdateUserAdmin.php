<?php

use \model\Utils;
use \model\Usuario;


require_once("../model/Utils.php");
require_once("../model/Usuario.php");

// Creamos un array para guardar los datos del piloto
$usuario = array();

if (isset($_POST["id"])) {

    $usuario["id"] = $_POST["id"];

    echo $usuario["id"];

    $gestorUsuario = new Usuario();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    $datosUsuario = $gestorUsuario->getUsuarioId($conexPDO, $usuario["id"]);


    include("../views/updateUserAdmin.php");

} else {
    header("Location: ../controller/controller-manageUser.php");
}

?>
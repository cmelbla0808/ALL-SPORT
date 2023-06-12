<?php

namespace controller;

session_start();
error_reporting(0);

use \model\Usuario;
use \model\Utils;

require_once("../model/Usuario.php");
require_once("../model/Utils.php");

// Creamos un array para guardar los datos del piloto
$usuario = array();


if (isset($_POST["password"]) && isset($_POST["passwordConfirm"]) && isset($_POST["email"])) {


    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    $gestorUsu = new Usuario();

    $resultadoUser = $gestorUsu->getUsuario($conexPDO, $_POST["email"]);
    
    //var_dump($resultadoUser);

    // Rellenamos los datos del piloto que le pasaremos a la vista
    $usuario["email"] = $_POST["email"];
    $usuario["password"] = $_POST["password"];
    $usuario["passwordConfirm"] = $_POST["passwordConfirm"];
    
    if ($usuario["password"] == $usuario["passwordConfirm"]) {

            $usuario['password'] = crypt($usuario["password"],'$6$rounds=5000$' . $resultadoUser['salt'].'$');
            $resultadoUser = $gestorUsu->updateUsuarioPasswordEmail($usuario, $conexPDO);

            header("Location: ../views/login.php");
    }


}

?>
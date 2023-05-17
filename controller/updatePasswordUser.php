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


if (isset($_POST["oldPassword"]) && isset($_POST["password"]) && isset($_POST["passwordConfirm"])) {


    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    $gestorUsu = new Usuario();

    $resultadoUser = $gestorUsu->getUsuario($conexPDO, $_SESSION['email'] );

    // Rellenamos los datos del piloto que le pasaremos a la vista
    $usuario['id'] = $_SESSION['id'];
    $usuario["email"] = $_SESSION['email'];
    $usuario["oldPassword"] = $_POST["oldPassword"];
    $usuario["password"] = $_POST["password"];
    $usuario["passwordConfirm"] = $_POST["passwordConfirm"];
    $usuario["apellido"] = $_POST["apellido"];

    $usuario["oldPassword"] = crypt($usuario["oldPassword"],'$6$rounds=5000$' . $resultadoUser['salt'].'$');

    if ($usuario["oldPassword"] == $resultadoUser['password']) {
        if($_POST["password"] == $_POST["passwordConfirm"]) {

            $usuario['password'] = crypt($usuario["password"],'$6$rounds=5000$' . $resultadoUser['salt'].'$');
            $resultadoUser = $gestorUsu->updateUsuarioPassword($usuario, $conexPDO);

            header("Location: ../views/settings.php");
            
        }else {
            echo "hola";
            include("The new password does not match");
        }

    } else {
        echo "adios";
        include("The old password does not match");
    }


} else {
    echo "Mision Fallida";

}

?>
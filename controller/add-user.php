<?php

namespace controller;

session_start();
error_reporting(0);

use \model\Usuario;
use \model\Utils;

// Añadimos el código del modelo
require_once("../model/Usuario.php");
require_once("../model/Utils.php");


if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["edad"]) && isset($_POST["admin"]) && isset($_POST["imagen"])) {
    
    // Creamos un array para guardar los datos del producto
    $usuario = array();

    // Rellenamos los datos del producto que le pasaremos a la vista
    $usuario["nombre"] = htmlspecialchars($_POST["nombre"]);
    $usuario["apellido"] = htmlspecialchars($_POST["apellido"]);
    $usuario["email"] = $_POST["email"];
    $usuario["password"] = $_POST["password"];
    $usuario["edad"] = strval($_POST["edad"]);
    $usuario["admin"] = strval($_POST["admin"]);
    $usuario["imagen"] = $_POST["imagen"];

     // Generamos una salt de 16 posiciones
     $salt = Utils::generar_salt(16);
     $usuario["salt"] = $salt;
     // Encriptamos el password del formulario con la funcion crypt utilizando la salt generada y SHA-512
     $usuario["password"] = crypt($_POST["password"], '$6$rounds=5000$' . $salt . '$');
     // Por defecto el usuario esta deshabilitado
     $usuario["activo"] = 1;
     // Generamos el codigo de activacion
     $usuario["codActivacion"] = Utils::generar_codigo_activacion();

     var_dump($usuario);

    $gestorUsu = new Usuario();

     // Nos conectamos a la Bd
     $conexPDO = Utils::conectar();

     // Añadimos el registro
     $resultado = $gestorUsu->addUsuario($usuario, $conexPDO);

    

    // Si ha ido bien el mensaje sera distint
    if ($resultado != null)
        $mensaje = "El Cliente se Inserto Correctamente";
    else
        $mensaje = "Ha habido un fallo al acceder a la Base de Datos\n salte por la ventana ya!";

    header("Location: ../controller/controller-manageUser.php");

} else {
    // Declaramos la accion para que el formulario sepa a que controlador llamar con los datos
    $accion = "insertar";

    // Sin datos del piloto cargados cargamos la vista
    header("Location: ../controller/controller-manageUser.php");

}

?>
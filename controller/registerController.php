<?php

namespace controller;

use \model\Usuario;
use \model\Utils;

// Añadimos el código del modelo
require_once("../model/Usuario.php");
require_once("../model/Utils.php");

/*
        Los datos que llegan de la vista registro por POST ya deberían de estar validados
        en javascript, forma email, contraseña correcta, contraseñas iguales, telefono etc
    */

// Si nos llegan datos de un cliente, implica que es el formulario el que llama al controlador
if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["edad"]) && isset($_POST["passwordConfirm"]) && isset($_POST["imagen"])) {


    if ($_POST["passwordConfirm"] == $_POST["password"]) {

        $usuario = array();

        $mensaje = null;

        // Limpiamos los datos de posibles caracteres o codigo malicioso
        // Segun los asignamos al array de datos del usuario a registrar
        $usuario["nombre"] = Utils::limpiar_datos($_POST["nombre"]);
        $usuario["apellido"] = Utils::limpiar_datos($_POST["apellido"]);
        $usuario["email"] = Utils::limpiar_datos($_POST["email"]);
        $usuario["edad"] = Utils::limpiar_datos($_POST["edad"]);
        $usuario["imagen"] = $_POST["imagen"];

        // Generamos una salt de 16 posiciones
        $salt = Utils::generar_salt(16);
        $usuario["salt"] = $salt;
        // Encriptamos el password del formulario con la funcion crypt utilizando la salt generada y SHA-512
        $usuario["password"] = crypt($_POST["password"], '$6$rounds=5000$' . $salt . '$');
        // Por defecto el usuario esta deshabilitado
        $usuario["activo"] = 0;
        $usuario["admin"] = 0;
        // Generamos el codigo de activacion
        $usuario["codActivacion"] = Utils::generar_codigo_activacion();

        $gestorUsu = new Usuario();

        // Nos conectamos a la Bd
        $conexPDO = Utils::conectar();

        // Añadimos el registro
        $resultado = $gestorUsu->addUsuario($usuario, $conexPDO);

        // Enviamos el correo con el codigo de verificacion
        Utils::correo_registro($usuario);

        // Si ha ido bien el mensaje sera distint
        if ($resultado != null)
            $mensaje = "El codigo de verificación ha sido enviado a su correo";
        else
            $mensaje = "No se ha podido enviar el correo de verificación!";


        //var_dump($datosClientes);
        include("../views/confirmUser.php");
    } else {
        include("../views/login.php");
    }
}
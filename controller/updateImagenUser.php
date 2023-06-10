<?php

use \model\Usuario;
use \model\Utils;
use \model\Producto;

// Creamos un array para guardar los datos del piloto
$usuario = array();


if (isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_POST["edad"]) && isset($_POST["admin"]) && isset($_FILES["imagen"])) {

    // Rellenamos los datos del piloto que le pasaremos a la vista
    $usuario["id"] = $_POST["id"];
    $usuario["nombre"] = $_POST["nombre"];
    $usuario["apellido"] = $_POST["apellido"];
    $usuario["email"] = $_POST["email"];
    $usuario["edad"] = strval(($_POST['edad']));
    $usuario["admin"] = $_POST["admin"];
    $usuario["imagen"] = $_FILES["imagen"]["name"];

    require_once("../model/Usuario.php");
    require_once("../model/Producto.php");
    require_once("../model/Utils.php");

    $gestorUsu = new Usuario();
    $gestorPro = new Producto();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Modificamos el registro
    $resultado = $gestorUsu->updateUsuarioImagen($usuario, $conexPDO);
    $ruta = '../images/'.$_FILES["imagen"]['name'];
    move_uploaded_file($_FILES["imagen"]['tmp_name'], $ruta);

    $resultado2 = $gestorPro->updateProductoImagen($usuario["id"], $usuario["imagen"], $conexPDO);

    session_start();
    session_destroy();
    session_start();

    $_SESSION['id'] = $usuario["id"];
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['apellido'] = $usuario['apellido'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['edad'] = $usuario['edad'];
    $_SESSION['admin'] = $usuario['admin'];
    $_SESSION['imagen'] = $usuario['imagen'];

    header("Location: ../views/settings.php");

} else {
    include("../views/settings.php");

    echo '<script language="javascript">alert("No se ha podido actualizar los datos");</script>';

}

?>
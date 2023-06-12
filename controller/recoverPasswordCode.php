<?php
    use \model\Utils;
    use \model\Usuario;

    require_once("../model/Utils.php");
    require_once("../model/Usuario.php");

    $conexPDO = Utils::conectar();

    // Recogemos los datos del formulario
    $email = $_POST['email'];
    $codigoComprobar = $_POST['codigo'];
    $codigo = $_POST['codActivacion'];

    // Nos conectamos a la Bd
    $gestorUsu = new Usuario();

    if ($codigoComprobar == $codigo) {
        include("../views/resetPassword.php");
    }else {
        echo "El codigo introducido no es valido";
    }
?>
<?php

    use \model\Usuario;
    use \model\Utils;

    // Añadimos el código del modelo
    require_once("../model/Usuario.php");
    require_once("../model/Utils.php");

    $gestorUsu = new Usuario();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Borramos el cliente
    if (isset($_POST["id"])) {
        // Borramos y guardamos el resultado
        $resultado = $gestorUsu->delUsuario($_POST["id"], $conexPDO);
    }

    header("Location: ../controller/controller-manageUser.php");

?>
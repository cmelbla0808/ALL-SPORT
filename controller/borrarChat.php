<?php

    use \model\Chat;
    use \model\Utils;

    // Añadimos el código del modelo
    require_once("../model/Chat.php");
    require_once("../model/Utils.php");

    $gestorChat = new Chat();
    $gestorMensageChat = new Chat();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Borramos el cliente
    if (isset($_GET["id"])) {
        // Borramos y guardamos el resultado
        $resultado = $gestorChat->delChat($_GET["id"], $conexPDO);
        $resultado2 = $gestorMensageChat->delMensageChat($_GET["id"], $conexPDO);
    }

    header("Location: ../controller/chatUser.php");

?>
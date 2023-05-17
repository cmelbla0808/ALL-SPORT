<?php

    use \model\Categoria;
    use \model\Utils;

    // Añadimos el código del modelo
    require_once("../model/Categoria.php");
    require_once("../model/Utils.php");

    $gestorCat = new Categoria();

    // Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    // Borramos el cliente
    if (isset($_POST["id"])) {
        // Borramos y guardamos el resultado
        $resultado = $gestorCat->delCategoria($_POST["id"], $conexPDO);
    }

    header("Location: ../controller/controller-manageCategories.php");

?>
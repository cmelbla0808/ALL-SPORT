<?php

namespace model;

require_once("Utils.php");

use \PDO;
use \PDOException;

class Chat {

    /**Funcion que nos devuelve todos los productos de un usuario */
    public function getAllMensageChat($conexPDO, $id)
    {

        if ($conexPDO != null) {
            try {
                //Primero introducimos la sentencia a ejecutar con prepare
                //Ponemos en lugar de valores directamente, interrogaciones
                $sentencia = $conexPDO->prepare("SELECT * FROM allsports.mensage where idChat=?");

                $sentencia->bindParam(1, $id);
                //Ejecutamos la sentencia
                $sentencia->execute();

                //Devolvemos los datos del cliente
                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    public function getOneChat($idChat, $conexPDO)
    {
        if (isset($idChat) && is_numeric($idChat)) {


            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT * FROM allsports.chat where id=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $idChat);
                    //Ejecutamos la sentencia
                    $sentencia->execute();

                    //Devolvemos los datos del cliente
                    return $sentencia->fetch();
                } catch (PDOException $e) {
                    print("Error al acceder a BD" . $e->getMessage());
                }
            }
        }
    }

    function getChatExist($conexPDO, $nombreProducto)
    {
        
        $results = '';
        if (isset($nombreProducto) && $conexPDO != null) {

            try {

                $sentencia = $conexPDO->prepare("SELECT * FROM allsports.chat where nombreProducto=?");

                $sentencia->bindParam(1, $nombreProducto);
                //$sentencia->bindParam(2, $password);
                //$sentencia->bindParam(2, $activo);

                $sentencia->execute();
                $results = $sentencia->fetch(PDO::FETCH_ASSOC);
            }catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $results;
    }

    public function getChatUser($conexPDO, $id)
    {

        if ($conexPDO != null) {
            try {
                //Primero introducimos la sentencia a ejecutar con prepare
                //Ponemos en lugar de valores directamente, interrogaciones
                $sentencia = $conexPDO->prepare("SELECT * FROM allsports.chat where idUsuario1=? or idUsuario2=?");

                $sentencia->bindParam(1, $id);
                $sentencia->bindParam(2, $id);
                //Ejecutamos la sentencia
                $sentencia->execute();

                //Devolvemos los datos del cliente
                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    function addMensage($mensage, $conexPDO)
    {

        $result = null;
        if (isset($mensage) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("INSERT INTO allsports.mensage (idUsuario, mensage, idChat) VALUES ( :idUsuario, :mensage, :idChat)");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":idUsuario", $mensage["idUsuario"]);
                $sentencia->bindParam(":mensage", $mensage["mensage"]);
                $sentencia->bindParam(":idChat", $mensage["idChat"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

    function addChat($chat, $conexPDO)
    {

        $result = null;
        if (isset($chat) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("INSERT INTO allsports.chat (nombreProducto, idUsuario1, idUsuario2, imagen, nombreVendedor) VALUES ( :nombreProducto, :idUsuario1, :idUsuario2, :imagen, :nombreVendedor)");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":nombreProducto", $chat["nombreProducto"]);
                $sentencia->bindParam(":idUsuario1", $chat["idUsuario1"]);
                $sentencia->bindParam(":idUsuario2", $chat["idUsuario2"]);
                $sentencia->bindParam(":imagen", $chat["imagen"]);
                $sentencia->bindParam(":nombreVendedor", $chat["nombreVendedor"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

    function delChat($idChat, $conexPDO)
    {
        $result = null;

        if (isset($idChat) && is_numeric($idChat)) {


            if ($conexPDO != null) {
                try {
                    //Borramos el cliente asociado a dicho id
                    $sentencia = $conexPDO->prepare("DELETE  FROM allsports.chat where id=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $idChat);
                    //Ejecutamos la sentencia
                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }
            }
        }

        return $result;
    }

    function delMensageChat($idChat, $conexPDO)
    {
        $result = null;

        if (isset($idChat) && is_numeric($idChat)) {


            if ($conexPDO != null) {
                try {
                    //Borramos el cliente asociado a dicho id
                    $sentencia = $conexPDO->prepare("DELETE  FROM allsports.mensage where idChat=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $idChat);
                    //Ejecutamos la sentencia
                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }
            }
        }

        return $result;
    }

    
}

?>
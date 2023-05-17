<?php

namespace model;

require_once("Utils.php");

use \PDO;
use \PDOException;

class Categoria {

    /**Funcion que nos devuelve todos los productos de un usuario */
    public function getAllProductoUser($conexPDO, $id)
    {

        if ($conexPDO != null) {
            try {
                //Primero introducimos la sentencia a ejecutar con prepare
                //Ponemos en lugar de valores directamente, interrogaciones
                $sentencia = $conexPDO->prepare("SELECT * FROM allsports.productos where usuarios_id=?");

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

    /**Funcion que nos devuelve todos los productos */
    public function getAllCategories($conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Primero introducimos la sentencia a ejecutar con prepare
                //Ponemos en lugar de valores directamente, interrogaciones
                $sentencia = $conexPDO->prepare("SELECT * FROM allsports.categorias");
                //Ejecutamos la sentencia
                $sentencia->execute();

                //Devolvemos los datos del cliente
                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    /**
     * Devuelve los productos asociados al id del producto introducido
     */
    public function getOneCategory($idCategoria, $conexPDO)
    {
        if (isset($idCategoria) && is_numeric($idCategoria)) {


            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT * FROM allsports.categorias where id=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $idCategoria);
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

    /**
     * Funcion que añade un nuevo producto
     **/
    function addCategoria($categoria, $conexPDO)
    {

        $result = null;
        if (isset($categoria) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("INSERT INTO allsports.categorias (nombre, descripcion, imagen) VALUES ( :nombre, :descripcion, :imagen)");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":nombre", $categoria["nombre"]);
                $sentencia->bindParam(":descripcion", $categoria["descripcion"]);
                $sentencia->bindParam(":imagen", $categoria["imagen"]);


                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

        /**
     * Funcion que elimina un piloto
     **/
    function delCategoria($idCategoria, $conexPDO)
    {
        $result = null;

        if (isset($idCategoria) && is_numeric($idCategoria)) {


            if ($conexPDO != null) {
                try {
                    //Borramos el cliente asociado a dicho id
                    $sentencia = $conexPDO->prepare("DELETE  FROM allsports.categorias where id=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $idCategoria);
                    //Ejecutamos la sentencia
                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }
            }
        }

        return $result;
    }

    function updateCategoria($categoria, $conexPDO)
    {


        $result = null;
        if (isset($categoria) && isset($categoria["nombre"]) && isset($categoria["descripcion"]) && isset($categoria["imagen"]) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("UPDATE allsports.categorias set nombre=:nombre, descripcion=:descripcion, imagen=:imagen where id=:id");

                //print($sentencia->queryString);

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":id", $categoria["id"]);
                $sentencia->bindParam(":nombre", $categoria["nombre"]);
                $sentencia->bindParam(":descripcion", $categoria["descripcion"]);
                $sentencia->bindParam(":imagen", $categoria["imagen"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

    
}

?>
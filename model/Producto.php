<?php

namespace model;

require_once("Utils.php");

use \PDO;
use \PDOException;

class Producto {

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
    public function getProducto($conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Primero introducimos la sentencia a ejecutar con prepare
                //Ponemos en lugar de valores directamente, interrogaciones
                $sentencia = $conexPDO->prepare("SELECT * FROM allsports.productos");
                //Ejecutamos la sentencia
                $sentencia->execute();

                //Devolvemos los datos del cliente
                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    public function getProductoCategoria($conexPDO, $idCategoria)
    {

        if ($conexPDO != null) {
            try {
                //Primero introducimos la sentencia a ejecutar con prepare
                //Ponemos en lugar de valores directamente, interrogaciones
                $sentencia = $conexPDO->prepare("SELECT * FROM allsports.productos where categoria_id=?");

                $sentencia->bindParam(1, $idCategoria);
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
    public function getOneProducto($idProducto, $conexPDO)
    {
        if (isset($idProducto) && is_numeric($idProducto)) {


            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT * FROM allsports.productos where id=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $idProducto);
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
    function addProducto($producto, $conexPDO)
    {

        $result = null;
        if (isset($producto) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("INSERT INTO allsports.productos (nombre, descripcion, precio, categoria_id, imagen, usuarios_id, name, lastName, imagenUser) VALUES ( :nombre, :descripcion, :precio, :categoria_id, :imagen, :usuarios_id, :name, :lastName, :imagenUser)");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":nombre", $producto["nombre"]);
                $sentencia->bindParam(":descripcion", $producto["descripcion"]);
                $sentencia->bindParam(":precio", $producto["precio"]);
                $sentencia->bindParam(":categoria_id", $producto["categoria_id"]);
                $sentencia->bindParam(":imagen", $producto["imagen"]);
                $sentencia->bindParam(":usuarios_id", $producto["usuarios_id"]);
                $sentencia->bindParam(":name", $producto["name"]);
                $sentencia->bindParam(":lastName", $producto["lastName"]);
                $sentencia->bindParam(":imagenUser", $producto["imagenUser"]);

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
    function delProducto($idProducto, $conexPDO)
    {
        $result = null;

        if (isset($idProducto) && is_numeric($idProducto)) {


            if ($conexPDO != null) {
                try {
                    //Borramos el cliente asociado a dicho id
                    $sentencia = $conexPDO->prepare("DELETE  FROM allsports.productos where id=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $idProducto);
                    //Ejecutamos la sentencia
                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }
            }
        }

        return $result;
    }

    function updateProducto($producto, $conexPDO)
    {

        $result = null;
        if (isset($producto) && isset($producto["nombre"]) && isset($producto["descripcion"]) && isset($producto["precio"]) && isset($producto["imagen"]) && isset($producto["categoria_id"]) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("UPDATE allsports.productos set nombre=:nombre, descripcion=:descripcion, precio=:precio, imagen=:imagen, categoria_id=:categoria_id where id=:id");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":id", $producto["id"]);
                $sentencia->bindParam(":nombre", $producto["nombre"]);
                $sentencia->bindParam(":descripcion", $producto["descripcion"]);
                $sentencia->bindParam(":precio", $producto["precio"]);
                $sentencia->bindParam(":imagen", $producto["imagen"]);
                $sentencia->bindParam(":categoria_id", $producto["categoria_id"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

    function updateProductoImagen($idUser,$imagenUser, $conexPDO)
    {

        $result = null;

        if (isset($idUser) && isset($imagenUser) && is_numeric($idUser)) {


            if ($conexPDO != null) {
                try {
                    //Borramos el cliente asociado a dicho id
                    $sentencia = $conexPDO->prepare("UPDATE allsports.productos SET imagenUser=:imagenUser WHERE usuarios_id=:usuarios_id");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(':imagenUser', $imagenUser);
                    $sentencia->bindParam(':usuarios_id', $idUser);
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
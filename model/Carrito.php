<?php

namespace model;

require_once("Utils.php");

use \PDO;
use \PDOException;

class Carrito {

    function addProductoCarrito($producto, $conexPDO)
    {

        $result = null;
        if (isset($producto) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("INSERT INTO allsports.carrito (nombre, precio, imagen, usuarios_id, idProducto) VALUES ( :nombre, :precio, :imagen, :usuarios_id, :idProducto)");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":nombre", $producto["nombre"]);
                $sentencia->bindParam(":precio", $producto["precio"]);
                $sentencia->bindParam(":imagen", $producto["imagen"]);
                $sentencia->bindParam(":usuarios_id", $producto["usuarios_id"]);
                $sentencia->bindParam(":idProducto", $producto["idProducto"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

        /**Funcion que nos devuelve todos los productos de un usuario */
        public function getAllCarritoUser($conexPDO, $id)
        {
    
            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT * FROM allsports.carrito where usuarios_id=?");
    
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

        function delProducto($idProducto, $conexPDO)
        {
            $result = null;
    
            if (isset($idProducto) && is_numeric($idProducto)) {
    
    
                if ($conexPDO != null) {
                    try {
                        //Borramos el cliente asociado a dicho id
                        $sentencia = $conexPDO->prepare("DELETE  FROM allsports.carrito where id=?");
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

    



    
}

?>
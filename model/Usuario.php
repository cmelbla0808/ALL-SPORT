<?php

namespace model;

require_once("Utils.php");

use \PDO;
use \PDOException;

class Usuario
{

    function addUsuario($usuario, $conexPDO)
    {

        $result = null;
        if (isset($usuario) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("INSERT INTO allsports.usuarios (nombre, apellido, email, password, edad, admin, codActivacion, salt, activo, imagen) VALUES ( :nombre, :apellido, :email,:password,:edad,:admin,:codActivacion,:salt,:activo,:imagen)");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":nombre", $usuario["nombre"]);
                $sentencia->bindParam(":apellido", $usuario["apellido"]);
                $sentencia->bindParam(":email", $usuario["email"]);
                $sentencia->bindParam(":password", $usuario["password"]);
                $sentencia->bindParam(":edad", $usuario["edad"]);
                $sentencia->bindParam(":admin", $usuario["admin"]);
                $sentencia->bindParam(":codActivacion", $usuario["codActivacion"]);
                $sentencia->bindParam(":salt", $usuario["salt"]);
                $sentencia->bindParam(":activo", $usuario["activo"]);
                $sentencia->bindParam(":imagen", $usuario["imagen"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

    /**
     * Funcion que elimina un usuario
     **/
    function delUsuario($idUsuario, $conexPDO)
    {
        $result = null;

        if (isset($idUsuario) && is_numeric($idUsuario)) {


            if ($conexPDO != null) {
                try {
                    //Borramos el cliente asociado a dicho id
                    $sentencia = $conexPDO->prepare("DELETE  FROM allsports.usuarios where id=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $idUsuario);
                    //Ejecutamos la sentencia
                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }
            }
        }

        return $result;
    }

    /**
     * Devuelve el usuario asociado al Email introducido
     */
    function getAllUsuario($conexPDO)
    {
    
        if ($conexPDO != null) {
            try {
                //Primero introducimos la sentencia a ejecutar con prepare
                //Ponemos en lugar de valores directamente, interrogaciones
                $sentencia = $conexPDO->prepare("SELECT * FROM allsports.usuarios");
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
     * Devuelve el usuario asociado al Email introducido
     */
    function getUsuario($conexPDO, $email)
    {
        
        $results = '';
        if (isset($email) && $conexPDO != null) {

            try {

                $sentencia = $conexPDO->prepare("SELECT * FROM usuarios where email=?");

                $sentencia->bindParam(1, $email);
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

        /**
     * Devuelve el usuario asociado al Email introducido
     */
    function getUsuarioId($conexPDO, $id)
    {
        
        $results = '';
        if (isset($id) && $conexPDO != null) {

            try {

                $sentencia = $conexPDO->prepare("SELECT * FROM usuarios where id=?");

                $sentencia->bindParam(1, $id);
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

    function updateUsuario($usuario, $conexPDO)
    {


        $result = null;
        if (isset($usuario) && isset($usuario["nombre"]) && isset($usuario["apellido"]) && isset($usuario["email"]) && isset($usuario["edad"])  && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("UPDATE allsports.usuarios set nombre=:nombre, apellido=:apellido, email=:email, edad=:edad where id=:id");

                //print($sentencia->queryString);

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":id", $usuario["id"]);
                $sentencia->bindParam(":nombre", $usuario["nombre"]);
                $sentencia->bindParam(":apellido", $usuario["apellido"]);
                $sentencia->bindParam(":email", $usuario["email"]);
                $sentencia->bindParam(":edad", $usuario["edad"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

    function updateUsuarioAdmin($usuario, $conexPDO)
    {


        $result = null;
        if (isset($usuario) && isset($usuario["nombre"]) && isset($usuario["apellido"]) && isset($usuario["email"]) && isset($usuario["edad"]) && isset($usuario["admin"])  && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("UPDATE allsports.usuarios set nombre=:nombre, apellido=:apellido, email=:email, edad=:edad, admin=:admin where id=:id");

                //print($sentencia->queryString);

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":id", $usuario["id"]);
                $sentencia->bindParam(":nombre", $usuario["nombre"]);
                $sentencia->bindParam(":apellido", $usuario["apellido"]);
                $sentencia->bindParam(":email", $usuario["email"]);
                $sentencia->bindParam(":edad", $usuario["edad"]);
                $sentencia->bindParam(":admin", $usuario["admin"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

    function updateUsuarioImagen($usuario, $conexPDO)
    {


        $result = null;
        if (isset($usuario) && isset($usuario["imagen"]) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("UPDATE allsports.usuarios set imagen=:imagen where id=:id");

                //print($sentencia->queryString);

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":id", $usuario["id"]);
                $sentencia->bindParam(":imagen", $usuario["imagen"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

    function updateUsuarioPassword($usuario, $conexPDO)
    {

        $result = null;
        if (isset($usuario) && isset($usuario["password"]) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("UPDATE allsports.usuarios set password=:password where id=:id");

                //print($sentencia->queryString);

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":id", $usuario["id"]);
                $sentencia->bindParam(":password", $usuario["password"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

    function verificarUsuario($conexPDO, $email, $codigo)
    {
        
        $results = '';
        if (isset($email) && isset($codigo) && $conexPDO != null) {

            try {

                $sentencia = $conexPDO->prepare("SELECT * FROM usuarios where email=? and codActivacion=?");

                $sentencia->bindParam(1, $email);
                $sentencia->bindParam(2, $codigo);
                //$sentencia->bindParam(2, $password);
                //$sentencia->bindParam(2, $activo);

                $results = $sentencia->execute();
            }catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $results;

    }

    function codeUsuario($email, $conexPDO)
    {

        $result = null;
        if (isset($email) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("UPDATE allsports.usuarios set Activo='1' where email=:email");

                //print($sentencia->queryString);

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":email", $email);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

}
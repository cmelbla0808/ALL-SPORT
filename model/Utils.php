<?php

namespace model;

use \PDO;
use \PDOException;

class Utils {

    /**
     * Funcion que se conecta a la BD y nos devuelve una conexion PDO activa
     */
    public static function conectar()
    {

        $conPDO = null;

        try {

            require_once("../global.php");
            $conPDO = new PDO("mysql:host=" . $DB_SERVER . ";dbname=" . $DB_SCHEMA, $DB_USER, $DB_PASSWD);
            return $conPDO;
        } catch (PDOException $e) {
            print "¡Error al conectar!: " . $e->getMessage() . "<br/>";
            return $conPDO;
            die();
        }
    }

        /**
     * Limpiamos el contenido de las variables
     */
    public static function limpiar_datos($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }


    /**
     * Funcion que genera una cadena aleatoria
     */
    public static function generar_salt($tam)
    {

        // Definimos un array de caracteres
        $letras = "abcdefghijklmnopqrstuvwxyz1234567890*-.,";

        $salt="";
        // Vamos añadiendo $tam caracteres aleatorios a la salt
        for ($i=0;$i<$tam;$i++)
        {
            $salt.=$letras[rand(0,strlen($letras)-1)];
        } 

        // Devolvemos la salt
        return $salt;

    }

    // La funcion genera un codigo número de 4 digitos aleatorio
    public static function generar_codigo_activacion()
    {
        return rand(1111,9999);
    }

    
    // Funcion que envia el correo de registro
    public static function correo_registro($usuario)
    {
        $to = $usuario["email"];
        $subject = "Confirma tu Cuenta";
        
        $message = "<h1>Bienvenido a ALL SPORTS! " . $usuario["nombre"] . "</h1>";
        $message .= "<h3>Por favor confirma tu email</h3>";
        $message .= "<p>Tu codigo de verificacion es = " . "<b>" . $usuario["codActivacion"] . "</b>" . "</p>";
        
        $header = "From:cmelero0808@gmail.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        
        $retval = mail ($to,$subject,$message,$header);

        if( $retval == true ) {
            echo '<script language="javascript">alert("Mensaje enviado con éxito...");</script>';
        }else {
            echo '<script language="javascript">alert("No se pudo enviar el mensaje...");</script>';
        }
    }
}

?>
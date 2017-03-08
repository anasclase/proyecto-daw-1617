<?php

namespace Controlador\Login;


use Modelo\Base;
use Modelo\BD\TrabajadorBD;

require_once __DIR__.'/../../Modelo/Base/LoginClass.php';

class Controlador {

    public static function validarLogin($post){

        //Convertimos el JSON en un array asociativo y creamos un objeto 'Login' con los datos que traemos del post. El JSON que debe recibir de JavaScript se tiene que llamar 'login'.
        $loginjson = json_decode($post['login'], true);
        $login = new Base\Login(null,$loginjson['password']);

        //Validamos que el usuario y contraseña introducidos son correctos y en función de la respuesta obtenida de la query (true o false)
        //ejecutaremos unas líneas de código u otras.
        if ($login->validar($loginjson['dni'])){
            $_SESSION['login'] = serialize($login);
            self::getTrabajadorByDni($loginjson['dni']);
            return true;
        }
        else {
            return false;
        }
    }

    public static function getTrabajadorByDni($dni){

        //Obtenemos el trabajador mediante su dni y lo guardamos en SESSION.
        $trabajador = TrabajadorBD::getTrabajadorByDni($dni);
        $_SESSION['trabajador'] = serialize($trabajador);

        //Añadimos el trabajador al login.
        $login = unserialize($_SESSION['login']);
        $login->setTrabajador($trabajador);
        $_SESSION['login'] = serialize($login);

    }

    //El $_POST del formulario que nos tiene que llegar, los campos deben ser: 'oldpassword', 'newpassword'
    // (Hay que validar en JavaScript que la nueva contraseña introducida dos veces es la misma).
    public static function changePassword($post){

        $passwordjson = json_decode($post['password'], true);

        $login = unserialize($_SESSION['login']);

        if ($passwordjson['oldpassword'] == $login->getPassword()) {
            $login->setPassword($passwordjson['newpassword']);
            $_SESSION['login'] = serialize($login);
            return $login->changePassword();
            }

    }

}

?>
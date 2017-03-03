<?php

namespace Modelo\BD;

require_once __DIR__.'/GenericoBD.php';

use Modelo\Base\Trabajador;
use Modelo\BD\GenericoBD;


abstract class LoginBD extends genericoBD
{
    private static $tabla = "login";

    public static function validarLogin($login, $dni){

        $conexion = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE dniTrabajador = '".$dni."' AND password = '".$login->getPassword()."'";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        parent::desconectar($conexion);

        if (mysqli_num_rows($rs) > 0)
            return true;
        else
            return false;

    }

    public static function changePassword($login){

        $con = parent::conectar();

        $query = "UPDATE ".self::$tabla." SET password = '".$login->getPassword()."' WHERE dniTrabajador = '".$login->getTrabajador()->getDni()."'";

        $rs = mysqli_query($con, $query) or die(mysqli_error($con));

        parent::desconectar($con);

        if ($rs){
            return true;
        }
        else {
            return false;
        }

    }

    public static function changePasswordByDni($datos){

        $con = parent::conectar();

        $query = "UPDATE ".self::$tabla." SET password = '".$datos['password']."' WHERE dniTrabajador = '".$datos['trabajador']."'";

        mysqli_query($con, $query) or die(mysqli_error($con));

        parent::desconectar($con);
    }

    public static function add($login){

        $con = parent::conectar();

        $query = "INSERT INTO  ".self::$tabla."(dniTrabajador, password) VALUES('".$login->getTrabajador()."', '".$login->getPassword."')";

        $rs = mysqli_query($con, $query) or die(mysqli_error($con));

        parent::desconectar($con);

        if ($rs){
            return true;
        }
        else {
            return false;
        }

    }

    public static function deleteLoginByDni($dni){

        $con = parent::conectar();

        $query = "DELETE FROM " . self::$tabla . " WHERE dniTrabajador='".$dni."'";

        mysqli_query($con, $query) or die(mysqli_error($con));

        parent::desconectar($con);

    }

}
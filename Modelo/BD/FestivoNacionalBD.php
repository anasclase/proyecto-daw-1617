<?php
/**
 * Created by PhpStorm.
 * User: virux
 * Date: 07/03/2017
 * Time: 10:41
 */

namespace Modelo\BD;
require_once __DIR__."/GenericoBD.php";

abstract class FestivoNacionalBD extends GenericoBD{

    public static function insertarFestivos($festivos){

        $con = parent::conectar();

        $query = "INSERT INTO festivosnacional(fecha,motivo,calendario_id) VALUES ('".$festivos->getFecha()."','".$festivos->getMotivo()."','".$festivos->getCalendario()."')";

        $rs = mysqli_query($con, $query) or die(mysqli_error($con));

        if(mysqli_affected_rows($con) == 1){
            return true;
        }else{
            return false;
        }


    }

}
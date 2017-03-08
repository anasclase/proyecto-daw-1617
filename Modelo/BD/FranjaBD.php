<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 12:14
 */

namespace Modelo\BD;

use Modelo\BD;
require_once __DIR__."/GenericoBD.php";

abstract class FranjaBD extends GenericoBD{

    private static $tabla = "franjas";

    public static function getFranjaByHorarioFranja($horariosFranja){

        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= (SELECT idFranja FROM horariosfranja WHERE id=".$horariosFranja->getId().")";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"Franja");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function getFranjaById($id){
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= ".$id." ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"Franja");
        parent::desconectar($conexion);
        return $respuesta;
    }
    public static function insert($franja){

        $conexion = GenericoBD::conectar();

        $insert = "INSERT INTO ".self::$tabla." VALUES (null,'".$franja->getHoraInicio()."','".$franja->getHoraFin()."','".$franja->getTipoFranja()->getId()."'".";)";

        mysqli_query($conexion,$insert) or die("Error InsertFranja");

        GenericoBD::desconectar($conexion);

    }

    public static function update($franja){
        $conexion = GenericoBD::conectar();

        $update = "UPDATE ".self::$tabla." SET horaInicio='".$franja->getHoraInicio()."', horaFin='".$franja->getHoraFin()."', idTipoFranja='".$franja->getTipoFranja()->getId()."' WHERE id = '".$franja->getId()."';";
        mysqli_query($conexion,$update) or die("Error UpdateFranja");

        GenericoBD::desconectar($conexion);
    }

    public static function delete($franja){
        $conexion = GenericoBD::conectar();

        $delete = "DELETE FROM ".self::$tabla." WHERE id = '".$franja->getId()."';";

        mysqli_query($conexion,$delete) or die("Error DeleteFranja");

        GenericoBD::desconectar($conexion);
    }

    public static function getAll()
    {
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla;
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapearArray($rs,"Franja");
        parent::desconectar($conexion);
        return $respuesta;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 12:28
 */
namespace Modelo\BD;

use Modelo\Base;
require_once __DIR__."/GenericoBD.php";

abstract class HorarioFranjaBD extends GenericoBD{

    private static $tabla = "horariosfranja";

    public static function getHorariosFranjaByHorario($horario){
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE idHorario =".$horario->getId();
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapearArray($rs,"HorariosFranja");
        parent::desconectar($conexion);
        return $respuesta;
    }
    public static function getHorariosFranjaById($id){
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= ".$id." ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"HorarioFranja");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function save($horarioFranja){

        $conexion = GenericoBD::conectar();

        $insert = "INSERT INTO ".self::$tabla." VALUES (null,'".$horarioFranja->getHorario()->getId()."','".$horarioFranja->getFranja()->getId()."');";

        mysqli_query($conexion,$insert) or die("Error InsertHorarioFranja");

        GenericoBD::desconectar($conexion);

    }

    public static function update($horarioFranja){

        $conexion = GenericoBD::conectar();

        $update = "UPDATE ".self::$tabla." SET idHorario='".$horarioFranja->getHorario()->getId()."', idFranja='".$horarioFranja->getFranja()->getId()."';";

        mysqli_query($conexion,$update) or die("Error UpdatHorarioFranja");

        GenericoBD::desconectar($conexion);

    }

    public static function delete($horarioFranja){

        $conexion = GenericoBD::conectar();

        $delete = "DELETE FROM ".self::$tabla." WHERE id = '".$horarioFranja->getId()."';";

        mysqli_query($conexion,$delete) or die("Error DeleteHorarioFranja");

        GenericoBD::desconectar($conexion);

    }

    public static function getAll(){
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla;
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapearArray($rs,"HorariosFranja");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function add($horarioFranja){
        $conexion=parent::conectar();
        $query="INSERT INTO ".self::$tabla."  VALUES (null,'".$horarioFranja->getHorario()->getId()."', '".$horarioFranja->getFranja()->getId()."')";
        mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        parent::desconectar($conexion);

}

}
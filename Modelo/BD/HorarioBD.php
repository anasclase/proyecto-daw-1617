<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 12:36
 */

namespace Modelo\BD;

use Modelo\Base;

abstract class HorarioBD extends GenericoBD{

    private static $tabla = "horarios";

    public static function getHorarioByHorarioTrabajador($horarioTrabajador){

        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= (SELECT idHorario FROM horariotrabajadores WHERE id=".$horarioTrabajador->getId().")";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"Horario");
        parent::desconectar($conexion);
        return $respuesta;

    }


    public static function getHorarioById($horarioId){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id = ".$horarioId;

        $rs = mysqli_query($con, $query) or die("Error getHorarioById");

        $horario = parent::mapear($rs, "Horario");

        parent::desconectar($con);

        return $horario;

    }
    public static function insert($horario){

        $conexion = GenericoBD::conectar();

        $insert = "INSERT INTO ".self::$tabla." VALUES (null,'".$horario->getTipo()."'".";)";

        mysqli_query($conexion,$insert) or die("Error InsertHorarios");

        GenericoBD::desconectar($conexion);

    }

    public static function update($horario){
        $conexion = GenericoBD::conectar();

        $update = "UPDATE ".self::$tabla." SET tipo='".$horario->getTipo()."' WHERE id = '".$horario->getId()."';";
        mysqli_query($conexion,$update) or die("Error UpdateHorarios");

        GenericoBD::desconectar($conexion);
    }

    public static function delete($id){
        $conexion = GenericoBD::conectar();

        $delete = "DELETE FROM ".self::$tabla." WHERE id = ".$id;


        mysqli_query($conexion,$delete) or die("Error DeleteHorarios");

        GenericoBD::desconectar($conexion);
    }

    public static function add($horario){

        $conexion = GenericoBD::conectar();

        $query= "INSERT INTO ".self::$tabla." VALUES (null,'".$horario->getTipo()."')";

        mysqli_query($conexion,$query) or die($conexion);

        return mysqli_insert_id($conexion);

    }

    public static function getAll(){
        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla;

        $rs = mysqli_query($con, $query) or die("Error getHorarioById");

        $horario = parent::mapearArray($rs, "Horario");

        parent::desconectar($con);

        return $horario;
    }

}
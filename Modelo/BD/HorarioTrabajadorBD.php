<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 12:42
 */

namespace Modelo\BD;

use Modelo\Base;
require_once __DIR__."/GenericoBD.php";

abstract class HorarioTrabajadorBD extends GenericoBD{

    private static $tabla="horariotrabajadores";

    public static function getHorarioTrabajadorByTrabajador($trabajador){

        $conexion=parent::conectar();
        var_dump($trabajador);die();
        $query="SELECT * FROM ".self::$tabla." WHERE dniTrabajador='".$trabajador->getDni()."'";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"HorarioTrabajador");
        parent::desconectar($conexion);
        return $respuesta;

    }

    public static function getHorarioTrabajadorByTrabajadorBySemana($trabajador,$semana){

        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE dniTrabajador='".$trabajador->getDni()."' and numeroSemana=".$semana;
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"HorarioTrabajador");
        parent::desconectar($conexion);
        return $respuesta;

    }


    public static function getHorarioTrabajadorById($trabajadorId){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id = ".$trabajadorId;

        $rs = mysqli_query($con, $query) or die("Error getCentrosByEmpresa");

        $horarioTrabajador = parent::mapear($rs, "HorarioTrabajador");

        parent::desconectar($con);

        return $horarioTrabajador;

    }

    public static function add($horarioTrabajador){

        $con = parent::conectar();

        $query = "INSERT INTO ".self::$tabla." VALUES(null,'".$horarioTrabajador->getTrabajador()->getDni()."','".$horarioTrabajador->getHorario()->getId()."','".$horarioTrabajador->getNumeroSemana()."')";

        mysqli_query($con, $query) or die("Error addCentro");

        parent::desconectar($con);
    }
    public static function getAll($trabajador = null){
        $con = parent::conectar();

        if (is_null($trabajador))
        {
            $query = "SELECT * FROM ".self::$tabla." ORDER BY dniTrabajador,numeroSemana";
        }
        else
        {
            $query = "SELECT * FROM ".self::$tabla." where dniTrabajador='".$trabajador->getDni()."' ORDER BY numeroSemana";
        }

        $rs = mysqli_query($con, $query) or die("Error getCentrosByEmpresa");

        $horarioTrabajador = parent::mapearArray($rs, "HorarioTrabajador");

        parent::desconectar($con);

        return $horarioTrabajador;
    }


    public static function delete($id){
        $con = parent::conectar();

        $query = "DELETE FROM ".self::$tabla." WHERE id= ".$id.";";
        var_dump($query);

        mysqli_query($con, $query) or die("Error delete horarioTrabajador");

        parent::desconectar($con);

    }
	public static function updateHorarioTrabajador($horario, $dni, $semana){
		
		$con= parent::conectar();
		$semana=$semana-1;
		$update= "UPDATE horariotrabajadores SET idHorario = '".$horario."' WHERE dniTrabajador='".$dni."' AND numeroSemana='".$semana."'";
		
		mysqli_query($con, $update) or die ("Error updateHT");
		
		parent::desconectar($con);
		
	}
}
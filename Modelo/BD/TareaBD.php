<?php
namespace Modelo\BD;
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 28/02/2016
 * Time: 20:05
 */

require_once __DIR__."/GenericoBD.php";

abstract class TareaBD extends GenericoBD
{
    private static $table = "tareas";

    public static function getTareaById($id){
        $conexion = parent::conectar();

        $query = 'SELECT * FROM '.self::$table.' WHERE id = '.$id;

        $rs = mysqli_query($conexion,$query)or die("ErrorGetTareaById - ".mysqli_error($conexion));

        $tarea = parent::mapear($rs,"Tarea");

        parent::desconectar($conexion);

        return $tarea;

    }

    public static function getTareaByTipo($tipo){

        $tareas = null;

        $conexion = parent::conectar();

        $query = "Select * from ".self::$table." where idTipoTarea = '".$tipo->getId()."';";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        $tareas = parent::mapearArray($rs, "Tarea");

        parent::desconectar($conexion);

        return $tareas;


    }
    public static function insert($Tarea){

        $conexion = GenericoBD::conectar();

        $insert = "INSERT INTO ".self::$tabla." VALUES (null,'".$Tarea->getDescripcion()."','".$Tarea->getTipo()->getId()."'".";)";

        mysqli_query($conexion,$insert) or die("Error InsertTarea");

        GenericoBD::desconectar($conexion);

    }

    public static function update($Tarea){
        $conexion = GenericoBD::conectar();

        $update = "UPDATE ".self::$tabla." SET descripcion='".$Tarea->getDescripcion()."', idTipoTarea='".$Tarea->getTipo()->getId()."' WHERE id = '".$Tarea->getId()."';";
        mysqli_query($conexion,$update) or die("Error UpdateTarea");

        GenericoBD::desconectar($conexion);
    }

    public static function delete($Tarea){
        $conexion = GenericoBD::conectar();

        $delete = "DELETE FROM ".self::$tabla." WHERE id = '".$Tarea->getId()."';";

        mysqli_query($conexion,$delete) or die("Error DeleteTarea");

        GenericoBD::desconectar($conexion);
    }
    public static function getTareaByTareaParte($tareParte){

        $con = parent::conectar();
        $query=" SELECT * FROM ".self::$table." WHERE id = (SELECT idTareas FROM partesproducciontareas WHERE id=".$tareParte->getId().")";
        $rs=mysqli_query($con,$query) or die(mysqli_error($con));
        $respuetsa=parent::mapear($rs,"Tarea");

        parent::desconectar($con);
        return $respuetsa;

    }








}
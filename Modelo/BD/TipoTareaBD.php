<?php
namespace Modelo\BD;
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 28/02/2016
 * Time: 20:16
 */
require_once __DIR__."/GenericoBD.php";
require_once __DIR__."/../Base/TareaClass.php";
abstract class TipoTareaBD extends GenericoBD
{
    private static $tabla = "tipostarea";

    public static function getAll(){
        $conn = parent::conectar();

        $query = "select * from " . self::$tabla;

        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $respuesta = parent::mapearArray($rs, "TipoTarea");

        parent::desconectar($conn);

        return $respuesta;
    }

    public static function getTipoByTarea($tarea){

        $conexion = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id = (SELECT idTipoTarea FROM tareas WHERE id = '".$tarea->getId()."');";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        $tipo= parent::mapear($rs, "TipoTarea");

        return $tipo;

    }
    public static function insert($tipoTarea){

        $conexion = GenericoBD::conectar();

        $insert = "INSERT INTO ".self::$tabla." VALUES (null,'".$tipoTarea->getDescripcion()."'".";)";

        mysqli_query($conexion,$insert) or die("Error InsertTipoTarea");

        GenericoBD::desconectar($conexion);

    }

    public static function update($tipoTarea){
        $conexion = GenericoBD::conectar();

        $update = "UPDATE ".self::$tabla." SET descripcion='".$tipoTarea->getDescripcion()."' WHERE id = '".$tipoTarea->getId()."';";
        mysqli_query($conexion,$update) or die("Error UpdateTipoTarea");

        GenericoBD::desconectar($conexion);
    }

    public static function delete($tipoTarea){
        $conexion = GenericoBD::conectar();

        $delete = "DELETE FROM ".self::$tabla." WHERE id = '".$tipoTarea->getId()."';";

        mysqli_query($conexion,$delete) or die("Error DeleteTipoTarea");

        GenericoBD::desconectar($conexion);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: alain
 * Date: 27/02/2016
 * Time: 14:55
 */
namespace Modelo\BD;

require_once __DIR__ .'/GenericoBD.php';

abstract class EstadoBD extends GenericoBD{

    private static $tabla="estados";

    public static function selectEstadoById($id){
        //funciona
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= ".$id." ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"Estado");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function selectEstdadoByTipo($tipo){
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE LOWER(tipo) = '".strtolower($tipo)."';";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"Estado");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function  selectEstadoByParteLogistica($partelogistica){

        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= (SELECT idEstado FROM parteslogistica WHERE id=".$partelogistica->getId().") ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"Estado");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function  selectEstadoByParteProduccion($parteProduccion){

        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id = (SELECT idEstado FROM partesproduccion WHERE id=".$parteProduccion->getId()."); ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"Estado");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function add($estado){

        $con = parent::conectar();

        $query = "INSERT INTO ".self::$tabla." VALUES (null,'".$estado->getTipo()."')";

        mysqli_query($con, $query) or die("Error addEstado");

        parent::desconectar($con);

    }

    public static function delete($id){
        $con = parent::conectar();

        $query = "DELETE FROM " . self::$tabla . " WHERE id=". $id;

        mysqli_query($con, $query) or die(mysqli_error($con));

        parent::desconectar($con);
    }

    public static function getAll(){
        //funciona
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla;
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapearArray($rs,"Estado");
        parent::desconectar($conexion);
        return $respuesta;
    }


}
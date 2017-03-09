<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 11:59
 */



namespace Modelo\BD;
use Modelo\Base\TiposFranjas;
require_once __DIR__."/GenericoBD.php";

abstract class TipoFranjaBD extends GenericoBD{

    private static $tabla = "tipos";

    public static function getTipoFranjaByFranja($franja){
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= ".$franja->getId()." ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"TiposFranjas");
        parent::desconectar($conexion);
        return $respuesta;
    }
    public static function getTipoFranjaById($tipoFranjaId){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id = ".$tipoFranjaId;

        $rs = mysqli_query($con, $query) or die(mysqli_error($con));

        $fila = mysqli_fetch_assoc($rs);

        $tipoFranja = new TiposFranjas($fila['id'], $fila['tipo'], $fila['precio']);

        parent::desconectar($con);

        return $tipoFranja;

    }

    public static function insert($tipoFranja){

        $conexion = parent::conectar();

        $insert = "INSERT INTO ".self::$tabla." VALUES (null,".$tipoFranja->getPrecio().",'".$tipoFranja->getTipo()."')";

        mysqli_query($conexion,$insert) or die("Error InsertTipoFranja");

        parent::desconectar($conexion);

    }

    public static function update($tipo){

        $conexion = parent::conectar();

        $query = "UPDATE ".self::$tabla." SET precio=".$tipo->getPrecio()." WHERE id =".$tipo->getId();

        mysqli_query($conexion,$query) or die("Error UpdateTipoFranja");

        parent::desconectar($conexion);

    }

    public static function delete($tipoId){

        $conexion = parent::conectar();

        $query = "DELETE FROM ".self::$tabla." WHERE id = ".$tipoId;

        mysqli_query($conexion,$query) or die("Error DeleteTipoFranja");

        parent::desconectar($conexion);
    }

    public static function getAll(){

        $conexion = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla;

        $rs = mysqli_query($conexion,$query) or die("Error getAllTiposFranja");

        $tiposFranjas = parent::mapearArray($rs,"TiposFranja");

        parent::desconectar($conexion);

        return $tiposFranjas;

    }

}
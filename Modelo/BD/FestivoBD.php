<?php

namespace Modelo\BD;

require_once __DIR__."/GenericoBD.php";

abstract class FestivoBD extends GenericoBD
{

    private static $tabla = "festivos";

    public static function getAll(){

        $conexion = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla;

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        $festivos = parent::mapearArray($rs, "Festivo");

        parent::desconectar($conexion);

        return $festivos;

    }

    public static function delete($festivoId){

        $conexion = parent::conectar();

        $query = "DELETE FROM ".self::$tabla." WHERE id = ".$festivoId;


        mysqli_query($conexion, $query) or die("Delete festivo");

        parent::desconectar($conexion);

    }

    public static function add($festivo){

        $conexion = parent::conectar();

        $query = "INSERT INTO ".self::$tabla." VALUES(null,'".$festivo->getFecha()."','".$festivo->getMotivo()."')";

        mysqli_query($conexion, $query) or die("error add festivo");

        parent::desconectar($conexion);

    }

}
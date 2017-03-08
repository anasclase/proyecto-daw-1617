<?php

namespace Modelo\BD;

require_once __DIR__."/GenericoBD.php";

abstract class AusenciaBD extends GenericoBD
{
    private static $tabla="ausencias";

    public static function getAll(){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla;

        $rs = mysqli_query($con, $query) or die(mysqli_error($con));

        $centros = parent::mapearArray($rs, "Ausencia");

        parent::desconectar($con);

        return $centros;

    }

    public static function getAusenciaById($id){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id = ".$id;

        $rs = mysqli_query($con, $query) or die(mysqli_error($con));

        $centros = parent::mapear($rs, "Ausencia");

        parent::desconectar($con);

        return $centros;
    }
}
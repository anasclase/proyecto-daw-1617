<?php

namespace Modelo\BD;


require_once __DIR__."/GenericoBD.php";

abstract class VehiculoBD extends GenericoBD{

    private static $tabla = "vehiculos";

    public static function getVehiculosByCentro($centro){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE idCentro = ".$centro->getId();

        $rs = mysqli_query($con, $query) or die("Error getVehiculosByCentro");

        $vehiculos = parent::mapearArray($rs, "Vehiculo");

        parent::desconectar($con);

        return $vehiculos;

    }
    public static function getVehiculosById($vehiculoId){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id = ".$vehiculoId;

        $rs = mysqli_query($con, $query) or die("Error getVehiculosByCentro");

        $vehiculos = parent::mapear($rs, "Vehiculo");

        parent::desconectar($con);

        return $vehiculos;

    }

    public static function getVehiculoByMatricula($matricula){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE matricula= ".$matricula;

        $rs = mysqli_query($con, $query) or die("Error getVehiculosByMatricula");

        $vehiculos = parent::mapear($rs, "Vehiculo");

        parent::desconectar($con);

        return $vehiculos;

    }

    public static function getVehiculoByViaje($viaje){
        $con = parent::conectar();
        $query = "SELECT * FROM ".self::$tabla." WHERE id=(SELECT idVehiculo FROM viajes WHERE id=".$viaje->getId().")";
        $rs = mysqli_query($con, $query) or die("Error getVehiculosByCentro");
        $vehiculos = parent::mapear($rs, "Vehiculo");
        parent::desconectar($con);
        return $vehiculos;
    }


    public static function add($vehiculo){

        $con = parent::conectar();


        $query = "INSERT INTO ".self::$tabla." VALUES(null,'".$vehiculo->getMatricula()."','".$vehiculo->getMarca()."','".$vehiculo->getCentro()->getId()."')";


        mysqli_query($con, $query) or die("Error addCentro");

        parent::desconectar($con);

    }


    public static function deletteVehiculo($id){
        $con = parent::conectar();

        $query = "DELETE FROM ".self::$tabla." WHERE `id`=".$id;

        mysqli_query($con, $query) or die(mysqli_error($con));

        parent::desconectar($con);

    }
     public static function getAll(){
         $con = parent::conectar();

         $query = "SELECT * FROM ".self::$tabla;

         $rs = mysqli_query($con, $query) or die("Error getVehiculosByCentro");

         $vehiculos = parent::mapearArray($rs, "Vehiculo");

         parent::desconectar($con);

         return $vehiculos;
     }
}
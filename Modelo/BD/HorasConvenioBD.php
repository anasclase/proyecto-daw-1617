<?php

namespace Modelo\BD;

require_once __DIR__."/GenericoBD.php";

abstract class HorasConvenioBD extends GenericoBD{

    private static $tabla = "horasconvenios";

    public static function getHorasConveniosByCentro($centro){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE idCentro = ".$centro->getId();

        $rs = mysqli_query($con, $query) or die("Error getHorasConveniosByCentro");

        $horasConvenios = parent::mapear($rs, "HoraConvenio");

        parent::desconectar($con);

        return $horasConvenios;

    }

    public static function getHorasConvenioByPerfil($trabajador)
    {
        $query = null;
        $con = parent::conectar();
        $query = "SELECT * FROM " . self::$tabla . " WHERE id= (SELECT idHorasConvenio FROM perfiles WHERE tipo ='" . get_class($trabajador) . "')";
        $rs = mysqli_query($con, $query) or die("Error getHorasConveniosByCentro");
        $horasConvenios = parent::mapear($rs, "HoraConvenio");
        parent::desconectar($con);
        return $horasConvenios;
    }

    public static function selectConvenioById($id){

        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= ".$id." ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"HorasConvenio");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function getHorasConvenioByConvenioAusencia($convenioAusencia){
        $conexion = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE  id = (SELECT idHorasConvenio FROM conveniosausencias WHERE id = ".$convenioAusencia->getId().")";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        $horasConvenio = parent::mapear($rs, "HorasConvenio");

        parent::desconectar($conexion);

        return $horasConvenio;
    }

    public static function add($horasConvenio){
        $con = parent::conectar();

        $query = "INSERT INTO ".self::$tabla." VALUES (null,".$horasConvenio->getHorasAnual().",'".$horasConvenio->getDenominacion()."',".$horasConvenio->getCentro()->getId().")";

        mysqli_query($con, $query) or die($con);

        parent::desconectar($con);
    }
    public static function getAll(){
        $conexion = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla;

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        $horasConvenio = parent::mapearArray($rs, "HorasConvenio");

        parent::desconectar($conexion);

        return $horasConvenio;
    }
    public static function delete($id){

        $conn = parent::conectar();

        $query = "delete from " . self::$tabla. " where id=" . $id;

        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));

        parent:: desconectar($conn);
    }

    public static function updateHorasConvenio($horas){

        $con = parent::conectar();

        $query = "UPDATE ".self::$tabla." SET horasAnual =".$horas->getHorasAnual()." WHERE id =".$horas->getId();

        $rs = mysqli_query($con, $query) or die(mysqli_error($con));

        parent::desconectar($con);

    }

}
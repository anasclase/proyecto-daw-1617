<?php

namespace Modelo\BD;

require_once __DIR__."/GenericoBD.php";
require_once __DIR__."/TrabajadorBD.php";

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


    public static function getFestivoNacional($calendario){ //Aitor
        $conexion = parent::conectar();

        $query="SELECT fecha FROM festivosnacional WHERE calendario_id=".$calendario;
        $rs=mysqli_query($conexion, $query) or die("error add festivonacional");
        $fila=mysqli_fetch_array($rs);
        $fechasnacionales=array();
        while($fila!=null){
            array_push($fechasnacionales, $fila);
            $fila=mysqli_fetch_array($rs);
        }
        parent::desconectar($conexion);
        return $fechasnacionales;
    }

    public static function getFestivoCentro($calendario){   //Aitor
        $idCentro=TrabajadorBD::getCentroById();

        $conexion = parent::conectar();

        $query="SELECT fecha FROM festivos WHERE calendario_id=".$calendario." AND centro_id=".$idCentro;
        $rs=mysqli_query($conexion, $query) or die("error add festivocentro");
        $fila=mysqli_fetch_array($rs);
        $fechasnacionales=array();
        while($fila!=null){
            array_push($fechasnacionales, $fila);
            $fila=mysqli_fetch_array($rs);
        }
        parent::desconectar($conexion);
        return $fechasnacionales;
    }


    public static function insertFestivosTrabajador($fechasnacionales, $fechasCentro, $calendario){  //Aitor
        $conexion = parent::conectar();
        for($x=0;$x<count($fechasnacionales);$x++){
            $query="INSERT INTO vacacionestrabajadores VALUES('".$_SESSION["trabj"]."', '".$fechasnacionales[$x]."', '00:00:00', '00:00:00', ".$calendario.", 'A'";
            $rs=mysqli_query($conexion, $query) or die("error add vacacionestrabajadores");
        }
        for($x=0;$x<count($fechasCentro);$x++){
            $query="INSERT INTO vacacionestrabajadores VALUES('".$_SESSION["trabj"]."', '".$fechasCentro[$x]."', '00:00:00', '00:00:00', ".$calendario.", 'A'";
            $rs=mysqli_query($conexion, $query) or die("error add vacacionestrabajadores");
        }
        parent::desconectar($conexion);
    }


}
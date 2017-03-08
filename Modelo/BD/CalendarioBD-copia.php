<?php
namespace Modelo\BD;

require_once __DIR__."/GenericoBD.php";

abstract class CalendarioBD extends GenericoBD{

    private static $tabla = "calendario";

    public static function getCalendarioById($id = null){
        $con = parent::conectar();

        if($id==null)
        $id = 1;
        $query = "SELECT * FROM ".self::$tabla." WHERE id = ".$id;

        $rs = mysqli_query($con, $query) or die("Error getCalendarioById");

        $calendario = parent::mapear($rs, "Calendario");

        parent::desconectar($con);


        return $calendario;
    }

    public static function getAll(){
        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla;

        $rs = mysqli_query($con, $query) or die("Error getAll calendarios");

        $calendarios = parent::mapearArray($rs, "Calendario");

        parent::desconectar($con);

        return $calendarios;
    }

}
?>

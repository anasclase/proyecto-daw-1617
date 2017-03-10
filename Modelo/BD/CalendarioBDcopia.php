<?php
namespace Modelo\BD;



require_once __DIR__."/GenericoBD.php";

abstract class CalendarioBDcopia extends GenericoBD{

    private static $tabla = "calendario";

    public static function getCalendarioById($id){
        $con = parent::conectar();

        if($id==null)
            $id = 1;
        $query = "SELECT * FROM ".self::$tabla." WHERE id = ".$id;

        $rs = mysqli_query($con, $query) or die("Error getCalendarioById");

        $centro = parent::mapear($rs, "Calendario");

        parent::desconectar($con);

        return $centro;
    }

}

require_once __DIR__."/Mysqli.php";
?>


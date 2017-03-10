<?php
namespace Modelo\BD;



require_once __DIR__."/GenericoBD.php";

abstract class CalendarioBD extends GenericoBD{

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

/*
 * <?php
//
error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set('Europe/Madrid');
$dbhost="localhost";
$dbname="himevico";
$dbuser="root";
$dbpass="root";
$tabla="";
$db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if ($db->connect_errno) {
    die ("<h1>Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error."</h1>");
}
?>

 */
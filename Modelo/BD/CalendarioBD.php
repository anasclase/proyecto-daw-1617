<?php

namespace Modelo\BD;
require_once __DIR__."/GenericoBD.php";

abstract class CalendarioBD extends GenericoBD   //Aitor
{

    public static function getIdCalendario()
    {
        $con = self::conectar();

        $query = "SELECT id FROM calendario WHERE estado =1";

        $rs = mysqli_query($con, $query) or die("Error getCentrosByEmpresa");

        self::desconectar($con);
        return $rs;

    }

    public static function crearCalendario($calendario)      // IRUNE
    {
        error_reporting(0);
        if (self::comprobarEstadoCalend($calendario) != 0) {
            return false;
        } else    // DAVID
        {
            $con = self::conectar();

            $query = "INSERT INTO calendario VALUES ('" . $calendario->getId() . "', '" . $calendario->getDesc() . "', '" . $calendario->getEstado() . "')";

            $rs = mysqli_query($con, $query) or die("Error crearCalendario");

            self::desconectar($con);

            return true;
        }
    }


    public static function cerrarCalendario($id)
    {       //Aitor
        $con = self::conectar();
        $query = "UPDATE calendario set estado=2 WHERE id=" . $id;
        $rs = mysqli_query($con, $query) or die("Error al cerrar Calendario");
        self::desconectar($con);
        return true;
    }


    public static function comprobarEstadoCalend($calendario)
    {  //Aitor
        $con = self::conectar();

        $query = "SELECT * FROM calendario WHERE id=" . $calendario->getId();
        $rs = mysqli_query($con, $query) or die("Error al comprobar el estado del calendario");
        self::desconectar($con);
        return $rs->num_rows;

    }


    public static function getCalendClose()
    { //Aitor
        $con = self::conectar();

        $query = "SELECT id FROM calendario WHERE estado=2";
        $rs = mysqli_query($con, $query) or die("Error al obtener los calendarios");
        self::desconectar($con);
        return $rs;
    }


    public static function comprobarFestivos($calend)
    {
        $con = self::conectar();

        $query = "SELECT * FROM festivos WHERE calendario_id=" . $calend;
        $rs = mysqli_query($con, $query) or die("Error al obtener los calendarios");
        if ($rs->num_rows != 0) {
            $query = "SELECT * FROM festivosnacional WHERE calendario_id=" . $calend;
            $rs = mysqli_query($con, $query) or die("Error al obtener los calendarios");
            if ($rs->num_rows != 0)
                return true;
            else
                return false;
        } else
            return false;

    }}

/*error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set('Europe/Madrid');
$dbhost = "localhost";
$dbname = "himevico";
$dbuser = "root";
$dbpass = "root";
$tabla = "";
$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($db->connect_errno)
{
die ("<h1>Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error."</h1>");

}*/


?>

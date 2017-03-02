<?php
namespace Modelo\BD;
require_once __DIR__."/GenericoBD.php";

abstract class CalendarioBD extends GenericoBD   //Aitor
{

    public static function getIdCalendario()
    {
        $con = self::conectar();

        $query = "SELECT id FROM calendario " . " WHERE estado ='Abierto'";

        $rs = mysqli_query($con, $query) or die("Error getCentrosByEmpresa");
        while ($fila = mysqli_fetch_array($rs)) {
            return $fila;


            self::desconectar($con);

        }
    }
}

?>

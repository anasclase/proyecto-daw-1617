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

    public static function crearCalendario($calendario)      // IRUNE
    {

        $con = self::conectar();

        $query = "INSERT INTO calendario VALUES ('".$calendario->getId()."', '".$calendario->getDesc()."', '".$calendario->getEstado()."')";

        $rs = mysqli_query($con, $query) or die("Error crearCalendario, el calendario ya existe");

        self::desconectar($con);

        return "Calendario insertado correctamente";

        \CalendarioGestionarCalendario::cal(true);

    }
}

?>

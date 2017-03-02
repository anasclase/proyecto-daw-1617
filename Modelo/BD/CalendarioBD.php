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
        while ($fila = mysqli_fetch_array($rs)) {
            self::desconectar($con);
            return $fila;
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


    public static function cerrarCalendario($id){       //Aitor
        $con=self::conectar();
        $query="UPDATE calendario set estado=2 WHERE id=".$id;
        $rs = mysqli_query($con, $query) or die("Error al cerrar Calendario");
        return true;
    }
}

?>

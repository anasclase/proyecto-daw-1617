<?php
/**
 *
 * Anas
 */
namespace Modelo\BD;
require_once __DIR__."/GenericoBD.php";

abstract class VacacionesTrabajadoresBD extends GenericoBD{

    public static function insertarVacacionesTrabajadores($vacacionesTrab){

        $con = parent::conectar();

        $query = "INSERT INTO vacacionestrabajadores(dniTrabajador,fecha,horaInicio,horaFin,calendario_id,estado) VALUES ('".$vacacionesTrab->getDniTrabajador()."','".$vacacionesTrab->getFecha()."','".$vacacionesTrab->getHoraInicio()."','".$vacacionesTrab->getHoraFin()."','".intval($vacacionesTrab->getCalendario())."','".$vacacionesTrab->getEstado()."')";


        $rs = mysqli_query($con, $query) or die(mysqli_error($con));

        if(mysqli_affected_rows($con) == 1){
            return true;
        }else{
            return false;
        }


    }
}
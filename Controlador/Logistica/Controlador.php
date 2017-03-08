<?php
namespace Controlador\Logistica;
/**
 * Created by PhpStorm.
 * User: josu
 * Date: 1/3/16
 * Time: 16:35
 */
require_once __DIR__."/../../Modelo/Base/ParteLogisticaClass.php";
require_once __DIR__."/../../Modelo/Base/VehiculoClass.php";
require_once __DIR__."/../../Modelo/Base/ViajeClass.php";
require_once __DIR__."/../../Modelo/BD/ViajeBD.php";
use Modelo\BD;
use Modelo\Base;


class Controlador
{
    public static function AñadirViaje(/*recive el post con todos estos datos*/){

        $horaInicio=new \DateTime();
        $horaFin=$horaInicio->add(new \DateInterval('PT2H30M'));
        $horaInicio=new \DateTime();
        $idVehiculo=1;
        $idParte=1;
        $albaran="a2";

        $parte=new Base\ParteLogistica($idParte);
        $vehiculo=new Base\Vehiculo($idVehiculo);
        $viaje=new Base\Viaje("",$horaInicio->format('Y-m-d H:i:s'),$horaFin->format('Y-m-d H:i:s'),$albaran,$vehiculo,$parte);

        BD\ViajeBD::add($viaje);


    }

    public static function BorrarViaje(/*Recibe id del viaje en un $post*/){
        $idViaje=2;

        BD\ViajeBD::deleteViajeById($idViaje);


    }

    public static function ArrayVehiculosByCentro($centro){
        $vehiculos=BD\VehiculoBD::getVehiculosByCentro($centro);
        return $vehiculos;
    }



    public static function DeleteTrabjador($dni){
        BD\TrabajadorBD::deleteTrabajador($dni);
    }



}


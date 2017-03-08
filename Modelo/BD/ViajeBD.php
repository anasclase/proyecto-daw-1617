<?php
namespace Modelo\BD;
/**
 * Created by PhpStorm.
 * User: josu
 * Date: 27/2/16
 * Time: 16:34
 */
use Modelo\BD;
use Modelo\Base;



require_once __DIR__."/GenericoBD.php";


abstract class ViajeBD extends GenericoBD
{

    private static $tabla = "viajes";

    public static function getViajesByVehiculo($vehiculo)
    {

        $con = parent::conectar();

        $query = "SELECT * FROM " . self::$tabla . " WHERE idVehiculo = " . $vehiculo->getId();

        $rs = mysqli_query($con, $query) or die("Error getViajesByVehiculo");

        $viajes = parent::mapear($rs, "Viaje");

        parent::desconectar($con);

        return $viajes;
    }
    public static function getTabla()
    {
        return self::$tabla;
    }

    public static function add(Base\Viaje $objeto)
    {
        $conn = parent::conectar();
        $query = "insert into " . self::getTabla() . " values('','" . $objeto->getHoraInicio() . "','" . $objeto->getHoraFin() . "','" . $objeto->getVehiculo()->getId() . "','" . $objeto->getParteLogistica()->getId() . "','" . $objeto->getAlbaran() . "')";
        try {
            $res = mysqli_query($conn, $query);
            if (!$res) {
                $errno = mysqli_errno($conn);    // línea de error
                $error = mysqli_error($conn);    // descripción de error
                switch ($errno) {
                    case MYSQL_DUPLICATE_KEY_ENTRY:
                        throw new MySQLDuplicateKeyException("El Viaje ya existe");
                        break;
                    default:
                        throw new MYSQLException($error, $errno);
                        break;
                }
            }
            parent::desconectar($conn);
            return "Viaje insertado en base de datos";
        } catch (MySQLDuplicateKeyException $e) {
            parent::desconectar($conn);
            return $e->getMessage();
        } catch (MySQLException $e) {
            parent::desconectar($conn);
            return $e->getMessage() . " " . $e->getCode();
        }

    }

    public static function update(Base\Viaje $objeto)
    {
        $conn = parent::conectar();
        $query = "update " . self::getTabla() . " set horaInicio='" . $objeto->getHoraInicio() . "',horaFin='" . $objeto->getHoraFin() . "',idVehiculo=" . $objeto->getVehiculo()->getId() . ",albaran='" . $objeto->getAlbaran() . "' where id=". $objeto->getId();
        try{
            $res = mysqli_query($conn, $query);
            if (!$res) {
                $errno = mysqli_errno($conn);    // línea de error
                $error = mysqli_error($conn);    // descripción de error
                switch ($errno) {
                    case MYSQL_DUPLICATE_KEY_ENTRY:
                        throw new MySQLDuplicateKeyException("El Viaje ya existe");
                        break;
                    default:
                        throw new MYSQLException($error, $errno);
                        break;
                }
            }
            parent::desconectar($conn);
            return "Viaje modificado correctamente";
        } catch (MySQLDuplicateKeyException $e) {
            parent::desconectar($conn);
            return $e->getMessage();
        } catch (MySQLException $e) {
            parent::desconectar($conn);
            return $e->getMessage() . " " . $e->getCode();
        }

    }

    public static function getAll($objeto = null)
    {
        $conn = parent::conectar();

        $query = "select * from " . self::getTabla();

        if (!is_null($objeto) && is_a($objeto, "Modelo\Base\ParteLogistica")) { //tal vez ruta relativa
            $query = $query . " where idParte=" . $objeto->getId();
        }

        if (!is_null($objeto) && is_a($objeto, "Modelo\Base\Vehiculo")) {
            $query = $query . " where idVehiculo=" . $objeto->getId();
        }

        /*if (!is_null($objeto) && is_a($objeto,'Integer'))
        {
            $query = $query." where id=".$objeto."";
        }
        */

        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));


        $viajes = parent::mapearArray($rs, "Viaje");


        parent:: desconectar($conn);

        return $viajes;
    }
    public static function getViajeByParte($parte)
    {
        $conn = parent::conectar();

        $query = "select * from " . self::getTabla(). " where idParte=" . $parte->getId();

        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $viajes = parent::mapearArray($rs, "Viaje");

        parent:: desconectar($conn);

        return $viajes;
    }

    public static function getViajeById($id)
    {
        $conn = parent::conectar();

        $query = "select * from " . self::getTabla() . " where id=" . $id;

        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $viajes = parent::mapear($rs, "Viaje");

        parent:: desconectar($conn);

        return $viajes;
    }
    public static function deleteViajeById($id)
    {
        $conn = parent::conectar();

        $query = "delete from " . self::getTabla() . " where id=" . $id;

        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));



        parent:: desconectar($conn);


    }


    //Aitor I
    public static function ModificarViaje($id,$horaInicio,$horaFin,$albaran,$fechaHoy,$idVehiculo){
        $conn = parent::conectar();
        $query = "update " .self::$tabla . " set horaInicio = '$horaInicio', horaFin = '$horaFin', idVehiculo = $idVehiculo, albaran = $albaran where id = $id";
        mysqli_query($conn, $query) or die(mysqli_error($conn));
        parent:: desconectar($conn);
    }



}
    //POSIBLE GETER BY FECHA QUE ESTA SIN CODIFICAR, VEREMOS MAS ADELANTE SI ES NECESARIO
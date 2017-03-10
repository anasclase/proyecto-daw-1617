<?php
namespace Modelo\Base;
use Modelo\BD;
/**
 * Created by PhpStorm.
 * User: josu
 * Date: 27/2/16
 * Time: 16:18
 */
require_once __DIR__.'/VehiculoClass.php';
require_once __DIR__.'/ParteLogisticaClass.php';
require_once __DIR__.'/../BD/VehiculoBD.php';
require_once __DIR__.'/../BD/ViajeBD.php';
require_once __DIR__.'/../BD/PartesLogisticaBD.php';

class Viaje
{
    private $id;
    private $horaInicio;
    private $horaFin;
    private $albaran;
    private $vehiculo;
    private $parteLogistica;

    /**
     * ViajeClass constructor.
     * @param $id
     * @param $horaInicio
     * @param $horaFin
     * @param $albaran
     * @param $vehiculo
     * @param $parteLogistica
     */
    public function __construct($id=null, $horaInicio=null, $horaFin=null, $albaran=null, $vehiculo=null, $parteLogistica=null)
    {
        $this->setId($id);
        $this->setHoraInicio($horaInicio);
        $this->setHoraFin($horaFin);
        $this->setAlbaran($albaran);
        $this->setvehiculo($vehiculo);
        $this->setParteLogistica($parteLogistica);
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * @param null $horaInicio
     */
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;
    }

    /**
     * @return null
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * @param null $horaFin
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;
    }

    /**
     * @return null
     */
    public function getAlbaran()
    {
        return $this->albaran;
    }

    /**
     * @param null $albaran
     */
    public function setAlbaran($albaran)
    {
        $this->albaran = $albaran;
    }

    /**
     * @return null
     */
    public function getVehiculo()
    {
        if(is_null($this->vehiculo)){
            $this->setvehiculo(BD\VehiculoBD::getVehiculoByViaje($this));
        }
        return $this->vehiculo;
    }

    /**
     * @param null $vehiculo
     */
    public function setvehiculo($vehiculo)
    {
        $this->vehiculo = $vehiculo;
    }

    /**
     * @return null
     */
    public function getParteLogistica()
    {
       if($this->parteLogistica==null){
           $this->setParteLogistica(BD\PartelogisticaBD::selectParteLogisticaByViaje($this));
       }
        return $this->parteLogistica;
    }

    /**
     * @param null $parteLogistica
     */
    public function setParteLogistica($parteLogistica)
    {
        $this->parteLogistica = $parteLogistica;
    }


}
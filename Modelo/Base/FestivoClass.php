<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 1/3/16
 * Time: 10:33
 */

namespace Modelo\Base;

use Modelo\BD;

require_once __DIR__."/../BD/FestivoBD.php";
require_once __DIR__."/CalendarioClass.php";

class Festivo
{

    private $id;
    private $fecha;
    private $motivo;
    private $centro; //Cambiado centros por centro --Ibai
    private $calendario; //Cambiado calendario por calendario --Ibai

    /**
     * Festivo constructor.
     * @param $id
     * @param $fecha
     * @param $motivo
     * @param $centro
     * @param $calendario
     */
    public function __construct($id = null, $fecha = null, $motivo = null, $centro = null, $calendario = null)
    {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->motivo = $motivo;
        $this->centro = $centro;
        $this->calendario = $calendario;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * @param mixed $motivo
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
    }

    /**
     * @return mixed
     */
    public function getCentro()
    {
        return $this->centro;
    }

    /**
     * @param mixed $centro
     */
    public function setCentro($centro)
    {
        $this->centro = $centro;
    }

    /**
     * @return mixed
     */
    public function getCalendario()
    {
        return $this->calendario;
    }

    /**
     * @param mixed $calendario
     */
    public function setCalendario($calendario)
    {
        $this->calendario = $calendario;
    }

    public static function getAll()
    {
        return BD\FestivoBD::getAll();
    }

}
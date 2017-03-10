<?php
/**
 * Created by PhpStorm.
 * User: 2gdwec04
 * Date: 1/3/17
 * Time: 8:25
 */

/* Ganeko */

namespace Modelo\Base;

use Modelo\BD;

require_once __DIR__."/TrabajadorClass.php";
require_once __DIR__."/CalendarioClass.php";

class VacacionesTrabajadores{
    private $id;
    private $dniTrabajador;
    private $fecha;
    private $horaInicio;
    private $horaFin;
    private $calendario;
    private $estado;

    /**
     * VacacionesTrabajadoresClass constructor.
     * @param $id
     * @param $dniTrabajador
     * @param $fecha
     * @param $horaInicio
     * @param $horaFin
     * @param $calendario
     * @param $estado
     */
    public function __construct($id = null, $dniTrabajador = null, $fecha = null, $horaInicio = null, $horaFin = null, $calendario = null, $estado = null)
    {
        $this->id = $id;
        $this->dniTrabajador = $dniTrabajador;
        $this->fecha = $fecha;
        $this->horaInicio = $horaInicio;
        $this->horaFin = $horaFin;
        $this->calendario = $calendario;
        $this->estado = $estado;
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
    public function getDniTrabajador()
    {
        return $this->dniTrabajador;
    }

    /**
     * @param null $dniTrabajador
     */
    public function setDniTrabajador($dniTrabajador)
    {
        $this->dniTrabajador = $dniTrabajador;
    }

    /**
     * @return null
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param null $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
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
    public function getCalendario()
    {
        return $this->calendario;
    }

    /**
     * @param null $calendario
     */
    public function setCalendario($calendario)
    {
        $this->calendario = $calendario;
    }

    /**
     * @return null
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param null $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }




}
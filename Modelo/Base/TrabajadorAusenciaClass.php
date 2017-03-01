<?php

namespace Modelo\Base;

use Modelo\BD;

require_once __DIR__."/TrabajadorClass.php";
require_once __DIR__."/AusenciaClass.php";
require_once __DIR__."/CalendarioClass.php";
require_once __DIR__."/../BD/TrabajadorAusenciaBD.php";
require_once __DIR__."/../BD/TrabajadorBD.php";
require_once __DIR__."/../BD/AusenciaBD.php";
require_once __DIR__."/CalendarioClass.php";


class TrabajadorAusencia
{

    private $id;
    private $fecha;
    private $horaInicio;
    private $horaFin;
    private $trabajador; //No es codificada porque no es necesaria la bidireccionalidad.
    private $ausencia;
    private $calendario;

    /**
     * TrabajadoresAusencias constructor.
     * @param $id
     * @param $fecha
     * @param $horaInicio
     * @param $horaFin
     * @param $trabajador
     * @param $ausencia
     * @param $calendario
     */
    public function __construct($id = null, $fecha = null, $horaInicio = null, $horaFin = null, $trabajador = null, $ausencia = null, $calendario = null)
    {
        $this->setId($id);
        $this->setFecha($fecha);
        $this->setHoraInicio($horaInicio);
        $this->setHoraFin($horaFin);
        $this->setTrabajador($trabajador);
        $this->setAusencia($ausencia);
        $this->setCalendario($calendario);
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
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * @param mixed $horaInicio
     */
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;
    }

    /**
     * @return mixed
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * @param mixed $horaFin
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;
    }

    /**
     * @return mixed
     */
    public function getTrabajador()
    {
        return $this->trabajador;
    }

    /**
     * @param mixed $trabajador
     */
    public function setTrabajador($trabajador)
    {
        $this->trabajador = $trabajador;
    }

    /**
     * @return mixed
     */
    public function getAusencia()
    {
        return $this->ausencia;
    }

    /**
     * @param mixed $ausencia
     */
    public function setAusencia($ausencia)
    {
        $this->ausencia = $ausencia;
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



}
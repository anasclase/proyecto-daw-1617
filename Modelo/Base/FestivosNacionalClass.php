<?php
/**
 * Created by PhpStorm.
 * User: Pablo
 * Date: 01/03/2017
 * Time: 8:25
 *
 */

namespace Modelo\Base;

require_once __DIR__."/CalendarioClass.php";

class FestivosNacional{

    private $id;
    private $fecha;
    private $motivo;
    private $calendario;

    /**
     * FestivosNacionalClass constructor.
     * @param $id
     * @param $fecha
     * @param $motivo
     * @param $calendario
     */
    public function __construct($id = null, $fecha = null, $motivo = null, $calendario = null)
    {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->motivo = $motivo;
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
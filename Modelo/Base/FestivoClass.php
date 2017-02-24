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

class Festivo
{

    private $id;
    private $fecha;
    private $motivo;
    private $centros_id;
    private $calendario_id;

    /**
     * Festivo constructor.
     * @param $id
     * @param $fecha
     * @param $motivo
     * @param $centros_id
     * @param $calendario_id
     */
    public function __construct($id, $fecha, $motivo, $centros_id, $calendario_id)
    {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->motivo = $motivo;
        $this->centros_id = $centros_id;
        $this->calendario_id = $calendario_id;
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
    public function getCentrosId()
    {
        return $this->centros_id;
    }

    /**
     * @param mixed $centros_id
     */
    public function setCentrosId($centros_id)
    {
        $this->centros_id = $centros_id;
    }

    /**
     * @return mixed
     */
    public function getCalendarioId()
    {
        return $this->calendario_id;
    }

    /**
     * @param mixed $calendario_id
     */
    public function setCalendarioId($calendario_id)
    {
        $this->calendario_id = $calendario_id;
    }

    public static function getAll()
    {
        return BD\FestivoBD::getAll();
    }

}
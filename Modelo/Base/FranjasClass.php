<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 11:41
 */
namespace Modelo\Base;

use Modelo\BD;

require_once __DIR__."/../BD/FranjaBD.php";
require_once __DIR__."/../BD/TipoFranjaBD.php";
require_once __DIR__."/TiposFranjasClass.php";

class Franjas{

    private $id;
    private $horaInicio;
    private $horaFin;
    private $tipoFranja; //objeto tipoF

    public function __construct($id = null, $horaInicio = null, $horaFin = null, $tipoFranja = null)
    {
        $this->setId($id);
        $this->setHoraInicio($horaInicio);
        $this->setHoraFin($horaFin);
        $this->setTipoFranja($tipoFranja);
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
    public function getTipoFranja()
    {
        if(is_null($this->tipoFranja)){
            $this->setTipoFranja(BD\TipoFranjaBD::getTipoFranjaByFranja($this));
        }
        return $this->tipoFranja;
    }

    /**
     * @param mixed $tipoFranja
     */
    public function setTipoFranja($tipoFranja)
    {
        $this->tipoFranja = $tipoFranja;
    }
    public function save(){
        BD\FranjaBD::insert($this);
    }

    public function modify(){
        BD\FranjaBD::update($this);
    }

    public function remove(){
        BD\FranjaBD::delete($this);
    }

    public static function getAll()
    {
        return BD\FranjaBD::getAll();
    }

}
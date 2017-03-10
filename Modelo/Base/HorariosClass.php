<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 11:39
 */

namespace Modelo\Base;

use Modelo\BD;

require_once __DIR__."/../BD/HorarioBD.php";
require_once __DIR__."/../BD/HorarioFranjaBD.php";
require_once __DIR__."/HorariosFranjasClass.php";
class Horarios{

    private $id;
    private $tipo;
    private $horariosFranja; //array horariosFranja
    // private $horariosTrabajador; array

    /**
     * Horarios constructor.
     * @param $id
     * @param $tipo
     * @param $horariosFranja
     */
    public function __construct($id =null, $tipo = null, $horariosFranja = null)
    {
        $this->setId($id);
        $this->setTipo($tipo);
        $this->setHorariosFranja($horariosFranja);
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
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getHorariosFranja()
    {
        if(is_null($this->horariosFranja)){
            $this->setHorariosFranja(BD\HorarioFranjaBD::getHorariosFranjaByHorario($this));
        }
        return $this->horariosFranja;
    }

    /**
     * @param mixed $horariosFranja
     */
    public function setHorariosFranja($horariosFranja)
    {
        $this->horariosFranja = $horariosFranja;
    }
    public function save(){
        BD\HorarioBD::insert($this);
    }

    public function modify(){
        BD\HorarioBD::update($this);
    }

    public function remove(){
        BD\HorarioBD::delete($this);
    }



}
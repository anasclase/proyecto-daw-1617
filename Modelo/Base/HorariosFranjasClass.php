<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 11:41
 */

namespace Modelo\Base;

use Modelo\BD;
require_once __DIR__."/../BD/HorarioBD.php";
require_once __DIR__."/../BD/FranjaBD.php";
require_once __DIR__."/../BD/HorarioFranjaBD.php";
require_once __DIR__."/HorariosClass.php";
require_once __DIR__."/FranjasClass.php";

class HorariosFranja{

    private $id;
    private $horario;
    private $franja;

    /**
     * HorariosFranja constructor.
     * @param $id
     * @param $horario
     * @param $franja
     */
    public function __construct($id=null, $horario=null, $franja=null)
    {
        $this->setId($id);
        $this->setHorario($horario);
        $this->setFranja($franja);
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
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * @param mixed $horario
     */
    public function setHorario($horario)
    {
        $this->horario = $horario;
    }

    /**
     * @return mixed
     */
    public function getFranja()
    {
        if(is_null($this->franja)){
            $this->setFranja(BD\FranjaBD::getFranjaByHorarioFranja($this));
        }
        return $this->franja;
    }

    /**
     * @param mixed $franja
     */
    public function setFranja($franja)
    {
        $this->franja = $franja;
    }

    public function save(){
        BD\HorarioFranjaBD::save($this);
    }

    public function update(){
        BD\HorarioFranjaBD::update($this);

    }

    public function delete(){
        BD\HorarioFranjaBD::delete($this);

    }


}
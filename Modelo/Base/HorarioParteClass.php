<?php
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 29/02/2016
 * Time: 11:47
 */

namespace Modelo\Base;


use Modelo\BD;
require_once __DIR__."/../BD/HorarioParteBD.php";
require_once __DIR__."/../BD/ParteProduccionBD.php";
require_once __DIR__."/ParteProduccionClass.php";


class HorarioParte
{
    private $id;
    private $horaEntrada;
    private $horaSalida;
    private $parteProduccion;

    /**
     * HorarioParteClass constructor.
     * @param $id
     * @param $horaEntrada
     * @param $horaSalida
     * @param $parteProduccion
     */
    public function __construct($id=null, $horaEntrada=null, $horaSalida=null, $parteProduccion=null)
    {
        $this->setId($id);
        $this->setHoraEntrada($horaEntrada);
        $this->setHoraSalida($horaSalida);
        if(!is_null($parteProduccion)){
            $this->setParteProduccion($parteProduccion);
        }
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
    public function getHoraEntrada()
    {
        return $this->horaEntrada;
    }

    /**
     * @param null $horaEntrada
     */
    public function setHoraEntrada($horaEntrada)
    {
        $this->horaEntrada = $horaEntrada;
    }

    /**
     * @return null
     */
    public function getHoraSalida()
    {
        return $this->horaSalida;
    }

    /**
     * @param null $horaSalida
     */
    public function setHoraSalida($horaSalida)
    {
        $this->horaSalida = $horaSalida;
    }

    /**
     * @return null
     */
    public function getParteProduccion()
    {
        if(is_null($this->parteProduccion)){
            $this->setParteProduccion(BD\ParteProduccionBD::getParteByHorarioParte($this));
        }
        return $this->parteProduccion;
    }

    /**
     * @param null $parteProduccion
     */
    public function setParteProduccion($parteProduccion)
    {
        $this->parteProduccion = $parteProduccion;
    }

    public function save(){
        BD\HorarioParteBD::save($this);
    }

    public function update(){
        BD\HorarioParteBD::update($this);
    }

    public function delete(){
        BD\HorarioParteBD::delete($this);
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 11:36
 */
namespace Modelo\Base;

use Modelo\BD;
require_once __DIR__."/../BD/TrabajadorBD.php";
require_once __DIR__."/../BD/HorarioBD.php";
require_once __DIR__."/../BD/HorarioTrabajadorBD.php";
require_once __DIR__."/TrabajadorClass.php";
require_once __DIR__."/HorariosClass.php";

class HorariosTrabajadores{

    private $id;
    private $numeroSemana;
    private $trabajador;
    private $horario;
    private $calendario_id;

    /**
     * HorariosTrabajadores constructor.
     * @param $id
     * @param $numeroSemana
     * @param $trabajador
     * @param $horario
     * @param $calendario_id
     */
    public function __construct($id, $numeroSemana, $trabajador, $horario, $calendario_id)
    {
        $this->id = $id;
        $this->numeroSemana = $numeroSemana;
        $this->trabajador = $trabajador;
        $this->horario = $horario;
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
    public function getNumeroSemana()
    {
        return $this->numeroSemana;
    }

    /**
     * @param mixed $numeroSemana
     */
    public function setNumeroSemana($numeroSemana)
    {
        $this->numeroSemana = $numeroSemana;
    }

    /**
     * @return mixed
     */
    public function getTrabajador()
    {
        if(is_null($this->trabajador)){
            $this->setTrabajador(BD\TrabajadorBD::getTrabajadorByHorariosTrabajadores($this));
        }
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
    public function getHorario()
    {
        if(is_null($this->horario)){
            $this->setHorario(BD\HorarioBD::getHorarioByHorarioTrabajador($this));
        }

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

    public function add(){
        BD\HorarioTrabajadorBD::add($this);
    }

}
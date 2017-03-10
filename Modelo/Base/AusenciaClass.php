<?php

namespace Modelo\Base;

use Modelo\BD;

require_once __DIR__."/../BD/AusenciaBD.php";
class Ausencia
{

    private $id;
    private $tipo;
    private $convenioAusencias; //array

    /**
     * Ausencia constructor.
     * @param $id
     * @param $tipo
     */
    public function __construct($id = null, $tipo = null, $convenioAusencias = null)
    {
        $this->setId($id);
        $this->setTipo($tipo);
        $this->setConvenioAusencias($convenioAusencias);
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
    public function getConvenioAusencias()
    {
        if (is_null($this->convenioAusencias)){
            $this->setConvenioAusencias(BD\ConvenioAusenciaBD::getConvenioAusenciasByAusencia($this));
        }
        return $this->convenioAusencias;
    }

    /**
     * @param mixed $convenioAusencias
     */
    public function setConvenioAusencias($convenioAusencias)
    {
        $this->convenioAusencias = $convenioAusencias;
    }


}
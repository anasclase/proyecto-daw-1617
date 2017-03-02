<?php


namespace Modelo\Base;
use Modelo\Base;
use Modelo\BD;

require_once __DIR__."/ProduccionClass.php";
require_once __DIR__."/../BD/ParteProduccionBD.php";
require_once __DIR__."/ParteProduccionClass.php";

/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 27/02/2016
 * Time: 12:58
 */
class Produccion extends Trabajador
{
    private $partes = null;

    /**
     * Produccion constructor.
     * @param null $partes
     */
    public function __construct($dni=null, $nombre=null, $apellido1=null, $apellido2=null, $telefono=null, $foto = null, $centro=null, $ausenciasTrabajador = null, $horariosTrabajador = null, $partes = null, $horasConvenio = null)
    {
        parent::__construct($dni , $nombre , $apellido1 , $apellido2 , $telefono , $foto , $centro ,  $ausenciasTrabajador , $horariosTrabajador, $horasConvenio);
        $this->setPartes($partes);
    }


    public function setPartes($parte)
    {
        $this->partes=$parte;
    }

    public function addParte(ParteProduccion $parte){

        $this->partes[]=$parte;

        if(is_null($parte->getTrabajador())){
            $parte->setTrabajador($this);
        }



    }

    public function getPartes(){

        if(is_null($this->partes)){

            /*
             * Metodo sin codificar
             */

            $this->partes = ParteProduccionBD::getAllByTrabajador($this);

        }

        return $this->partes;

    }

    public function getPartesByFecha(){

        $diaSemana = date("N");
        $fechaSemana = date("Y-m-d",strtotime("-$diaSemana day"));

        if(is_null($this->partes)){
            $this->partes = BD\ParteProduccionBD::getParteByFecha($this,$fechaSemana);
        }

    }

}
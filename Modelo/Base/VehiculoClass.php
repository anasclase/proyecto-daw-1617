<?php
namespace Modelo\Base;



use Modelo\BD;


require_once __DIR__.'/CentroClass.php';
require_once __DIR__.'/ViajeClass.php';
require_once __DIR__.'/../BD/VehiculoBD.php';
require_once __DIR__."/../BD/ViajeBD.php";
require_once __DIR__."/../BD/CentroBD.php";


class Vehiculo{

    private $id;
    private $matricula;
    private $marca;
    private $centro; // objeto centro (no he codificado nada BD)
    private $viajes; // array viajes

    public function __construct($id = null, $matricula = null, $marca = null, $centro = null, $viajes = null)
    {
        $this->setId($id);
        $this->setMatricula($matricula);
        $this->setMarca($marca);
        $this->setCentro($centro);
        $this->setViajes($viajes);
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
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @param mixed $matricula
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */

    public function getCentro()
    {
        if(is_null($this->centro)){
            $this->setCentro(BD\CentroBD::getCentrosByVehiculo($this));
        }
        return $this->centro;
    }

    /**
     * @param mixed $centro
     */
    public function setCentro($centro)
    {
        $this->centro = $centro;
    }

    /**
     * @return mixed
     */


    //CAMBIAR METODO GETVIAJESBYVEHICULO POR EL BUENO


    public function getViajes()
    {

        if(is_null($this->viajes)){

            $this->setViajes(BD\ViajeBD::getAll($this));
        }
        return $this->viajes;
    }

    /**
     * @param mixed $viajes
     */
    public function setViajes($viajes)
    {
        $this->viajes = $viajes;
    }

    public function add()
    {
        BD\VehiculoBD::add($this);
    }

}
<?php
namespace Modelo\Base;



use Modelo\BD;

require_once __DIR__."/../BD/CentroBD.php";
require_once __DIR__."/../BD/EmpresaBD.php";
require_once __DIR__."/CentroClass.php";

class Empresa{

    private $id;
    private $nombre;
    private $nif;
    private $centros; //array Centros

    public function __construct($id = null, $nombre = null,$nif = null, $centro=null)
    {
        $this->setId($id);
        $this->setNombre($nombre);
        $this->setNif($nif);
        $this->setCentros($centro);
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * @param mixed $nif
     */
    public function setNif($nif)
    {
        $this->nif = $nif;
    }

    /**
     * @return mixed
     */
    public function getCentros()
    {

        if(is_null($this->centros)){

            $this->setCentros(BD\CentroBD::getCentrosByEmpresa($this));
        }
        return $this->centros;
    }

    /**
     * @param mixed $centros
     */
    public function setCentros($centros)
    {
        $this->centros = $centros;
    }

    public function add()
    {
        BD\EmpresaBD::add($this);
    }

    public function delete()
    {
        BD\EmpresaBD::delete($this->id);
    }

}
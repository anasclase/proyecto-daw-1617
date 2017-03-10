<?php
namespace Modelo\Base;

use Modelo\BD;

require_once __DIR__."/../BD/VehiculoBD.php";
require_once __DIR__."/../BD/TrabajadorBD.php";
require_once __DIR__ . "/../BD/HorasConvenioBD.php";
require_once __DIR__."/../BD/EmpresaBD.php";
require_once __DIR__."/../BD/CentroBD.php";
require_once __DIR__."/VehiculoClass.php";
require_once __DIR__."/TrabajadorClass.php";
require_once __DIR__."/HoraConvenioClass.php";
require_once __DIR__."/EmpresaClass.php";

class Centro{

    private $id;
    private $nombre;
    private $localizacion;
    private $empresa; //objeto empresa (no he codificado nada BD)
    private $vehiculos; //array vehiculos
    private $trabajadores; //array trabajadores
    private $horasConvenios; //array horasConvenio

    public function __construct($id = null, $nombre = null, $localizacion = null, $empresa = null, $vehiculos = null, $trabajadores = null, $horasConvenios = null)
    {
        $this->setId($id);
        $this->setNombre($nombre);
        $this->setLocalizacion($localizacion);
        $this->setEmpresa($empresa);
        $this->setVehiculos($vehiculos);
        $this->setTrabajadores($trabajadores);
        $this->setHorasConvenios($horasConvenios);
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
    public function getLocalizacion()
    {
        return $this->localizacion;
    }

    /**
     * @param mixed $localizacion
     */
    public function setLocalizacion($localizacion)
    {
        $this->localizacion = $localizacion;
    }

    /**
     * @return mixed
     */
    public function getEmpresa()
    {
        if(is_null($this->empresa)){
            $this->setEmpresa(BD\EmpresaBD::getEmpresaByCentro($this));
        }
        return $this->empresa;
    }

    /**
     * @param mixed $empresa
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }

    /**
     * @return mixed
     */
    public function getVehiculos()
    {
        if(is_null($this->vehiculos)){
            $this->setVehiculos(BD\VehiculoBD::getVehiculosByCentro($this));
        }
        return $this->vehiculos;
    }

    /**
     * @param mixed $vehiculos
     */
    public function setVehiculos($vehiculos)
    {
        $this->vehiculos = $vehiculos;
    }

    /**
     * @return mixed
     */
    public function getTrabajadores()
    {

        if(is_null($this->trabajadores)){
            $this->setTrabajadores(BD\TrabajadorBD::getTrabajadoresByCentro($this));
        }
        return $this->trabajadores;
    }

    /**
     * @param mixed $trabajadores
     */
    public function setTrabajadores($trabajadores)
    {
        $this->trabajadores = $trabajadores;
    }

    /**
     * @return mixed
     */
    public function getHorasConvenios()
    {
        if(is_null($this->horasConvenios)){

            $this->setHorasConvenios(BD\HorasConvenioBD::getHorasConveniosByCentro($this));
        }
        return $this->horasConvenios;
    }

    /**
     * @param mixed $horasConvenios
     */
    public function setHorasConvenios($horasConvenios)
    {
        $this->horasConvenios = $horasConvenios;
    }

    public function add()
    {
        BD\CentroBD::add($this);
    }

    public function delete()
    {
        BD\CentroBD::delete($this->id);
    }

}
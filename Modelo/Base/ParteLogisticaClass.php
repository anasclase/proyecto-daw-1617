<?php
/**
 * Created by PhpStorm.
 * User: alain
 * Date: 27/02/2016
 * Time: 14:46
 */
namespace Modelo\Base;
use Modelo\BD;


require_once __DIR__."/LogisticaClass.php";
require_once __DIR__."/ViajeClass.php";
require_once __DIR__."/EstadoClass.php";
require_once __DIR__."/../BD/PartesLogisticaBD.php";
require_once __DIR__."/../BD/ViajeBD.php";
require_once __DIR__ .'/../BD/EstadoBD.php';
require_once __DIR__."/../BD/TrabajadorBD.php";


class ParteLogistica{

    private $id;
    private $fecha;
    private $nota;
    private $autopista; //Añadido tras modificar la BD
    private $dieta;//Añadido tras modificar la BD
    private $otroGasto;//Añadido tras modificar la BD
    private $estado;
    private $trabajador;// Objeto logistica?? o Trabajador??
    private $viajes;
    private $horasExtra;

    /**
     * ParteLogistica constructor.
     * @param $id
     * @param $fecha
     * @param $nota
     * @param $autopista
     * @param $dieta
     * @param $otroGasto
     * @param $estado
     * @param $trabajador
     * @param $viajes
     * @param $horasExtra
     */
    public function __construct($id = null, $fecha = null, $nota = null, $autopista = null, $dieta = null, $otroGasto = null, $estado = null, $trabajador = null, $viajes = null, $horasExtra = null)
    {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->nota = $nota;
        $this->autopista = $autopista;
        $this->dieta = $dieta;
        $this->otroGasto = $otroGasto;
        $this->estado = $estado;
        $this->trabajador = $trabajador;
        $this->viajes = $viajes;
        $this->horasExtra = $horasExtra;
    }


    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
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
    public function getTrabajador()
    {
        if(is_null($this->trabajador)){
            $this->setTrabajador(BD\TrabajadorBD::getTrabajadorByParte($this));
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
    public function getEstado()
    {

       if(is_null($this->estado)){
           //echo "<script>alert('null')</script>";
           $this->setEstado(BD\EstadoBD::selectEstadoByParteLogistica($this));
       }
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param mixed $nota
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
    }

    /**
     * @return mixed
     */
    public function getAutopista()
    {
        return $this->autopista;
    }

    /**
     * @param mixed $autopista
     */
    public function setAutopista($autopista)
    {
        $this->autopista = $autopista;
    }

    /**
     * @return mixed
     */
    public function getDieta()
    {
        return $this->dieta;
    }

    /**
     * @param mixed $dieta
     */
    public function setDieta($dieta)
    {
        $this->dieta = $dieta;
    }

    /**
     * @return mixed
     */
    public function getOtroGasto()
    {
        return $this->otroGasto;
    }

    /**
     * @param mixed $otroGasto
     */
    public function setOtroGasto($otroGasto)
    {
        $this->otroGasto = $otroGasto;
    }


    /**
     * @return mixed
     */
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

    public function add(){
        BD\PartelogisticaBD::add($this);
    }

    /**
     * @return mixed
     */
    public function getHorasExtra()
    {
        return $this->horasExtra;
    }

    /**
     * @param mixed $horasExtra
     */
    public function setHorasExtra($horasExtra)
    {
        $this->horasExtra = $horasExtra;
    }
}

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
    //añadimos horasextras
    /**
     * ParteLogistica constructor.
     * @param $id
     * @param $trabajador
     * @param $estado
     * @param $nota
     */
    public function __construct($id=null, $fecha=null, $nota=null,$autopista=null,$dieta=null,$otroGasto = null, $estado=null, $trabajador=null, $viajes=null)
    {
        $this->setId($id);
        $this->setFecha($fecha);
        $this->setNota($nota);
        $this->setAutopista($autopista);
        $this->setDieta($dieta);
        $this->setOtroGasto($otroGasto);
        $this->setTrabajador($trabajador);
        $this->setEstado($estado);
        $this->setViajes($viajes);
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
}

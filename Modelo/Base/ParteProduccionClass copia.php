<?php
namespace Modelo\Base;

use Modelo\BD;

require_once __DIR__."/ProduccionClass.php";
require_once __DIR__."/ParteProducionTareaClass.php";
require_once __DIR__."/HorarioParteClass.php";
require_once __DIR__."/../BD/ParteProducionTareaBD.php";
require_once __DIR__."/../BD/ParteProduccionBD.php";
require_once __DIR__."/../BD/HorarioParteBD.php";



/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 27/02/2016
 * Time: 13:18
 */
class ParteProduccion
{
    private $id;
    private $estado;
    private $fecha;
    private $incidencia;
    private $autopista;
    private $dieta;
    private $otroGasto;

    //objeto Produccion
    private $trabajador;
    //array de PartesProduccionTareas
    private $parteProduccionTareas = null;
    //array HorarioParte
    private $horariosPartes = array();

    /**
     * ParteProduccion constructor.
     * @param $id
     * @param $estado
     * @param $fecha
     * @param $trabajador
     */
    public function __construct($id=null, $estado=null, $fecha=null, $incidencia = null,$autopista=null,$dieta=null,$otroGasto = null,$trabajador=null,$parteProduccionTareas = null,$horariosPartes=null)
    {
        $this->setId($id);
        $this->setEstado($estado);
        $this->setFecha($fecha);
        $this->setIncidencia($incidencia);
        $this->setAutopista($autopista);
        $this->setDieta($dieta);
        $this->setOtroGasto($otroGasto);

        if(!is_null($trabajador)){
            $this->setTrabajador($trabajador);
        }

        if(!is_null($parteProduccionTareas)){
            $this->setParteProduccionTareas($parteProduccionTareas);
        }

        if(!is_null($horariosPartes)){
            $this->setHorariosParte($horariosPartes);
        }

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
     * @return null
     */
    public function getEstado()
    {
        if(is_null($this->estado)){
            $this->setEstado(BD\EstadoBD::selectEstadoByParteProduccion($this));
        }
        return $this->estado;
    }

    /**
     * @param null $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return null
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param null $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return null
     */
    public function getTrabajador()
    {
        if(is_null($this->trabajador)){

            $this->trabajador = BD\TrabajadorBD::getTrabajadorByParte($this);
        }
        return $this->trabajador;
    }

    /**
     * @param null $trabajador
     */
    public function setTrabajador($trabajador)
    {
        $this->trabajador = $trabajador;
    }

    /**
     * @return null
     */
    public function getParteProduccionTareas()
    {

        if(is_null($this->parteProduccionTareas)){
            //metodo sin programar
            $this->setParteProduccionTareas(BD\ParteProduccionTareaBD::getAllByParte($this));
        }
        return $this->parteProduccionTareas;
    }

    /**
     * @param null $tareasParte
     */
    public function setParteProduccionTareas($parteProduccionTareas)
    {
        $this->parteProduccionTareas = $parteProduccionTareas;
    }

    public function addParteProduccionTarea($parteProduccionTarea){
        $this->parteProduccionTareas[]=$parteProduccionTarea;

        if(is_null($parteProduccionTarea->getParte())){
            $parteProduccionTarea->setParte($this);
        }
    }

    /**
     * @return null
     */
    public function getHorariosParte()
    {
        if(empty($this->horariosPartes)){
            $this->horariosPartes = BD\HorarioParteBD::getHorarioParteByParte($this);
        }
        return $this->horariosPartes;
    }

    /**
     * @param null $horariosParte
     */
    public function setHorariosParte($horariosParte)
    {
        $this->horariosParte = $horariosParte;
    }

    public function addHorariosParte($horariosParte){
        $this->horariosPartes[] = $horariosParte;


    }

    /**
     * @return mixed
     */
    public function getIncidencia()
    {
        return $this->incidencia;
    }

    /**
     * @param mixed $incidencia
     */
    public function setIncidencia($incidencia)
    {
        $this->incidencia = $incidencia;
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

    public function save(){
        return BD\ParteProduccionBD::save($this);
    }

    public function modify(){
        return BD\ParteProduccionBD::update($this);
    }

    public function cerrarParte(){
        return BD\ParteProduccionBD::cerrarParte($this);
    }

    public function remove(){
        return BD\ParteProduccionBD::delete($this);
    }

}
<?php

namespace Modelo\Base;
use Modelo\BD;


require_once __DIR__."/TipoTareaClass.php";
require_once __DIR__ . "/../BD/TipoTareaBD.php";
require_once __DIR__."/../BD/TareaBD.php";


/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 27/02/2016
 * Time: 13:35
 */
class Tarea
{
    private $id;
    private $descripcion;
    private $tipo; // objeto



    /**
     * Tarea constructor.
     * @param $id
     * @param $descripcion
     * @param $tipo
     */
    public function __construct($id=null, $descripcion=null, $tipo=null)
    {
        $this->setId($id);
        $this->setDescripcion($descripcion);


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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param null $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return null
     */

    public function getTipo()
    {
        //metodo sin programar
        if(is_null($this->tipo)){
            $this->setTipo(BD\TipoTareaBD::getTipoByTarea($this));
        }
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    public function save(){
        BD\TareaBD::insert($this);
    }

    public function modify(){
        BD\TareaBD::update($this);
    }

    public function remove(){
        BD\TareaBD::delete($this);
    }

    public function getTareaById(){

        return BD\TareaBD::getTareaById($this->getId());
    }

}
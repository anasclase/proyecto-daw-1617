<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 11:40
 */
namespace Modelo\Base;
use Modelo\BD;

require_once __DIR__."/../BD/TipoFranjaBD.php";
//require_once __DIR__."/FranjasClass.php";
//require_once __DIR__."/../BD/FranjaBD.php";




class TiposFranjas{

    private $id;
    private $tipo;
    private $precio;
    //private $franjas (array)

    public function __construct($id = null, $tipo = null, $precio = null)
    {
        $this->setId($id);
        $this->setTipo($tipo);
        $this->setPrecio($precio);
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
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    public function save(){
        BD\TipoFranjaBD::insert($this);
    }

    public function modify(){
        BD\TipoFranjaBD::update($this);
    }

    public function remove(){
        BD\TipoFranjaBD::delete($this);
    }


}
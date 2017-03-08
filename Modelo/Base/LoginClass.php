<?php

namespace Modelo\Base;

use Modelo\BD;


require_once __DIR__.'/TrabajadorClass.php';
require_once __DIR__ . '/../BD/LoginBD.php';
require_once __DIR__.'/../BD/TrabajadorBD.php';

class Login
{

    private $id;
    private $password;
    private $trabajador;

    /**
     * Login constructor.
     * @param $usuario
     * @param $password
     * @param $trabajador
     */
    public function __construct($id = null, $password = null, $trabajador = null)
    {
        $this->setId($id);
        $this->setPassword($password);
        if(!is_null($trabajador)){
            $this->setTrabajador($trabajador);
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
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function validar($dni){
        return BD\LoginBD::validarLogin($this, $dni);
    }

    /**
     * @return mixed
     */
    public function getTrabajador()
    {
        return $this->trabajador;
    }

    /**
     * @param mixed $trabajador
     */
    public function setTrabajador($trabajador)
    {
        $this->trabajador = $trabajador;
    }

    public function changePassword(){
       return BD\LoginBD::changePassword($this);
    }




}
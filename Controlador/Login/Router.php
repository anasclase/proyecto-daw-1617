<?php

namespace Controlador\Login;

require_once __DIR__.'/Controlador.php';
require_once __DIR__.'/../../Vista/Plantilla/Views.php';

use Controlador\Login;
use Vista\Plantilla\Views;

switch($_GET['cod']){

    case "1":
        if(Controlador::validarLogin($_POST)){
            header("Location: ".Views::getUrlRaiz()."/Vista/Calendario/Calendario.php");
            exit;
        }else{
           echo "Usuario o contraseña incorrectos";
        };

        break;
    case "2":
        if(Controlador::changePassword($_POST)){
            header("Location: ".Views::getUrlRaiz()."/Vista/Calendario/Calendario.php");
            exit;

        }else{
            echo "No se ha podido cambiar la contraseña";
        }

        break;

}
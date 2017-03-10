<?php
/**
 * Created by PhpStorm.
 * User: Nestor
 * Date: 02/03/2016
 * Time: 8:51
 */


require_once __DIR__.'/../../Modelo/Base/AdministracionClass.php';
require_once __DIR__.'/../Administracion/CalendarioViews.php';

require_once __DIR__.'/../../Modelo/Base/GerenciaClass.php';
require_once __DIR__.'/../Gerencia/CalendarioViews.php';

require_once __DIR__.'/../../Modelo/Base/LoginClass.php';
require_once __DIR__.'/../Logistica/CalendarioViews.php';

require_once __DIR__.'/../../Modelo/Base/ProduccionClass.php';
require_once __DIR__.'/../Produccion/CalendarioViews.php';


$trabajador = unserialize($_SESSION['trabajador']);

$perfil = get_class($trabajador);

$perfil = substr($perfil,12);

switch($perfil){
    case "Administracion":
        \Vista\Administracion\CalendarioViews::generarcalendario();
        break;
    case "Gerencia":
        \Vista\Gerencia\CalendarioViews::generarcalendario();
        break;
    case "Logistica":
        \Vista\Logistica\CalendarioViews::generarcalendario();
        break;
    case "Produccion":
        \Vista\Produccion\CalendarioViews::generarcalendario();
        break;
    default:
        header("Location: ".\Vista\Plantilla\Views::getUrlRaiz()."/Vista/Login/Login.php");
        break;
}



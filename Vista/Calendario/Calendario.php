<?php
/**
 * Created by PhpStorm.
 * User: Nestor
 * Date: 02/03/2016
 * Time: 8:51
 */


require_once __DIR__.'/../../Modelo/Base/AdministracionClass.php';
require_once __DIR__.'/../Administracion/CalendarioViews.php';

require_once __DIR__.'/../Administracion/AdministracionViews.php';

require_once __DIR__.'/../../Modelo/Base/GerenciaClass.php';
require_once __DIR__.'/../Gerencia/CalendarioViews.php';
require_once __DIR__.'/../Gerencia/GerenciaViews.php';

require_once __DIR__.'/../../Modelo/Base/LogisticaClass.php';
require_once __DIR__.'/../Logistica/CalendarioViews.php';

require_once __DIR__.'/../../Modelo/Base/ProduccionClass.php';
require_once __DIR__.'/../Produccion/CalendarioViews.php';

require_once __DIR__.'/../../Modelo/Base/LoginClass.php';
require_once __DIR__.'/../Login/LoginViews.php';

require_once __DIR__.'/../../Vista/Plantilla/Views.php';

use Vista\Plantilla\Views;



$login = unserialize($_SESSION['login']);

$trabajador = unserialize($_SESSION['trabajador']);

$trabajorPasswordm5 = md5($trabajador->getDni());

$perfil = get_class($trabajador);

$perfil = substr($perfil,12);

if ($login->getPassword() == $trabajorPasswordm5){
    \Vista\Login\LoginViews::changePassword();
}
else{
    switch($perfil){
        case "Administracion":
            \Vista\Administracion\AdministracionViews::allPartesByDni();
            break;
        case "Gerencia":
            \Vista\Gerencia\GerenciaViews::allPartesByDni();
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
}





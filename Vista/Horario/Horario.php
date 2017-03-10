<?php

require_once __DIR__.'/../../Modelo/Base/AdministracionClass.php';
require_once __DIR__.'/../Administracion/HorarioViews.php';

require_once __DIR__.'/../../Modelo/Base/GerenciaClass.php';
require_once __DIR__.'/../Gerencia/HorarioViews.php';

require_once __DIR__.'/../../Modelo/Base/LogisticaClass.php';
require_once __DIR__.'/../Logistica/HorarioViews.php';

require_once __DIR__.'/../../Modelo/Base/ProduccionClass.php';
require_once __DIR__.'/../Produccion/HorarioViews.php';


$trabajador = unserialize($_SESSION['trabajador']);

$perfil = get_class($trabajador);

$perfil = substr($perfil,12);


switch($perfil){
    case "Administracion":
        \Vista\Administracion\HorarioViews::getHorarioSemanal();
        break;
    case "Gerencia":
        \Vista\Gerencia\HorarioViews::getHorarioSemanal();
        break;
    case "Logistica":
        \Vista\Logistica\HorarioViews::getHorarioSemanal();
        break;
    case "Produccion":
        \Vista\Produccion\HorarioViews::getHorarioSemanal();
        break;
    default:
        header("Location: ".\Vista\Plantilla\Views::getUrlRaiz()."/Vista/Login/Login.php");
        break;
}
?>


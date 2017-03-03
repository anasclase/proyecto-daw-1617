<?php
require_once __DIR__.'/AdministracionViews.php';
require_once __DIR__.'/../../Controlador/Administracion/Controlador.php';
require_once __DIR__.'/../../Vista/Calendario/CalendarioGestionarCalendario.php';

use Controlador\Administracion\Controlador;

switch($_GET['cod']) {

    case "1":
        Vista\Administracion\AdministracionViews::elegir();
        break;
    case "2":
        Vista\Administracion\AdministracionViews::allPartesByDni();
        break;
    case "3":
        Vista\Administracion\AdministracionViews::findPartesByDni($_POST);
        break;
    case "4":
        Vista\Administracion\AdministracionViews::editParteLogistica();
        break;
    case "5":
        Vista\Administracion\AdministracionViews::editParteProduccion();
        break;
    case "6": // IRUNE
        $calendario = \Controlador\Administracion\Controlador::crearObjetoCalendario();
        if (Modelo\BD\CalendarioBD::crearCalendario($calendario))
            \CalendarioGestionarCalendario::cal(true);
        break;
    case "7":   //Aitor
        if(Modelo\BD\CalendarioBD::cerrarCalendario($_POST["calendarios"]))
            \CalendarioGestionarCalendario::cal(true);
        break;

}
?>


<?php
require_once __DIR__.'/GerenciaViews.php';

switch($_GET['cod']) {

    case "1":
        Vista\Gerencia\GerenciaViews::elegir();
        break;
    case "2":
        \Vista\Gerencia\GerenciaViews::allPartesByDni();
        break;
    case "3":
        \Vista\Gerencia\GerenciaViews::findPartesByDni($_POST);
        break;
}
?>


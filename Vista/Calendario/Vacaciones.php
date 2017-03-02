<?php

require_once __DIR__.'/CalendarioVacaciones.php';

$login = unserialize($_SESSION['login']);

$trabajador = unserialize($_SESSION['trabajador']);

$trabajorPasswordm5 = md5($trabajador->getDni());

if ($login->getPassword() == $trabajorPasswordm5){
    \Vista\Login\LoginViews::changePassword();
}
else {
    CalendarioVac::cal();
}

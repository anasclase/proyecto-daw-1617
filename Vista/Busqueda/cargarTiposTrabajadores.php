<?php

require_once __DIR__ . '/../../Controlador/Gerencia/Controlador.php';

$perfiles= \Controlador\Gerencia\Controlador::getAllPerfiles();

for($i=0; $i<count($perfiles); $i++){?>
    <div class='col-sm-3 col-md-2 ps'>
    <label><?php echo $perfiles[$i][1];?></label>
    <input type='checkbox' name='perfil[]' value="<?php echo $perfiles[$i][0];?>"/>
    </div><?php
}?>
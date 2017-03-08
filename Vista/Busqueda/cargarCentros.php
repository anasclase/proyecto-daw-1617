<?php

require_once __DIR__ . '/../../Controlador/Gerencia/Controlador.php';

$data = $_POST['data'];
$data = json_decode($data);
$centros = \Controlador\Gerencia\Controlador::getCentros($data);

for($i=0;$i<count($centros);$i++){?>
    <div class='col-sm-2 cs'>
    <label><?php echo $centros[$i]->getNombre();?></label>
    <input type='checkbox' name='centro[]' value="<?php echo $centros[$i]->getId();?>"/>
    </div><?php
}?>
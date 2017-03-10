<?php

require_once __DIR__ . '/../../Controlador/Gerencia/Controlador.php';

$estados = \Controlador\Gerencia\Controlador::getAllEstados();

for($i=0;$i<count($estados);$i++){?>
    <div class='col-sm-2 ee'>
    <label><?php echo $estados[$i]->getTipo();?></label>
    <input type='checkbox' name='estado[]' value="<?php echo $estados[$i]->getId();?>"/>
    </div><?php
}?>
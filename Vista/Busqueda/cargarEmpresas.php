<?php

require_once __DIR__ . '/../../Controlador/Gerencia/Controlador.php';

$empresas = \Controlador\Gerencia\Controlador::getAllEmpresas();

for($i=0;$i<count($empresas);$i++){?>
    <div class='col-sm-2 es'>
        <label><?php echo $empresas[$i]->getNombre();?></label>
        <input type='checkbox' name='empresa[]' value="<?php echo $empresas[$i]->getId();?>"/>
    </div><?php
}?>
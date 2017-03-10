<?php

require_once __DIR__ . '/../../Controlador/Gerencia/Controlador.php';

$data = $_POST['data'];
$data = json_decode($data);
$trabajadores = \Controlador\Gerencia\Controlador::getTrabajadores($data);

for($i=0;$i<count($trabajadores);$i++){?>
        <div class='col-sm-4 col-md-3 ts'>
        <label><?php echo $trabajadores[$i]->getNombre() . " " . $trabajadores[$i]->getApellido1() . " " . $trabajadores[$i]->getApellido2();?></label>
        <input type='checkbox' name='trabajador[]' value="<?php echo $trabajadores[$i]->getDni();?>"/>
        </div><?php
}
/*
  Solo trabajadores de produccion y logistica

   for($i=0;$i<count($trabajadores);$i++){
    $perfil = get_class($trabajadores[$i]);
    $perfil = substr($perfil, 12);
    if($perfil == "Produccion" || $perfil == "Logistica"){?>
        <div class='col-sm-4 col-md-3 ts'>
        <label><?php echo $trabajadores[$i]->getNombre() . " " . $trabajadores[$i]->getApellido1() . " " . $trabajadores[$i]->getApellido2();?></label>
        <input type='checkbox' name='trabajador[]' value="<?php echo $trabajadores[$i]->getDni();?>"/>
        </div><?php
    }
}*/?>
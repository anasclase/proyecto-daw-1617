<?php

namespace Modelo\BD;

require_once __DIR__."/GenericoBD.php";

abstract class AusenciaTrabajadorBD extends GenericoBD
{

    public static function getAusenciasByTrabajador($trabajador){

        $conexion = parent::conectar();

        $query = "SELECT * FROM trabajadoresausencias WHERE dniTrabajador = '".$trabajador->getDni()."'";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        $ausencias = GenericoBD::mapearArray($rs, "Ausencias");

        parent::desconectar($conexion);

        return $ausencias;

    }

}
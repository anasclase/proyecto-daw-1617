<?php

namespace Modelo\BD;

require_once __DIR__."/GenericoBD.php";

abstract class ConvenioAusenciaBD extends GenericoBD
{

    public static function getConvenioAusenciasByAusencia($ausencia){

        $conexion = parent::conectar();

        $query = "SELECT * FROM conveniosausencias WHERE idAusencia = ".$ausencia->getId();

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        $convenioAusencias = parent::mapearArray($rs, "ConvenioAusencias");

        parent::desconectar($conexion);

        return $convenioAusencias;

    }

}
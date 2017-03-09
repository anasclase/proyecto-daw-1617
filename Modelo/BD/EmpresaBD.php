<?php
namespace Modelo\BD;



require_once __DIR__."/GenericoBD.php";

abstract class EmpresaBD extends GenericoBD{

    private static $tabla = "empresas";

    public static function getAll(){
        $conn = parent::conectar();
        $query = "select * from " . self::$tabla ." ORDER BY nombre";
        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $respuesta = parent::mapearArray($rs, "Empresa");
        parent::desconectar($conn);
        return $respuesta;
    }

    public static function getEmpresaByID($id){
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= ".$id." ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"Empresa");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function add($empresa){

        $con = parent::conectar();

        $query = "INSERT INTO ".self::$tabla." VALUES(null,'".$empresa->getNombre()."','".$empresa->getNif()."')";


        mysqli_query($con, $query) or die("Error addEmpresa");

        parent::desconectar($con);

    }

    public static function delete($empresaId){

        $con = parent::conectar();

        $query = "DELETE FROM ".self::$tabla." WHERE id = ".$empresaId;

        mysqli_query($con, $query) or die("Error deleteEmpresa");

        parent::desconectar($con);

    }

    public static function getEmpresaByCentro($centro){

        $conn = parent::conectar();
        $query = "select * from ". self::$tabla." where id= (select idEmpresa from centros where id = ".$centro->getId().")";
        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $respuesta = parent::mapear($rs, "Empresa");
        parent::desconectar($conn);
        return $respuesta;

    }

}
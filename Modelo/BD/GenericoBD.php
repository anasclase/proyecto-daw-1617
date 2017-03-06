<?php
namespace Modelo\BD;

require_once __DIR__."/RequiresBD.php";

use Modelo\Base;

abstract class GenericoBD
{


    protected static function conectar()
    {

        $conn = mysqli_connect("localhost", "root", "root") or die("problemas en la conexión");
        mysqli_select_db($conn, "himevico") or die("problemas en la selección de base de datos");
        mysqli_set_charset($conn, "utf8");
        return $conn;


    }

    protected static function desconectar($conexion)
    {
        mysqli_close($conexion);
    }

    protected static function mapearArray($rs, $clase)
    {
        $result = array();

        if (mysqli_num_rows($rs) != 0) {
            while ($fila = mysqli_fetch_assoc($rs)) {
                $result[] = self::switchClase($fila, $clase);
            }

            return $result;
        } else {
            return $result;
        }
    }

    protected static function mapear($rs, $clase)
    {
        $result = null;
        if (mysqli_num_rows($rs) != 0) {
            if ($fila = mysqli_fetch_assoc($rs)) {
                $result = self::switchClase($fila, $clase);
            }
        }

        return $result;
    }


    protected static function switchClase($fila, $clase)
    {
        if (is_null($clase)) {
            $clase = $fila['tipo'];

        }
        switch ($clase) {
            case "Viaje":
                return new Base\Viaje($fila['id'], $fila['horaInicio'], $fila['horaFin'], $fila['albaran'], null, null);
                break;
            case "Vehiculo":
                return new Base\Vehiculo($fila['id'], $fila['matricula'], $fila['marca'], null, null);
                break;
            case "Estado":
                return new Base\Estado($fila["id"], $fila["tipo"]);
                break;
            case "Partelogistica":
                //Correccion Aitor I
                return new Base\ParteLogistica($fila["id"],$fila['fecha'],$fila["nota"],$fila["autopista"], $fila["dieta"], $fila["otroGasto"],EstadoBD::selectEstadoById($fila["idEstado"]), TrabajadorBD::getTrabajadorByDni($fila['dniTrabajador']), null);
                break;
            case "Centro":
                return new Base\Centro($fila["id"], $fila["nombre"], $fila["localizacion"], null, null, null, null);
                break;
            case "Empresa":
                return new Base\Empresa($fila["id"], $fila["nombre"], $fila["nif"], null);
                break;
            case "ParteProduccion":
                return new Base\ParteProduccion($fila["id"], EstadoBD::selectEstadoById($fila["idEstado"]), $fila["fecha"], $fila["incidencia"], $fila["autopista"], $fila["dieta"], $fila["otroGasto"], TrabajadorBD::getTrabajadorByDni($fila['dniTrabajador']));
                break;
            case "Tarea":
                return new Base\Tarea($fila["id"], $fila["descripcion"], null);
                break;
            case "TipoTarea":
                return new Base\TipoTarea($fila["id"], $fila["descripcion"]);
                break;
            case "ParteProduccionTarea":
                return new Base\ParteProducionTarea($fila['id'], $fila['numeroHoras'], $fila['paqueteEntrada'], $fila['paqueteSalida'], null, null);
                break;
            case "HorarioParte":
                return new Base\HorarioParte($fila['id'], $fila['entrada'], $fila['salida'], null);
           /* case "Logistica":
                return new Base\Logistica($fila["dni"], $fila['nombre'], $fila['apellido1'], $fila['apellido2'], $fila['telefono'], $fila["foto"], CentroBD::getCentrosById($fila['idCentro']), null, null, null, null);
                break;*/
            case "Administracion":
                return new Base\Administracion($fila['dni'], $fila['nombre'], $fila['apellido1'], $fila['apellido2'], $fila['telefono'], $fila["foto"]);//entroBD::getCentrosById($fila['idCentro'])
                break;
            case "Gerencia":
                return new Base\Gerencia($fila['dni'], $fila['nombre'], $fila['apellido1'], $fila['apellido2'], $fila['telefono'], $fila["foto"]);//entroBD::getCentrosById($fila['idCentro'])
                break;
            case "Logistica":
                return new Base\Logistica($fila['dni'], $fila['nombre'], $fila['apellido1'], $fila['apellido2'], $fila['telefono'], $fila["foto"]);//entroBD::getCentrosById($fila['idCentro'])
                break;
            case "Produccion":
                return new Base\Produccion($fila['dni'], $fila['nombre'], $fila['apellido1'], $fila['apellido2'], $fila['telefono'], $fila["foto"]);//entroBD::getCentrosById($fila['idCentro'])
                break;
            case "Ausencias":
                return new Base\AusenciaTrabajador($fila['id'], $fila['fecha'], $fila['horaInicio'], $fila['horaFin']);
                break;
            case "ConvenioAusencias":
                return new Base\AusenciaTrabajador($fila['id'], $fila['fecha']);
                break;
            case "HorasConvenio":
                return new Base\HoraConvenio($fila['id'], $fila['horasAnual'], $fila['denominacion']);
                break;
            case "Festivo":
                return new Base\Festivo($fila['id'], $fila['fecha'], $fila['motivo']);
                break;
            case "TiposFranja":
                return new Base\TiposFranjas($fila['id'], $fila['tipo'], $fila['precio']);
                break;
            case "Login":
                return new Base\Login($fila['id'], $fila['password'], null);
                break;
            case  "HorariosFranja":
                return new Base\HorariosFranja($fila['id']);
                break;
            case  "HorarioTrabajador":
                return new Base\HorariosTrabajadores($fila['id'], $fila['numeroSemana'], null, null, CalendarioBD::getCalendarioById($fila['calendario_id']));
                //return new Base\HorariosTrabajadores($fila['id'], $fila['numeroSemana'], TrabajadorBD::getTrabajadorByDni($fila['dniTrabajador']), CalendarioBD::getCalendarioById($fila['calendario_id']));
                break;
            case  "Calendario":
                return new Base\Calendario($fila['id'], $fila['desc'], $fila['estado']);
                break;
            case  "Horario":
                return new Base\Horarios($fila['id'], $fila['tipo']);
                break;
            case  "Franja":
                return new Base\Franjas($fila['id'], $fila['horaInicio'],$fila['horaFin']);
                break;
        }

    }

}
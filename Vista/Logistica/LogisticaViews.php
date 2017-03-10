<?php
namespace Vista\Logistica;
/**
 * Created by PhpStorm.
 * User: josu
 * Date: 1/3/16
 * Time: 16:25
 */
use Controlador\Logistica\ControladorLogistica;
use Vista\Plantilla;
use Modelo\Base;
require_once __DIR__."/../../Controlador/Logistica/";
require_once __DIR__."/../Plantilla/Views.php";



abstract class LogisticaViews extends Plantilla\Views
{
    public static function DesplegableVehiculosByCentro()
    {
        $centro = ($_SESSION['Usuario']->getCentro());
        $vehiculos = ControladorLogistica::ArrayVehiculosByCentro($centro);

        ?>
        <select name="">
            <?php
            foreach ($vehiculos as $vehiculo) {
                ?>
                <option name="<?php echo $vehiculo->getMatricula() ?>"
                        value="<?php echo $vehiculo->getId() ?>"><?php echo $vehiculo->getMatricula() ?></option>

                <?php
            }
            ?>
        </select>
        <?php
    }
}
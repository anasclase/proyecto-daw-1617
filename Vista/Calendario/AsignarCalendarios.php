<?php
require_once __DIR__.'/../Plantilla/Views.php';

use Vista\Plantilla;
abstract class AsignarCalendarios extends Plantilla\Views{      //Aitor
    public static function generar(){

        $texto = $_SESSION["trabj"];
        parent::setOn(true);
        parent::setRoot(true);

        require_once __DIR__."/../Plantilla/cabecera.php";


        ?>
        <!--Aitor-->
        <link type="text/css" rel="stylesheet" media="all" href="http://192.168.33.10/Vista/Plantilla/CSS/Bootstrap/estilos.css">


        <form style="margin: 10%" action="../../Controlador/Calendario/ControladorCalendario.php" method="post">
            <p>Asigna un calendario al trabajador con DNI: <strong><?php echo $texto; ?></strong></p>
            <select style="width: 15%" class="form-control" name="calendario">
                <?php
                $calendarios=\Modelo\BD\CalendarioBD::getCalendClose();
                while ($rows=mysqli_fetch_array($calendarios)){
                    echo "<option value='".$rows["id"]."'>".$rows["id"]."</option>";
                };
                ?>
            </select>
            <input class="btn btn-default" type='submit' name='asignarCalend' value='Guardar'/> <input class="btn btn-default" type='submit' name='volver' value='Volver'>
        </form>

        <?php
        require_once __DIR__."/../Plantilla/pie.php";
    }

}



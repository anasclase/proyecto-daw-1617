<?php

require_once __DIR__.'/../../Modelo/BD/GenericoBD.php';;
require_once __DIR__.'/../Plantilla/Views.php';

use Vista\Plantilla;
abstract class CalendarioGestionarCalendario extends Plantilla\Views
{
    public static function cal($comprobar){
        parent::setOn(true);
        parent::setRoot($comprobar);
        require_once __DIR__."/../Plantilla/cabecera.php";
        ?>


        <link type="text/css" rel="stylesheet" media="all" href="<?php echo parent::getUrlRaiz()?>/Vista/Plantilla/CSS/Bootstrap/estilos.css">

    <!-- CREAR CERRAR CALENDARIOS IRUNE SI -->

        <form name="buscar" action="<?php echo parent::getUrlRaiz()?>/Vista/Administracion/Administracion.php?cod=3" method="post">

            <h2>Crear un calendario</h2>
            <p><label>CENTRO: </label>
            <select name="centro">

                <?php
                require_once "../../Modelo/BD/CentroBD.php";
                $centros = \Modelo\BD\CentroBD::getNombreCentro();
                echo "<option value=''>-- Selecciona --</option>";
                for($x=0; $x<count($centros) -1; $x++){
                    echo "<option value='$centros[$x]'>$centros[$x]</option>";
                }
                ?>

            </select></p>
            <p><label>NUEVO CALENDARIO: </label>
                <select name="calendario">

                    <?php
                    require_once "../../Modelo/BD/CentroBD.php";
                    $anoActual = date(Y);
                    echo "<option value=''>-- Selecciona --</option>";
                    for($x=0; $x<9; $x++){
                        $ano = $anoActual + $x;
                        echo "<option value='$ano'>$ano</option>";
                    }
                    ?>

                </select></p>

            <input type="submit" name="crear" value="Crear">

            <h2>Cerrar un calendario</h2>
            <label>CALENDARIOS: </label><select name="calendarios">  <!--Aitor-->
                <?php
                require_once "../../Modelo/BD/CalendarioBD.php";    //Aitor
                $id = getIdCalendario();                             //Aitor
                for($x=0;$x<count($id) -1;$x++){                    //Aitor
                    echo "<option value='$id[$x]'>$id[$x]</option>";    //Aitor
                }
                ?>
            </select>
            <input type="submit" name="cerrar" value="Cerrar">

        </form>

        <script src="<?php echo parent::getUrlRaiz();?>/Vista/Plantilla/JS/jquery-2.2.1.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/localization/messages_es.js "></script>




        <!-- ESTO NO TE HACE FALTA! -->
        <script type="text/javascript">
            var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
            document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <script type="text/javascript">
            try {
                var pageTracker = _gat._getTracker("UA-266167-20");
                pageTracker._setDomainName(".martiniglesias.eu");
                pageTracker._trackPageview();
            } catch(err) {}</script>

        <?php
        require_once __DIR__."/../Plantilla/pie.php";
    }
}


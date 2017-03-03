<?php

require_once __DIR__.'/../../Modelo/BD/GenericoBD.php';;
require_once __DIR__.'/../Plantilla/Views.php';

use Vista\Plantilla;
abstract class CalendarioGestionarFestivosCentros extends Plantilla\Views
{
    public static function cal($comprobar){
        parent::setOn(true);
        parent::setRoot($comprobar);
        require_once __DIR__."/../Plantilla/cabecera.php";
        ?>


        <link type="text/css" rel="stylesheet" media="all" href="<?php echo parent::getUrlRaiz()?>/Vista/Plantilla/CSS/Bootstrap/estilos.css">

        <!-- IRUNE -->

        <form name="buscar" action="<?php echo parent::getUrlRaiz()?>/Vista/Administracion/Administracion.php?cod=8" method="post">

            <h2>Añadir festivos de centro</h2>
            <p><label>CENTRO: </label>
                <select name="centro">

                    <?php
                    require_once "../../Modelo/BD/CentroBD.php";
                    $centros = Modelo\BD\CentroBD::cargarCentros();
                    echo "<option value=''>-- Selecciona --</option>";
                    for($x=0; $x<count($centros); $x++){
                        echo "<option value='".$centros[$x]->getId()."'>".$centros[$x]->getNombre()."</option>";
                    }
                    ?>

                </select></p>
            <p><label>CALENDARIOS: </label>
                <select name="calendarios">  <!--Aitor-->
                    <?php
                    require_once "../../Modelo/BD/CalendarioBD.php";     //Aitor
                    echo "<option value=''>-- Selecciona --</option>";  //Aitor
                    $id = \Modelo\BD\CalendarioBD::getIdCalendario();    //Aitor
                    while ($rows=mysqli_fetch_array($id)){              //Aitor
                        echo "<option value='".$rows["id"]."'>".$rows["id"]."</option>";    //Aitor
                    };

                    ?>
                </select></p>

            <form name="rango" >
                <h4><p>Vacaciones por Rango o dias Sueltos:</p>
                    <label for="rango"> Rango </label> <input type="radio" name="rangoVacaciones" value="rango"/>
                    <label for="dSueltos"> D&iacute;as Sueltos </label> <input type="radio" name="rangoVacaciones" value="sueltos"/>
                </h4><br/>
                <div style="visibility: hidden"  id="fecha1">
                    <label id="diasNacionales"></label><br>
                    <input type="date" id="calendarioNacionales">
                    <input type="button" value="Guardar" id="botonNacionales" onclick="guardarFecha()">
                </div>
                <div style="visibility: hidden"  id="fecha2">
                    <label for="fInicial"> Desde : </label>  <input type="date" id="fInicial"/>  <label for="fFinal"> Hasta : </label>  <input type="date" id="fFinal"/>
                </div>
            </form>

            <input type="submit" name="anadir" value="A&ntilde;adir">

        </form>

        <?php if ($comprobar){?>

            <div class="calendario_ajax">

                <form name="rango" >
                </form>

                <div style='visibility: hidden' class="cal"></div><div id="mask"></div>
            </div>
            <?php
        }else{
            ?>
            <div class="calendario_ajax">
                <div class="cal"></div><div id="mask"></div>
            </div>
            <?php
        }
        ?>

        <script src="<?php echo parent::getUrlRaiz();?>/Vista/Plantilla/JS/jquery-2.2.1.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/localization/messages_es.js "></script>


        <!-- ESTO NO TE HACE FALTA! -->
        <script type="text/javascript">
            var fechas = [];

            $("input[name='rangoVacaciones']").change(function () {
                if($(this).val()=="rango"){
                    $("#fecha1").css("display","none");
                    $("#fecha2").css("display","inline");
                    $("#fecha2").css("visibility","visible");
                    fechas = [];
                    $('#diasNacionales').html("");
                }else{
                    $("#fecha1").css("display","inline");
                    $("#fecha1").css("visibility","visible");
                    $("#fecha2").css("display","none");
                }

            });

            function guardarFecha() {
                if ($("#diasNacionales").is(':empty')){
                    $("#diasNacionales").append($('<label id="'+ $("#calendarioNacionales").val() +'">' + $("#calendarioNacionales").val() + '</label>'));
                    fechas.push($("#calendarioNacionales").val());

                    var v = $("#calendarioNacionales").val().toString();
                    $('#diasNacionales').append($('<input type="button" onclick="borrarFecha('+ 0 +')" value="X" name="'+v+'">'));

                }else{
                    var y;
                    for(y = 0; y < fechas.length && fechas[y] != $("#calendarioNacionales").val(); y++){}

                    if(y == fechas.length){
                        fechas.push($("#calendarioNacionales").val());
                        $('#diasNacionales').empty();

                        for(var x = 0; x < fechas.length; x++){
                            $("#diasNacionales").append($('<label id="' + fechas[x] +'">' + fechas[x] + '</label>'));
                            $('#diasNacionales').append($('<input type="button" onclick="borrarFecha('+ x +')" value="X" name="' + fechas[x].toString() + '">'));
                        }
                    }
                }
            }

            function borrarFecha(fecha) {
                fecha = fechas[fecha];
                var y;
                for(y = 0; y < fechas.length && fechas[y] != fecha; y++){}

                fechas.splice(y,1);
                $('#diasNacionales').empty();
                for(var x = 0; x < fechas.length; x++){
                    $("#diasNacionales").append($('<label id="' + fechas[x] +'">' + fechas[x] + '</label>'));
                    $('#diasNacionales').append($('<input type="button" onclick="borrarFecha('+ x +')" value="X" name="' + fechas[x].toString() + '">'));
                }
            }
            <!--Iker-->

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


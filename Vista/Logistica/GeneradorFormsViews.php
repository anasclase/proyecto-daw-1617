<?php
namespace Vista\Logistica;
use Vista\Plantilla;
use Controlador\Logistica;
use Modelo\Base;

    require_once __DIR__."/../Plantilla/Views.php";
    require_once __DIR__."/../../Controlador/Logistica/Controlador.php";

    $Usuario=unserialize($_SESSION['trabajador']);

    $vehiculos = Logistica\Controlador::ArrayVehiculosByCentro($Usuario->getCentro());


    if(isset($_POST["cod"])){
        switch($_POST["cod"]){
            case 1:
                $hoy = date("d-m-Y");

                if($_POST["fecha"]<=$hoy){

                    ?>


                        <script src="Funciones.js"></script>
                <form>
                        <input id="FechaHoy" type="hidden" value="<?php echo $_POST['fecha']?>">
                        <div class="form-group">
                            <label for="Viaje" class="col-sm-3 control-label">Vehiculo: </label>
                            <div class="col-sm-9">
                            <select id="Vehiculo" data-validetta="required" class="form-control">
                                <option value="" disabled>Elija</option>
                                <?php

                                foreach ($vehiculos as $vehiculo) {
                                    ?>
                                    <option name="<?php echo $vehiculo->getMatricula() ?>"
                                            value="<?php echo $vehiculo->getId() ?>"><?php echo $vehiculo->getMatricula() ?></option>

                                    <?php
                                }

                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="horaInicio" class="col-sm-3 control-label">Hora de inicio: </label>
                            <div class="col-sm-4 container">
                                <?php $now=new \DateTime();
                                $ahora=$now->format("H");

                                ?>
                                <select id="HorasInicio" data-validetta="required" class="form-control">
                                    <option<?php if($ahora=="00"){echo " selected";} ?> name="00" value="00">00</option>
                                    <option<?php if($ahora=="01"){echo " selected";} ?> name="00" value="01">01</option>
                                    <option<?php if($ahora=="02"){echo " selected";} ?> name="00" value="02">02</option>
                                    <option<?php if($ahora=="03"){echo " selected";} ?> name="00" value="03">03</option>
                                    <option<?php if($ahora=="04"){echo " selected";} ?> name="00" value="04">04</option>
                                    <option<?php if($ahora=="05"){echo " selected";} ?> name="00" value="05">05</option>
                                    <option<?php if($ahora=="06"){echo " selected";} ?> name="00" value="06">06</option>
                                    <option<?php if($ahora=="07"){echo " selected";} ?> name="00" value="07">07</option>
                                    <option<?php if($ahora=="08"){echo " selected";} ?> name="00" value="08">08</option>
                                    <option<?php if($ahora=="09"){echo " selected";} ?> name="00" value="09">09</option>
                                    <option<?php if($ahora=="10"){echo " selected";} ?> name="00" value="10">10</option>
                                    <option<?php if($ahora=="11"){echo " selected";} ?> name="00" value="11">11</option>
                                    <option<?php if($ahora=="12"){echo " selected";} ?> name="00" value="12">12</option>
                                    <option<?php if($ahora=="13"){echo " selected";} ?> name="00" value="13">13</option>
                                    <option<?php if($ahora=="14"){echo " selected";} ?> name="00" value="14">14</option>
                                    <option<?php if($ahora=="15"){echo " selected";} ?> name="00" value="15">15</option>
                                    <option<?php if($ahora=="16"){echo " selected";} ?> name="00" value="16">16</option>
                                    <option<?php if($ahora=="17"){echo " selected";} ?> name="00" value="17">17</option>
                                    <option<?php if($ahora=="18"){echo " selected";} ?> name="00" value="18">18</option>
                                    <option<?php if($ahora=="19"){echo " selected";} ?> name="00" value="19">19</option>
                                    <option<?php if($ahora=="20"){echo " selected";} ?> name="00" value="20">20</option>
                                    <option<?php if($ahora=="21"){echo " selected";} ?> name="00" value="21">21</option>
                                    <option<?php if($ahora=="22"){echo " selected";} ?> name="00" value="22">22</option>
                                    <option<?php if($ahora=="23"){echo " selected";} ?> name="00" value="23">23</option>
                                </select>
                                    </div>
                            <span class="col-sm-1"><h4>:</h4></span>

                            <div class="col-sm-4 container">
                                  <select id="MinutosInicio" data-validetta="required" class="form-control ">
                                    <option name="00" value="00">00</option>
                                    <option name="00" value="01">05</option>
                                    <option name="00" value="02">10</option>
                                    <option name="00" value="03">15</option>
                                    <option name="00" value="04">20</option>
                                    <option name="00" value="05">25</option>
                                    <option name="00" value="06">30</option>
                                    <option name="00" value="07">35</option>
                                    <option name="00" value="08">40</option>
                                    <option name="00" value="09">45</option>
                                    <option name="00" value="10">50</option>
                                    <option name="00" value="11">55</option>
                                </select>

                            </div>
                        </div>
                    <div class="form-group">
                        <label for="horaFin" class="col-sm-3 control-label">Hora de fin: </label>
                        <div class="col-sm-4 container">
                            <select id="HorasFin" data-validetta="required" class="form-control">
                                <option<?php if($ahora=="00"){echo " selected";} ?> name="00" value="00">00</option>
                                <option<?php if($ahora=="01"){echo " selected";} ?> name="00" value="01">01</option>
                                <option<?php if($ahora=="02"){echo " selected";} ?> name="00" value="02">02</option>
                                <option<?php if($ahora=="03"){echo " selected";} ?> name="00" value="03">03</option>
                                <option<?php if($ahora=="04"){echo " selected";} ?> name="00" value="04">04</option>
                                <option<?php if($ahora=="05"){echo " selected";} ?> name="00" value="05">05</option>
                                <option<?php if($ahora=="06"){echo " selected";} ?> name="00" value="06">06</option>
                                <option<?php if($ahora=="07"){echo " selected";} ?> name="00" value="07">07</option>
                                <option<?php if($ahora=="08"){echo " selected";} ?> name="00" value="08">08</option>
                                <option<?php if($ahora=="09"){echo " selected";} ?> name="00" value="09">09</option>
                                <option<?php if($ahora=="10"){echo " selected";} ?> name="00" value="10">10</option>
                                <option<?php if($ahora=="11"){echo " selected";} ?> name="00" value="11">11</option>
                                <option<?php if($ahora=="12"){echo " selected";} ?> name="00" value="12">12</option>
                                <option<?php if($ahora=="13"){echo " selected";} ?> name="00" value="13">13</option>
                                <option<?php if($ahora=="14"){echo " selected";} ?> name="00" value="14">14</option>
                                <option<?php if($ahora=="15"){echo " selected";} ?> name="00" value="15">15</option>
                                <option<?php if($ahora=="16"){echo " selected";} ?> name="00" value="16">16</option>
                                <option<?php if($ahora=="17"){echo " selected";} ?> name="00" value="17">17</option>
                                <option<?php if($ahora=="18"){echo " selected";} ?> name="00" value="18">18</option>
                                <option<?php if($ahora=="19"){echo " selected";} ?> name="00" value="19">19</option>
                                <option<?php if($ahora=="20"){echo " selected";} ?> name="00" value="20">20</option>
                                <option<?php if($ahora=="21"){echo " selected";} ?> name="00" value="21">21</option>
                                <option<?php if($ahora=="22"){echo " selected";} ?> name="00" value="22">22</option>
                                <option<?php if($ahora=="23"){echo " selected";} ?> name="00" value="23">23</option>
                            </select>
                        </div>
                        <span class="col-sm-1"><h4>:</h4></span>

                        <div class="col-sm-4 container">
                            <select id="MinutosFin" data-validetta="required" class="form-control ">
                                <option name="00" value="00">00</option>
                                <option name="00" value="01">05</option>
                                <option name="00" value="02">10</option>
                                <option name="00" value="03">15</option>
                                <option name="00" value="04">20</option>
                                <option name="00" value="05">25</option>
                                <option name="00" value="06">30</option>
                                <option name="00" value="07">35</option>
                                <option name="00" value="08">40</option>
                                <option name="00" value="09">45</option>
                                <option name="00" value="10">50</option>
                                <option name="00" value="11">55</option>
                            </select>

                        </div>
                    </div>

                        <div class="form-group">
                        <label for="NºAlbaran" class="col-sm-3 control-label">Nº Albaran: </label>
                        <div class="col-sm-9">
                            <input type="text" id="Albaran" class="form-control" data-validetta="number">

                    </div>
                        </div>
                            <div class="form-group">


                                    <div class="col-sm-12 col-xs-offset-1 col-sm-offset-6"> 
								<!--- Cambiar boton GUARDAR POR AÑADIR
								Pablo + Aitor (añadir if de posibilidad de modificar linea) --->

										<?php if(!isset($_POST["id"])){ ?><button type="button" name="btnEnviar"  class="btn btn-primary enviar">Añadir</button>
                                        <?php }else{?><button type="button" name="btnModificarLinea" rel="<?php echo $_POST["id"];?>" class="btn btn-primary modificarLinea">Modificar</button><?php }?>


                                        <input type='submit' value='Salir' class='cerrar btn btn-warning'>


									</div>

                                </div>
                </form>
                    <div id="respuesta"></div>


                    <?php

                }else{
                    echo false;
                }

        }
    }else{
        header("Location:".Plantilla\Views::getUrlRaiz()."/Vista/Produccion/Calendario");
    }
?>

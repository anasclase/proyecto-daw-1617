<?php
namespace Vista\Produccion;
use Vista\Plantilla;
use Controlador\Produccion;
use Modelo\Base;

    require_once __DIR__."/../Plantilla/Views.php";
    require_once __DIR__."/../../Controlador/Produccion/Controlador.php";

    $tipoTareas = Produccion\Controlador::getTareasSelect();

    if(isset($_POST["cod"])){
        switch($_POST["cod"]){
            case 1:
                $hoy = date("d/m/Y");

                if($_POST["fecha"]<=$hoy){

                    ?>
                        <input type="hidden" name="fecha" id="fecha" value="<?php echo $_POST["fecha"];?>">
                        <input type="hidden" name="enviar">

                        <input type="hidden" name="cod" value="1">
                        <div class="form-group">
                            <label for="tarea" class="col-sm-3 control-label">Tarea: </label>
                            <div class="col-sm-9">
                            <select id="tarea" class="form-control" name="tarea">
                                <option value="">Elija</option>
                                <?php

                                foreach($tipoTareas as $tipo){
                                   ?>
                                        <optgroup label="<?php echo $tipo->getDescripcion()?>">
                                            <?php
                                                foreach($tipo->getTareas() as $tarea){
                                                     ?><option value="<?php echo $tarea->getId(); ?>"><?php echo $tarea->getDescripcion(); ?></option><?php
                                                }
                                            ?>
                                        </optgroup>
                                  <?php
                                }

                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="numeroHoras" class="col-sm-3 control-label">Horas: </label>
                            <div class="col-sm-9">
                                <input type="text" id="numeroHoras" class="form-control" name="numeroHoras">
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="paquetesEntrada" class="col-sm-3 control-label">Nº Entrada: </label>
                        <div class="col-sm-9">
                            <input type="text" id="paquetesEntrada" class="form-control" name="paquetesEntrada">
                        </div>
                        </div><div class="form-group">
                        <label for="paquetesSalida" class="col-sm-3 control-label">Nº Salida: </label>
                        <div class="col-sm-9">
                            <input type="text" id="paquetesSalida" class="form-control" name="paquetesSalida">
                        </div>
                        </div><div class="form-group">
                        <label for="paquetesTotal" class="col-sm-3 control-label">Nº Total: </label>
                        <div class="col-sm-9">
                            <input type="text" id="paquetesTotal" class="form-control" readonly="readonly">
                        </div>
                        </div><div class="form-group">
                        <div class="col-sm-12 col-xs-offset-1"> 
						<!--- Cambiar boton GUARDAR POR AÑADIR
						Pablo y Aitor I(lo de modif)--->

                            <?php if(!isset($_POST["id"])){ ?><button type="button" name="btnEnviar"  class="btn btn-primary enviar">Añadir</button>
                            <?php }else{?><button type="button" name="btnModificarLinea" rel="<?php echo $_POST["id"];?>" class="btn btn-primary modificarTarea">Modificar</button><?php }?>
                            <input type='submit' value='Salir' class='cerrar btn btn-warning'>

                        </div>
                        </div>
                    <?php


                }else{
                    echo false;
                }
            break;
            case 2:
                ?>
                    <form class="form-horizontal">
                        <input type="hidden" name="enviar">
                        <input type="hidden" name="idParte" value="<?php echo $_POST["idParte"]; ?>">
                        <input type="hidden" name="jornadaElegida" id="jornadaElegida" value="">
                        <div class="form-group">
                            <div class="radio col-xs-6 text-right">
                                <input type="radio" name="tipoJornada" id="tipo1" value="1">Jornada Continua
                            </div>
                            <div class="radio col-xs-6 text-left">
                                <input type="radio" name="tipoJornada" id="tipo2" value="2">Jornada Partida
                            </div>
                        </div><br/>
                        <div class="form-group col-xs-12" style="display: none" id="jornada1">
                            <div class="">
                                <label for="horaInicio1" class="col-sm-3 control-label">Hora de inicio: </label>
                                <div class="col-sm-1 container">
                                    <?php $now=new \DateTime();
                                    $ahora=$now->format("H");

                                    ?>
                                    <select id="horasInicio1" data-validetta="required" class="form-control">
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

                                <div class="col-sm-1 container">
                                    <select id="minInicio1" data-validetta="required" class="form-control ">
                                        <option name="00" value="00">00</option>
                                        <option name="00" value="05">05</option>
                                        <option name="00" value="10">10</option>
                                        <option name="00" value="15">15</option>
                                        <option name="00" value="20">20</option>
                                        <option name="00" value="25">25</option>
                                        <option name="00" value="30">30</option>
                                        <option name="00" value="35">35</option>
                                        <option name="00" value="40">40</option>
                                        <option name="00" value="45">45</option>
                                        <option name="00" value="50">50</option>
                                        <option name="00" value="55">55</option>
                                    </select>

                                </div>
                            </div>
                            <div>
                                <label for="horasFin1" class="col-sm-3 control-label">Hora de fin: </label>
                                <div class="col-sm-1 container">
                                    <select id="horasFin1" data-validetta="required" class="form-control">
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

                                <div class="col-sm-1 container">
                                    <select id="minFin1" data-validetta="required" class="form-control ">
                                        <option name="00" value="00">00</option>
                                        <option name="00" value="05">05</option>
                                        <option name="00" value="10">10</option>
                                        <option name="00" value="15">15</option>
                                        <option name="00" value="20">20</option>
                                        <option name="00" value="25">25</option>
                                        <option name="00" value="30">30</option>
                                        <option name="00" value="35">35</option>
                                        <option name="00" value="40">40</option>
                                        <option name="00" value="45">45</option>
                                        <option name="00" value="50">50</option>
                                        <option name="00" value="55">55</option>
                                    </select>

                                </div>
                            </div>


                        </div>
                        <div class="form-group col-xs-12" style="display: none" id="jornada2">
                            <div class="">
                                <label for="horaInicio2" class="col-sm-3 control-label">Hora de inicio: </label>
                                <div class="col-sm-1 container">
                                    <?php $now=new \DateTime();
                                    $ahora=$now->format("H");

                                    ?>
                                    <select id="horasInicio2" data-validetta="required" class="form-control">
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

                                <div class="col-sm-1 container">
                                    <select id="minInicio2" data-validetta="required" class="form-control ">
                                        <option name="00" value="00">00</option>
                                        <option name="00" value="05">05</option>
                                        <option name="00" value="10">10</option>
                                        <option name="00" value="15">15</option>
                                        <option name="00" value="20">20</option>
                                        <option name="00" value="25">25</option>
                                        <option name="00" value="30">30</option>
                                        <option name="00" value="35">35</option>
                                        <option name="00" value="40">40</option>
                                        <option name="00" value="45">45</option>
                                        <option name="00" value="50">50</option>
                                        <option name="00" value="55">55</option>
                                    </select>

                                </div>
                            </div>
                            <div  >
                                <label for="horaFin2" class="col-sm-3 control-label">Hora de fin: </label>
                                <div class="col-sm-1 container">
                                    <select id="horasFin2" data-validetta="required" class="form-control">
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

                                <div class="col-sm-1 container">
                                    <select id="minFin2" data-validetta="required" class="form-control ">
                                        <option name="00" value="00">00</option>
                                        <option name="00" value="05">05</option>
                                        <option name="00" value="10">10</option>
                                        <option name="00" value="15">15</option>
                                        <option name="00" value="20">20</option>
                                        <option name="00" value="25">25</option>
                                        <option name="00" value="30">30</option>
                                        <option name="00" value="35">35</option>
                                        <option name="00" value="40">40</option>
                                        <option name="00" value="45">45</option>
                                        <option name="00" value="50">50</option>
                                        <option name="00" value="55">55</option>
                                    </select>

                                </div>
                            </div>


                        </div>
                        <div class="form-group col-sm-4">
                            <label class="col-sm-6 control-label">Autopista/Peajes:</label>
                            <div class="input-group col-sm-3">
                                <input type="text" class="form-control" name="autopista" id="autopistas" aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2">€</span>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="col-sm-6 control-label">Dietas:</label>
                            <div class="input-group col-sm-3">
                                <input type="text" class="form-control" name="dieta" id="dietas" aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2">€</span>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="col-sm-6 control-label">Otros Gastos:</label>
                            <div class="input-group col-sm-3">
                                <input type="text" class="form-control" name="otroGastos" id="otrosGastos" aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2">€</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Incidencias:</label>
                            <div class="input-group col-sm-6">
                                <textarea class="form-control" name="incidencias" id="incidencias" rows="5"></textarea>
                            </div>
                        </div>
                        </div>
						<div class="form-group">
                        <div class="center-block col-sm-12 col-xs-offset-1"> 
						<!--- Cambiar boton
						Pablo --->
                           <button type="button" id="btnCP" style="display: none" name="btnCerrarParte" class="btn btn-primary cerrarParte">Guardar</button>
						   <button type='button' id="btnSP" style='display:none;' name="btnSalirParte"  class='cerrar btn btn-warning' >Salir</button>
                        </div>
                        </div>
                        <script>
                            $(document).ready(function(){
                                $("input[name='tipoJornada']").click(function(){
                                    var valor = $(this).val();
                                    if(valor=="1"){
                                        $("#jornada1").css("display","block");
                                        $("#jornada2").css("display","none");
                                        $("#btnCP").css("display","inline");
										$("#btnSP").css("display","inline");
                                        $('#jornadaElegida').val(1);
                                    }else if(valor=="2"){
                                        $("#jornada1").css("display","inline");
                                        $("#jornada2").css("display","inline");
                                        $("#btnCP").css("display","inline");
										$("#btnSP").css("display","inline");
                                        $('#jornadaElegida').val(2);
                                    }
                                });
                            });

                        </script>
                    </form>
                <?php
            break;
            case 3:
                ?>
                <label class="col-sm-6 control-label">Franja horaria</label>
                <div class="input-group col-sm-3">
                    <select name="franja">
                        <?php
                        for($x = 0;$x<24;$x++){
                            echo '<option value="'.$x.'">'.$x.'</option>';
                        }
                        ?>

                    </select>
                </div>

                <?php
                break;
            case 4:
                ?>
                <?php
                break;

        }
    }else{
        header("Location:".Plantilla\Views::getUrlRaiz()."/Vista/Produccion/Calendario");
    }
?>

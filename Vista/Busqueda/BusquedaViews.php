<?php

namespace Vista\Busqueda;
use Controlador\Administracion\Controlador;
use Modelo\Base\Empresa;
use Vista\Plantilla\Views;

require_once __DIR__ . '/../Plantilla/Views.php';
require_once __DIR__ . '/../../Modelo/Base/AdministracionClass.php';
require_once __DIR__ . '/../../Controlador/Administracion/Controlador.php';
require_once __DIR__ . '/../../Modelo/Base/EmpresaClass.php';

abstract class BusquedaViews extends Views{
    public static function busqueda(){
        parent::setOn(true);
        $trabajador = unserialize($_SESSION['trabajador']);
        $perfil = get_class($trabajador);
        $perfil = substr($perfil,12);

        if($perfil=="Administracion"){
            parent::setRoot(true);
        }else if ($perfil=="Gerencia"){
            parent::setRoot(true);
        }

        require_once __DIR__ . '/../Plantilla/Cabecera.php';

        if(parent::isOn()){
            $trabajador = unserialize($_SESSION['trabajador']);

            if(substr(get_class($trabajador), 12) == "Administracion"){?>
                <form action="../../Controlador/Administracion/Router.php" method="post" class="form-inline">
                    <fieldset>
                        <legend>B&uacute;squeda</legend>
                        <div class="form-group">
                            <div class="col-sm-2  col-md-2 ">
                                <input class="btn btn-primary" type="submit" name="buscar" value="Vacaciones"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2  col-md-2 ">
                                <input class="btn btn-primary" type="submit" name="buscar" value="Incidencias"/>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <div>
                    <?php if(isset($_SESSION['buscar'])){
                        if($_SESSION['buscar'] == "vacas"){
                            self::busquedaBoton("Vacaciones");
                        }elseif($_SESSION['buscar'] == "inci"){
                            self::busquedaBoton("Incidencias");
                        }
                    }?>
                </div>
                <?php
            }else{?>
                <form action="../../Controlador/Gerencia/Router.php" method="post" class="container">
                    <fieldset>
                        <legend>B&uacute;squeda por:</legend>
                        <div class="row">
                            <div class="col-sm-2">
                                <label>Fecha</label>
                                <input type="radio" name="opFecha" value="fecha" onclick="addFecha(this.value)" required/>
                            </div>
                            <div class="col-sm-4 col-sm-offset-1">
                                <label>Rango de fechas</label>
                                <input type="radio" name="opFecha" value="rango" onclick="addFecha(this.value)" required/>
                            </div>
                        </div>
                        <div class="row" id="fecha"></div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Empresa:</label>
                                <input type="radio" name="opEmp" value="si""/>
                            </div>
                        </div>
                        <div class="row" id="empresas"></div>
                        <div class="row">
                            <div class="col-sm-4 cen" style="display: none">
                                <label>Centro:</label>
                                <input type="radio" name="opCentro" value="si" onclick="addCentro()"/>
                            </div>
                        </div>
                        <div class="row" id="centros"></div>
                        <div class="row">
                            <div class="col-sm-4 tra" style="display: none">
                                <label>Trabajador:</label>
                                <input type="radio" name="opTrabajador" value="si" onclick="addTipoTrabajador()"/>
                            </div>
                        </div>
                        <div class="row" id="tiposTrabajadores"></div>
                        <div class="row" id="trabajadores"></div>
                        <div class="row">
                            <div class="col-sm-4 est" style="display: none">
                                <label>Estado:</label>
                                <input type="radio" name="opEstado" value="si" onclick="addEstado()"/>
                            </div>
                        </div>
                        <div class="row" id="estados"></div>
                        <p>
                        <div class="row">
                            <div class="col-sm-2 col-md-2">
                                <button class="btn btn-primary" type="submit" name="buscar" value="incidencias">Incidencias</button>
                            </div>
                            <div class="col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">
                                <button class="btn btn-primary" type="submit" name="buscar" value="partesAnu">Partes Anuales</button>
                            </div>
                            <div class="col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">
                                <button class="btn btn-primary" type="submit" name="buscar" value="partesMen">Partes Mensuales</button>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px">
                            <div class="col-sm-2 col-md-2 ">
                                <button class="btn btn-primary" type="submit" name="buscar" value="vacasApro">Vacaciones Aprobadas</button>
                            </div>
                            <div class="col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">
                                <button class="btn btn-primary" type="submit" name="buscar" value="vacasDis">Vacaciones Disfrutadas</button>
                            </div>
                            <div class="col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">
                                <button class="btn btn-primary" type="submit" name="buscar" value="vacasSoli">Vacaciones Solicitadas</button>
                            </div>
                        </div></p>
                    </fieldset>
                </form>
                <div></div><?php
            }
        }
        require_once __DIR__ . '/../Plantilla/Pie.php';
    }

    public static function busquedaBoton($v){?>
        <br/>
        <form action="<?php echo parent::getUrlRaiz();?>/Controlador/Administracion/Router.php" method="post" class="form-horizontal ins">
            <fieldset>
                <legend><?php echo $v;?></legend>
                <input type="hidden" name="tipo" value="<?php echo $v;?>"/>
                <div class="form-group">
                    <label class="control-label col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">A&ntilde;o:</label>
                    <div class="col-sm-4 col-md-4">
                        <?php $fecha = getdate();?>
                        <input type="number" name="ano" required min="1900" max="<?php echo $fecha["year"];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">Empresa:</label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="empresa"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">Centro:</label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="centro"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">Dni Trabajador:</label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="trabajador"/>
                    </div>
                </div>
                <?php if($v == "Vacaciones"){?>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">Estado de la vacaci&oacute;n:</label>
                        <div class="col-sm-4 col-md-4">
                            <input type="text" name="estado"/>
                        </div>
                    </div><?php
                }else{

                }?>

                <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-4 col-md-2 col-md-offset-4">
                        <input class="btn btn-primary" type="submit" name="buscar" value="Buscar"/>
                    </div>
                </div>
            </fieldset>
        </form>
        <div><?php if(isset($_SESSION['error'])){echo $_SESSION['error'];}?></div><?php
    }
}
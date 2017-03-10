<?php
namespace Vista\Login;

use Vista\Plantilla\Views;

require_once __DIR__.'/../Plantilla/Views.php';
require_once __DIR__.'/../../Modelo/Base/AdministracionClass.php';



class LoginViews extends Views
{

    public static function login()
    {
        parent::setOn(false);

        require_once __DIR__ . '/../Plantilla/Cabecera.php';

        ?>
                <form name="loginForm" class="form-horizontal login" method="post">
                    <fieldset>
                        <legend>Login</legend>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">DNI:</label>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-control" type="text" name="usuario" id="usuario" maxlength="9" data-validetta="required,regExp[validarDni]"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">Contraseña:</label>
                        <div class="col-sm-4 col-md-4">
                            <input class="form-control" type="password" name="password" id="password" data-validetta="required"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-4 col-md-2 col-md-offset-4">
                            <input class="btn btn-primary" type="submit" name="entrar" id="entrar" value="Entrar"/>
                        </div>
                    </div>
                    </fieldset>
                </form>
            <div id="datos" class="alert-danger col-md-4 col-md-offset-4" style="display: none"></div>



        <?php

        require_once __DIR__ . '/../Plantilla/Pie.php';
    }

    public static function changePassword()
    {
        parent::setOn(true);

        $trabajador = unserialize($_SESSION['trabajador']);

        $perfil = get_class($trabajador);

        $perfil = substr($perfil,12);

        if($perfil=="Administracion"){

            parent::setRoot(true);
        }
        else if ($perfil=="Gerencia"){
            parent::setRoot(true);
        }

        require_once __DIR__ . '/../Plantilla/Cabecera.php';

        ?>
                <form name="changePasswordForm" class="form-horizontal ins" method="post">
                    <fieldset>
                        <legend>Cambio de contraseña</legend>
                        <div class="form-group">
                            <label class="control-label col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">Contraseña vieja:</label>
                            <div class="col-sm-4 col-md-4">
                                <input class="form-control" type="password" name="oldpassword" id="oldpassword" data-validetta="required"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">Contraseña nueva:</label>
                            <div class="col-sm-4 col-md-4">
                                <input class="form-control" type="password" name="newpassword" id="newpassword" data-validetta="required"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2">Confirmar contraseña:</label>
                            <div class="col-sm-4 col-md-4">
                                <input class="form-control" type="password" name="repassword" id="repassword" data-validetta="required,equalTo[newpassword]"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-4 col-md-2 col-md-offset-4">
                                <input class="btn btn-primary" type="submit" name="cambiar" id="cambiar" value="Cambiar"/>
                            </div>
                        </div>
                    </fieldset>
                </form>
            <div class="row">
                <div id="datos" class="alert-danger col-md-4 col-md-offset-4" style="display: none"></div>
            </div>
        <?php

        require_once __DIR__ . '/../Plantilla/Pie.php';
    }
}

<?php
namespace Vista\Gerencia;

use Modelo\Base\Franjas;
use Modelo\Base\Festivo;
use Vista\Plantilla\Views;

require_once __DIR__.'/../Plantilla/Views.php';

abstract class HorarioViews extends Views
{

    public static function getHorarioSemanal(){

        parent::setOn(true);
        parent::setRoot(true);

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        $trabajador = unserialize($_SESSION['trabajador']);

        //semana del sistema

        $semana = date("W");

        $horariosFranjas = $trabajador->getHorariosTrabajadorBySemana($semana)->getHorario()->getHorariosFranja();

        $franjas = Franjas::getAll();

        $festivos = Festivo::getAll();
//---------------------------SACAR FECHAS DE LA SEMANA-------------------------------

        $year= date("Y");

        $month=date("m");

        $day=date("d");

    //Obtenemos el numero de la semana

        $semana=date("W",mktime(0,0,0,$month,$day,$year));


    // Obtenemos el día de la semana de la fecha dada

        $diaSemana=date("w",mktime(0,0,0,$month,$day,$year));

    // el 0 equivale al domingo...

        if($diaSemana==0)

            $diaSemana=7;

    // A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes

        $lunes=date("Y-m-d",mktime(0,0,0,$month,$day-$diaSemana+1,$year));

    /**
     * A la fecha recibida, le sumamos el dia de la semana menos el numero del dia que queramos obtener
     * siendo 7 el domingo, 6 el sabado ...*/

        $martes=date("Y-m-d",mktime(0,0,0,$month,$day+(2-$diaSemana),$year));


        $miercoles=date("Y-m-d",mktime(0,0,0,$month,$day+(3-$diaSemana),$year));


        $jueves=date("Y-m-d",mktime(0,0,0,$month,$day+(4-$diaSemana),$year));


        $viernes=date("Y-m-d",mktime(0,0,0,$month,$day+(5-$diaSemana),$year));


        $sabado=date("Y-m-d",mktime(0,0,0,$month,$day+(6-$diaSemana),$year));


        $domingo=date("Y-m-d",mktime(0,0,0,$month,$day+(7-$diaSemana),$year));

//-----------------------------------------------------------------------------------------------------

        ?>

        <div class="table-responsive" style="margin-top: 20px;">
            <table class="table table-bordered table-condensed">
                <caption ALIGN=bottom>Horario semanal de <?php echo $trabajador->getNombre()." ".$trabajador->getApellido1().' '.$trabajador->getApellido2()?></caption>
                <tr>
                    <td>Nº<?php echo $semana ?></td>
                    <th>Día</th>
                        <?php
                        foreach ($franjas as $franja)
                        {
                            echo "<th>";
                            echo substr($franja->getHoraInicio(),0,-3);
                            echo "-";
                            echo substr($franja->getHoraFin(),0,-3);
                            echo "</th>";
                        }
                        ?>

                </tr>
                <?php
                //Programacion de los lunes
                $fiesta = false;
                $posicion = null;
                foreach ($festivos as $festivo)
                {
                    if($festivo->getFecha()==$lunes)
                    {
                        $fiesta = true;
                        $posicion = $festivo;
                    }
                }

                if($fiesta){
                    ?>
                    <tr>
                        <th>Lunes <th class="diaS"><?php echo substr($lunes,8)?></th>
                        <?php for($x=0; $x<24; $x++){?>
                            <td class="bg-success text-info" style="font-size: x-small"><?php echo $posicion->getMotivo()?></td>
                        <?php } ?>
                    </tr>
                    <?php
                }
                else
                {?>

                    <tr>
                        <th>Lunes  <th class="diaS"><?php echo substr($lunes,8)?></th></th>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "00:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "01:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "02:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "03:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "04:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "05:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "06:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "07:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "08:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "09:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "10:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "11:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "12:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "13:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "14:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "15:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "16:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "17:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "18:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "19:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "20:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "21:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "22:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "23:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>

                    </tr>

                    <?php
                }
                ?>

                <?php
                //Programacion de los martes
                $fiesta = false;
                $posicion = null;
                foreach ($festivos as $festivo)
                {
                    if($festivo->getFecha()==$martes)
                    {
                        $fiesta = true;
                        $posicion = $festivo;
                    }
                }

                if($fiesta){
                    ?>
                    <tr>
                        <th>Martes <th class="diaS"><?php echo substr($martes,8)?></th>
                        <?php for($x=0; $x<24; $x++){?>
                            <td class="bg-success text-info" style="font-size: x-small"><?php echo $posicion->getMotivo()?></td>
                        <?php } ?>
                    </tr>
                    <?php
                }
                else
                {?>

                    <tr>
                        <th>Martes <th class="diaS"><?php echo substr($martes,8)?></th>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "00:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "01:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "02:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "03:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "04:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "05:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "06:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "07:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "08:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "09:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "10:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "11:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "12:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "13:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "14:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "15:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "16:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "17:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "18:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "19:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "20:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "21:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "22:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "23:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>

                    </tr>

                    <?php
                }
                ?>

                <?php
                //Programacion de los miercoles
                $fiesta = false;
                $posicion = null;
                foreach ($festivos as $festivo)
                {
                    if($festivo->getFecha()==$miercoles)
                    {
                        $fiesta = true;
                        $posicion = $festivo;

                    }
                }

                if($fiesta){
                    ?>
                    <tr>
                        <th>Miercoles <th class="diaS"><?php echo substr($miercoles,8)?></th>
                        <?php for($x=0; $x<24; $x++){?>
                            <td class="bg-success text-info" style="font-size: x-small"><?php echo $posicion->getMotivo()?></td>
                        <?php } ?>
                    </tr>
                    <?php
                }
                else
                {?>

                    <tr>
                        <th>Miércoles <th class="diaS"><?php echo substr($miercoles,8)?></th>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "00:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "01:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "02:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "03:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "04:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "05:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "06:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "07:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "08:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "09:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "10:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "11:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "12:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "13:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "14:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "15:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "16:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "17:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "18:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "19:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "20:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "21:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "22:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "23:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>

                    </tr>

                    <?php
                }
                ?>

                <?php
                //Programacion de los jueves
                $fiesta = false;
                $posicion = null;
                foreach ($festivos as $festivo)
                {
                    if($festivo->getFecha()==$jueves)
                    {
                        $fiesta = true;
                        $posicion = $festivo;

                    }
                }

                if($fiesta){
                    ?>
                    <tr>
                        <th>Jueves <th class="diaS"><?php echo substr($jueves,8)?></th>
                        <?php for($x=0; $x<24; $x++){?>
                            <td class="bg-success text-info" style="font-size: x-small"><?php echo $posicion->getMotivo()?></td>
                        <?php } ?>
                    </tr>
                    <?php
                }
                else
                {?>

                    <tr>
                        <th>Jueves <th class="diaS"><?php echo substr($jueves,8)?></th>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "00:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "01:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "02:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "03:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "04:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "05:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "06:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "07:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "08:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "09:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "10:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "11:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "12:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "13:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "14:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "15:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "16:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "17:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "18:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "19:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "20:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "21:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "22:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "23:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>

                    </tr>

                    <?php
                }
                ?>

                <?php
                //Programacion de los viernes
                $fiesta = false;
                $posicion = null;
                foreach ($festivos as $festivo)
                {
                    if($festivo->getFecha()==$viernes)
                    {
                        $fiesta = true;
                        $posicion = $festivo;
                    }
                }

                if($fiesta){
                    ?>
                    <tr>
                        <th>Viernes <th class="diaS"><?php echo substr($viernes,8)?></th>
                        <?php for($x=0; $x<24; $x++){?>
                            <td class="bg-success text-info" style="font-size: x-small"><?php echo $posicion->getMotivo()?></td>
                        <?php } ?>
                    </tr>
                    <?php
                }
                else
                {?>

                    <tr>
                        <th>Viernes <th class="diaS"><?php echo substr($viernes,8)?></th>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "00:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "01:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "02:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "03:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "04:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "05:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "06:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "07:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "08:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "09:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "10:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "11:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "12:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "13:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "14:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "15:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "16:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "17:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "18:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "19:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "20:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "21:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "22:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "23:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>

                    </tr>

                    <?php
                }
                ?>

                <?php
                //Programacion de los sabados
                $fiesta = false;
                $posicion = null;
                foreach ($festivos as $festivo)
                {
                    if($festivo->getFecha()==$sabado)
                    {
                        $fiesta = true;
                        $posicion = $festivo;
                    }
                }

                if($fiesta){
                    ?>
                    <tr>
                        <th>Sabado <th class="diaS"><?php echo substr($sabado,8)?></th>
                        <?php for($x=0; $x<24; $x++){?>
                            <td class="bg-success text-info" style="font-size: x-small"><?php echo $posicion->getMotivo()?></td>
                        <?php } ?>
                    </tr>
                    <?php
                }
                else
                {?>

                    <tr>
                        <th>Sábado <th class="diaS"><?php echo substr($sabado,8)?></th>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "00:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "01:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "02:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "03:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "04:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "05:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "06:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "07:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "08:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "09:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "10:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "11:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "12:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "13:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "14:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "15:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "16:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "17:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "18:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "19:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "20:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "21:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "22:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "23:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>

                    </tr>

                    <?php
                }
                ?>

                <?php
                //Programacion de los domingos
                $fiesta = false;
                $posicion = null;
                foreach ($festivos as $festivo)
                {
                    if($festivo->getFecha()==$domingo)
                    {
                        $fiesta = true;
                        $posicion = $festivo;
                    }
                }

                if($fiesta){
                    ?>
                    <tr>
                        <th>Domingo <th class="diaS"><?php echo substr($domingo,8)?></th>
                        <?php for($x=0; $x<24; $x++){?>
                            <td class="bg-success text-info" style="font-size: x-small"><?php echo $posicion->getMotivo()?></td>
                        <?php } ?>
                    </tr>
                    <?php
                }
                else
                {?>

                    <tr>
                        <th>Domingo <th class="diaS"><?php echo substr($domingo,8)?></th>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "00:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "01:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "02:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "03:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "04:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "05:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "06:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "07:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "08:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "09:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "10:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "11:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "12:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "13:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "14:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "15:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "16:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "17:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "18:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "19:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "20:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "21:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "22:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>
                        <td><?php
                            $encontrado = false;
                            foreach ($horariosFranjas as $hora)
                            {
                                if ($hora->getFranja()->getHoraInicio() == "23:00:00")
                                {
                                    echo "X";
                                    $encontrado = true;
                                }
                            }
                            if (!$encontrado)
                            {
                                echo "-";
                            }
                            ?></td>

                    </tr>

                    <?php
                }
                ?>
            </table>
        </div>
    <?php

        require_once __DIR__.'/../Plantilla/pie.php';
    }
}
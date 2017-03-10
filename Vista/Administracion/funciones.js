/**
 * Created by 2gdwes10 on 7/3/16.
 */
var url="http://192.168.33.10/";

$(document).ready(function(){
    $('#buscar').on("click", function(){
        var dni = $('[name="dni"]').val().toUpperCase();
        $.ajax({
            type: "POST",
            url: url+"himevico/ProyectoFinal15-16/Controlador/Administracion/Router.php",
            cache: false,
            data: { dni:dni }
        }).done(function( respuesta )
        {
            $('#respuesta').html(respuesta);
        });
    })

    $('#buscarg').on("click", function(){
        var dni = $('[name="dni"]').val().toUpperCase();
        $.ajax({
            type: "POST",
            url: url+"himevico/ProyectoFinal15-16/Controlador/Gerencia/Router.php",
            cache: false,
            data: { dni:dni }
        }).done(function( respuesta )
        {
            $('#respuesta').html(respuesta);
        });
    })

    $("#trabajador").change(function() {
        var dni = $('[name="trabajador"]').val().toUpperCase();

        $.ajax
        ({
            type: "POST",
            url: url+"himevico/ProyectoFinal15-16/Controlador/Administracion/Router.php",
            data: {dni:dni,semanas:true},
            cache: false,
            success: function (html) {
                $("#semanas").html(html);
            }
        })
    })

    if(window.location.href.split("/").pop() == "filtroHorarioTrabajador.php"){ //Ibai
        $("#resetFiltros").click(function(a){
            $("#formulario")[0].reset();
            actualizarCentros();
        });
        $.ajax
        ({
            type: "POST",
            url: url+"Controlador/Administracion/Router.php",
            data: {empresas:true},
            cache: false,
            success: function (html) {
                $("#selectEmpresa").html(html);
                actualizarCentros();
                $("#selectEmpresa").change(function() {
                    actualizarCentros();
                })
            }
        })
        $.ajax
        ({
            type: "POST",
            url: url+"Controlador/Administracion/Router.php",
            data: {calendarios:true},
            cache: false,
            success: function (html) {
                $("#selectCalendario").html(html);
            }
        })
        rellenarMeses();
    }
});

function eliminar(parametro){

    $('#contenido table tr').each(function(){
        var variable="false"
        $(this).find("td").each(function(){
           if($(this).text()==parametro){
               variable="true";
           }
        })
        if(variable==false){
            $(this).prop("class","hidden")
        }
    })


}

function seleccionar(){

    if ($('#todos').prop("checked"))
    {
        for (var x = 1; x <= 52; x++) {
            $('#'+x).prop("checked", true);
        }

    }
    else
    {
        for (var x = 1; x <= 52; x++) {
            $('#'+x).prop("checked", false);
        }
    }

}

function actualizarCentros(){ //Ibai
    $.ajax
    ({
        type: "POST",
        url: url+"Controlador/Administracion/Router.php",
        data: {centros:$("#selectEmpresa").val()},
        cache: false,
        success: function (html) {
            $("#selectCentro").html(html);
        }
    })
}

function rellenarMeses(){ //Ibai
    var opciones = "<option value='' disabled  selected='selected'>Elige</option>";
    for(var x=1;x<=12;x++)
        opciones+="<option value="+x+">"+x+"</option>';"
    $("#selectMes").html(opciones);
}

/**
 * Created by Ibai on 7/3/16.
 */
var url="http://192.168.33.10/";


$(document).ready(function(){
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
});

function actualizarCentros(){
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

function resetear(){
    console.log($("#formulario"));
}

function rellenarMeses(){
    var opciones = "<option value='' disabled  selected='selected'>Elige</option>";
    for(var x=1;x<=12;x++)
        opciones+="<option value="+x+">"+x+"</option>';"
    $("#selectMes").html(opciones);
}
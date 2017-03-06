/**
 * Created by Ibai on 7/3/16.
 */
var url="http://192.168.33.10/";

$(document).ready(function(){

     $.ajax
     ({
         type: "POST",
         url: url+"Controlador/Administracion/Router.php",
         data: {empresas:true},
         cache: false,
         success: function (html) {
            $("#divEmpresas").html(html);
             actualizarCentros();
             $("#empresa").change(function() {
                 actualizarCentros();
             })
         }
     })

});

function actualizarCentros(){

    $.ajax
    ({
        type: "POST",
        url: url+"Controlador/Administracion/Router.php",
        data: {centros:true},
        cache: false,
        success: function (html) {
            $("#divEmpresas").html(html);
            actualizarCentros();
            $("#empresa").change(function() {
                actualizarCentros();
            })
        }
    })

    alert($("#empresa").val());
}

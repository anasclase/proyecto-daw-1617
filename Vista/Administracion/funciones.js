/**
 * Created by 2gdwes10 on 7/3/16.
 */
var url="http://192.168.33.10/himevico/ProyectoFinal15-16/";

$(document).ready(function(){


    $('#buscar').on("click", function(){
        var dni = $('[name="dni"]').val().toUpperCase();
        $.ajax({
            type: "POST",
            url: url+"Controlador/Administracion/Router.php",
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
            url: url+"Controlador/Gerencia/Router.php",
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
            url: url+"Controlador/Administracion/Router.php",
            data: {dni:dni,semanas:true},
            cache: false,
            success: function (html) {
                $("#semanas").html(html);
            }
        })
    })
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



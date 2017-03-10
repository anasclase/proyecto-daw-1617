/**
 * Created by Mikel on 2/3/16.
 */

$(document).ready(function(){

    $(document).on("blur","#paquetesEntrada,#paquetesSalida",function(e){
        if($("#paquetesEntrada").val()!=""&&$("#paquetesSalida").val()!=""){
            $("#paquetesTotal").val($("#paquetesSalida").val()-$("#paquetesEntrada").val());
        }else{
            $("#paquetesTotal").val("");
        }
    });

});
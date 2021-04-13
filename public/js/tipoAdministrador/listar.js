$(function($) {
    $("[data-toggle=confirmation]").confirmation();
});

function buscar(){
    var busca = $("#busca").val();

    window.location.replace($("#link").val()+"tipoAdministrador/listar/" + busca);        
}

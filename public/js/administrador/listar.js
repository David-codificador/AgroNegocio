function buscar(){
    var busca = $("#busca").val();

    window.location.replace($("#link").val()+"administrador/listar/" + busca);        
}

$(function($) {
    $("[data-toggle=confirmation]").confirmation();
});
function buscar(){
    var busca = $("#busca").val();

    window.location.replace($("#link").val()+"produtos/listar/" + busca);        
}

$(function($) {
    $("[data-toggle=confirmation]").confirmation();
});
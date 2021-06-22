function buscar(){
    var busca = $("#busca").val();

    window.location.replace($("#link").val()+"noticias/listar/" + busca);        
}

$(function($) {
    $("[data-toggle=confirmation]").confirmation();
});
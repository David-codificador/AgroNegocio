$(function($) {
    // For small switches
    var smallElems = Array.prototype.slice.call(document.querySelectorAll(".js-switch-small"));

    smallElems.forEach(function(html) {
      var switchery = new Switchery(html, {
          size: "small"
      });
    });
});

$(".telefone").mask("(00) 0 0000-0000");
$(".cpf").mask("000.000.000-00");
$(".cep").mask("00.000-000");
$(".uf").mask("SS");

function exibirImgPessoa(src){
    $("#tag_exibir_img").attr("src", src);
    $("#exibirImgPessoa").modal();
}

verificaNomeUsuario();

function verificaNomeUsuario(){
    var usuario = $("#usuario").val();
    
    $.ajax({
        type:"post",
        dataType: "json",
        data: {usuario : usuario},
        url: $("#link").val()+"administrador/verificaUsuarioAjax",
        success: function(dados){
            if(dados.status == '1'){
                $("#respostaUsuario").html(dados.msg);
            }else{
                $("#respostaUsuario").html(dados.msg);
                $("#usuario").val("");
                $("#usuario").focus();
            }
        }
    });
}


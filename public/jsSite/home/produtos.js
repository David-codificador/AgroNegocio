window.pagina = 0;
window.quantidade = 8;

function buscarInfo(pagina) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {pagina: pagina, quantidade: window.quantidade},
        url: $("#link").val() + 'produtos/buscarInformacoes',
        beforeSend: function () {
            // $("#carregando").html("<img src='" + $("#recurso").val() + "/imagemSite/loading.gif' id='carregando' class='gif-carregando' />");
        },
        success: function (dados) {
            $("#carregando").html('');

            if (dados.status == 1) {

                var div = '';

                for (var i = 0; dados.retorno.length > i; i++) {
                    div += '<div class="col-xl-3 col-lg-3">';
                    div += '<div class="recent_project_single mrb-30">';
                    div += '<div class="project_img_box">';
                    div += '<img src=' + $("#recurso").val() + "/imagemSite/produtos/" + dados.retorno[i].imagem + ' />';
                    div += '<div class="project_content">';
                    div += '<h3>' + dados.retorno[i].titulo + '</h3>';
                    div += '</div>';
                    div += '<div class="hover_box">';
                    div += '<a ><span class="icon-left-arrow"></span></a>';
                    div += '</div>';
                    div += '</div>';
                    div += '</div>';
                    div += '</div>';
                }
                  
               
               
                $("#info_ajax").append(div);
                         
                $("#mais").show();
                $("#fim_registros").html("");
            } else {
                if (window.pagina == 1) {
                    $("#total-registros").text('0 registros');
                }
                $("#mais").hide();
                $("#carregando").empty();
                $("#fim_registros").html("<h2>" + dados.msg + "</h2>");
            }
        },

        error: function () {
            $("#info_ajax").html('Nosso sistema está passando por instabilidades, aguarde alguns instantes e tente novamente!');
            // alert('Nosso sistema está passando por instabilidades, aguarde alguns instantes e tente novamente!');
        }

    });

}

buscarInfo(++window.pagina);

function detalheProduto(id) {
    
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {id: id},
        url: $("#link").val() + 'produtos/VisualizarAjax',
        beforeSend: function () {
            //$("#resposta_ajax").html("<img src='" + $("#recurso").val() + "/imagemSite/carregando.gif' class='gif-carregando' />");
        },

        success: function (dados) {
            if (dados.status == 1) {
                var div = '';

                div += '<h2>' + dados.retorno.titulo + ' </h2>';
                div += '<p>' + dados.retorno.descricao + ' </p>';

                $("#imagem_produto").html('<img src=' + $("#recurso").val() + "/imagemSite/produtos/" + dados.retorno[i].imagem +'/>');
  
                $("#resposta_ajax").html(div);
            } else {
                $("#resposta_ajax").html('<h1>' + dados.msg + '</h1><a class="btn btn-primary" onclick="buscarInfo(' + id + ')">Tentar Novamente!</a>');

            }
        },
        error: function () {
            $("#tipo_ajax").html("<h1>Nosso sistema está passando por instabilidades, aguarde alguns instantes e tente novamente!</h1><a class='btn btn-primary' onclick='buscarInfo(" + id + ")'>Tentar Novamente!</a>");
        }

    });
}
detalheProduto();
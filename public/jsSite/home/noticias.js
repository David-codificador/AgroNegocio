window.pagina = 0;
window.quantidade = 8;

function buscarInfo(pagina) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {pagina: pagina, quantidade: window.quantidade},
        url: $("#link").val() + 'noticias/listarAjax',
        beforeSend: function () {
            // $("#carregando").html("<img src='" + $("#recurso").val() + "/imagemSite/loading.gif' id='carregando' class='gif-carregando' />");
        },
        success: function (dados) {
            $("#carregando").html('');

            if (dados.status == 1) {

                var div = '';

                for (var i = 0; dados.retorno.length > i; i++) {
                    div += '<div class="col-xl-3 col-lg-3">';
                    div += '<div class="blog_one_single mb-30">';
                    div += '<div class="blog_one_image">';
                    div += '<div class="blog_image">';
                    div += '<img src=' + $("#recurso").val() + "/imagemSite/noticias/" + dados.retorno[i].imagem + ' />';
                    div += '<div class="blog_one_date_box">';
                    div += '<p>' + dados.retorno[i].data_publicacao + '</p>';
                    div += '</div>';
                    div += '</div>';
                    div += ' <div class="blog-one__content">';
                    div += '<h3><a onclick="ver(' + dados.retorno[i].id + ')">' + dados.retorno[i].titulo + '</a></h3>';
                    div += ' <div class="blog_one_text">';
                    div += '</div>';
                    div += '<div class="read_more_btn">';
                    div += '<a onclick="ver(' + dados.retorno[i].id + ')"><i class="fa fa-angle-right"></i>Ver Mais</a>';
                    div += '</div>';
                    div += '</div>';
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

function ver(id) {
    $("#listar").addClass('d-none');
    $("#ver").removeClass('d-none');
    $('html, body').animate({scrollTop: 0}, 800);

    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {id: id},
        url: $("#link").val() + 'noticias/ver',
        beforeSend: function () {
            $("#ver-carregando").html("<img src='" + $("#recurso").val() + "/imagemSite/carregando.gif' class='gif-carregando' />");
        },
        success: function (dados) {
            $("#ver-carregando").html('');
            $("#ver-conteudo").removeClass('d-none');

            if (dados.status == 1) {
                $("#imagem-ver").attr('src', $("#recurso").val() + 'imagemSite/noticias/' + dados.retorno.imagem);
                 $("#data_publicacao-ver").text(dados.retorno.data_publicacao);
                $("#titulo-ver").text(dados.retorno.titulo);
                $("#texto-ver").html(dados.retorno.texto);


                window.history.replaceState('', '', $("#link").val() + 'noticias/visualizar/' + id + '-' + dados.retorno.titulo_formatado);
            } else {
                alert(dados.msg);
                fechar();
            }
        },

        error: function () {
            $("#info_ajax").html('Nosso sistema está passando por instabilidades, aguarde alguns instantes e tente novamente!');
            // alert('Nosso sistema está passando por instabilidades, aguarde alguns instantes e tente novamente!');
        }

    });
}

function fechar() {
    $("#listar").removeClass('d-none');
    $("#ver").addClass('d-none');
    $("#ver-conteudo").addClass('d-none');
}

buscarInfo(++window.pagina);



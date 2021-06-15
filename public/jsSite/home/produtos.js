window.pagina = 0;
window.quantidade = 10;

function buscarInfo(pagina) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {pagina: pagina, quantidade: window.quantidade},
        url: $("#link").val() + 'produtos/buscarInformacoes',
        beforeSend: function () {
            $("#carregando").html("<img src='" + $("#recurso").val() + "/imagem/loading.gif' id='carregando' class='gif-carregando' />");
        },
        success: function (dados) {
            $("#carregando").html('');
            if (dados.status == 1) {
                var div = "";
                for (var i = 0; dados.retorno.length > i; i++) {
//colocar codigo aqui.
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
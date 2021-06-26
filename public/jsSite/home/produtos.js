window.pagina = 0;
window.quantidade = 8;

if($("#id").val() > 0){
    ver($("#id").val());
}

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
                    //usar str_replace ?
                    div += '<a onclick="ver('+ dados.retorno[i].id +')"><span class="icon-left-arrow" style="cursor: pointer !important;"></span></a>';
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

function ver(id){
    $("#listar").addClass('d-none');
    $("#ver").removeClass('d-none');
    $('html, body').animate({scrollTop : 0},800);
        
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {id: id},
        url: $("#link").val() + 'produtos/ver',
        beforeSend: function () {
            $("#ver-carregando").html("<img src='" + $("#recurso").val() + "/imagemSite/carregando.gif' class='gif-carregando' />");
        },
        success: function (dados) {
            $("#ver-carregando").html('');
            $("#ver-conteudo").removeClass('d-none');
            
            if (dados.status == 1) {
                $("#titulo-ver").text(dados.retorno.titulo);
                $("#descricao-ver").html(dados.retorno.descricao);
                $("#imagem-ver").attr('src', $("#recurso").val() + 'imagemSite/produtos/' + dados.retorno.imagem);
                
                window.history.replaceState('', '', $("#link").val() + 'produtos/visualizar/' + id + '-'+dados.retorno.titulo_formatado + '.html');
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

function fechar(){
    $("#listar").removeClass('d-none');
    $("#ver").addClass('d-none');  
    $("#ver-conteudo").addClass('d-none');
    
    $('html, body').animate({scrollTop: 0}, 1);
    window.history.replaceState('', '', $("#link").val() + 'produtos');
}

buscarInfo(++window.pagina);


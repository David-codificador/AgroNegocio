$(function ($) {

    CKEDITOR.replace('texto');
});


function exibirImgNoticias(src) {
    $("#tag_exibir_img").attr("src", src);
    $("#exibirImgNoticias").modal();
}

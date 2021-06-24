function confirmacao(id){
    if(confirm("Deseja apagar esta Imagem da Galeria?")){
        $(window.document.location).attr('href', $("#link").val() + 'galeria/excluir/' + id);
    }
}
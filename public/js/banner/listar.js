function confirmacao(id){
    if(confirm("Deseja apagar este Banner?")){
        $(window.document.location).attr('href', $("#link").val() + 'banner/excluir/' + id);
    }
}
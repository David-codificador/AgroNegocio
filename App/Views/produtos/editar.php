<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Edição de Produto</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= LINK ?>home/painelAdministrador"><i class="fa fa-home"></i> Início</a></li>
                    <li><a href="<?= LINK ?>produtos">Produto</a></li>
                    <li class="active">Editar</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">
                            <form action="<?= LINK ?>produtos/salvar" method="post" class="p-20">
                                <input type="hidden" name="produtos" id="produtos" value="<?= $viewVar['item']['id'] ?>" required>

                                <h5 class="underline mt-n">Informações</h5>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                             <img src="<?= IMAGEMSITE ?>produtos/<?= $viewVar['item']['imagem'] != '' ? $viewVar['item']['imagem'] : 'padrao.jpg' ?>" class="img-circle profile-img" width="100%" onclick="exibirImgProduto('<?= IMAGEMSITE ?>produtos/<?= $viewVar['item']['imagem'] != '' ? $viewVar['item']['imagem'] : 'padrao.jpg' ?>')">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="titulo">Título<sup class="color-danger">*</sup></label>
                                                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo da Obra" maxlength="50" value="<?= $viewVar['item']['titulo'] ?>">
                                            </div>
                                        </div>                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="descricao">Descrição</label>
                                                <textarea class="form-control" id="descricao" name="descricao" placeholder="Descrição"><?= $viewVar['item']['descricao'] ?></textarea>
                                            </div>
                                        </div>  
                                    </div>                                                                      
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-group pull-right mt-10" role="group">
                                            <a href="<?= LINK ?>produtos/listar/<?= $viewVar['item']['id'] ?>" class="btn bg-gray btn-wide"><i class="fa fa-mail-reply"></i>Voltar</a>
                                            <button type="submit" class="btn bg-black btn-wide"><i class="fa fa-arrow-right"></i>Salvar</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="right-sidebar bg-white fixed-sidebar">
    <div class="sidebar-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4>Ajuda da página<i class="fa fa-times close-icon"></i></h4>
                    <p>
                        A tela de edição é usada para editar as informações da obras exibida.<br><br>
                        <b>Os campos disponíveis são:</b><br>
                        <i class="fa fa-check"></i> Nome - Nome da obras;<br>
                        <i class="fa fa-check"></i> Status - Status ativo ou inativo de obras.
                        <br><br>
                        <b>Os campos obrigatórios são:</b><br>
                        <i class="fa fa-check"></i> Nome - Com um limite de 200 caracteres;<br>
                        <i class="fa fa-check"></i> Status - Selecionado(Ativo) ou não selecionado(Inativo).
                        <br><br>
                        O botão "Voltar" da acesso a tela de visualizar informações da obras exibida.<br>
                        O botão "Salvar" é usado para salvar as informações relativas a obras exibida.
                        <br><br>
                        *Ao salvar a edição não é possível reverter o processo.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exibirImgProduto" tabindex="-1" role="dialog" aria-labelledby="exibirImgProduto">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img id="tag_exibir_img" src="" style="width: 60%; margin: auto !important">
                </center>
                <br>
                <form action="<?= LINK ?>produtos/editarImagem" method="post" id="uploadImagem" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $viewVar['item']["id"] ?>" required />
                    <input type="file" name="imagem" class="form-control" onchange="$('#uploadImagem').submit()" required/>
                </form>
                <br>
                <p>Basta selecionar a imagem que ela será enviada automaticamente</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

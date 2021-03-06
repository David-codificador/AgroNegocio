<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Minhas Informações</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= LINK ?>administrador"><i class="fa fa-home"></i> Início</a></li>
                    <li><a href="<?= LINK ?>administrador">Administrador</a></li>
                    <li class="active">Minhas Informações</li>
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
                            <form action="<?= LINK ?>administrador/salvarMinhasInformacoes" method="post" class="p-20">
                                <input type="hidden" name="id" id="administrador" value="<?= $Sessao::getAdministrador('id') ?>" required>
                                <h5 class="underline mt-n">Informações</h5>

                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="<?= IMAGEM ?>administrador/<?= $Sessao::getAdministrador('foto') != '' ? $Sessao::getAdministrador('foto') : 'padrao.jpg' ?>" class="img-circle profile-img" width="100%" onclick="exibirImgPessoa('<?= IMAGEM ?>administrador/<?= $Sessao::getAdministrador('foto') != '' ? $Sessao::getAdministrador('foto') : 'padrao.jpg' ?>')">
                                    </div>

                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="nome">Nome <sup class="color-danger">*</sup></label>
                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" maxlength="60" value="<?= $Sessao::getAdministrador("nome") ?>" required>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefone">Telefone</label>
                                            <input type="text" class="form-control telefone" id="telefone" name="telefone" placeholder="(00) 0 0000-0000" maxlength="45" value="<?= $Sessao::getAdministrador("telefone") ?>">
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" maxlength="200" value="<?= $Sessao::getAdministrador("email") ?>">
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="usuario">Usuário <sup class="color-danger">*</sup></label>
                                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" maxlength="30" value="<?=$Sessao::getAdministrador("usuario")?>" onchange="verificaNomeUsuario()" required>
                                            <span id="respostaUsuario"></span>
                                        </div>
                                    </div>                                   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="senha">Senha <sup class="color-danger">*</sup></label>
                                            <input type="password" class="form-control" id="senha" name="senha" placeholder="******" minlength="5" maxlength="30">
                                            <span class="help-block text-right">Para editar informe a nova senha</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        Tipo: <?= $Sessao::getAdministrador('tipo') ?>
                                    </div>
                                    <div class="col-md-6">
                                        Administrador <?= $this->status($Sessao::getAdministrador('status')) ?>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="btn-group pull-right mt-10" role="group">
                                            <a href="<?= LINK ?>administrador/<?= $Sessao::getAdministrador('id') ?>" class="btn bg-gray btn-wide"><i class="fa fa-mail-reply"></i>Voltar</a>
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
                        A tela de minhas informações é usada para editar as suas informações administradoris.<br><br>
                        <b>Os campos disponíveis são:</b><br>
                        <i class="fa fa-check"></i> Nome - Nome da administrador;<br>
                        <i class="fa fa-check"></i> Status - Status ativo ou inativo de administrador.
                        <br><br>
                        <b>Os campos obrigatórios são:</b><br>
                        <i class="fa fa-check"></i> Nome - Com um limite de 200 caracteres;<br>
                        <i class="fa fa-check"></i> Status - Selecionado(Ativo) ou não selecionado(Inativo).
                        <br><br>
                        O botão "Voltar" da acesso a tela de visualizar informações da administrador exibida.<br>
                        O botão "Salvar" é usado para salvar as informações relativas a administrador exibida.
                        <br><br>
                        *Ao salvar a edição não é possível reverter o processo.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exibirImgPessoa" tabindex="-1" role="dialog" aria-labelledby="exibirImgPessoa">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img id="tag_exibir_img" src="" style="width: 60%; margin: auto !important">
                </center>
                <br>
                <form action="<?= LINK ?>administrador/uploadFoto" method="post" id="uploadFoto" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $Sessao::getAdministrador("id") ?>" required />
                    <input type="file" name="foto" class="form-control" onchange="$('#uploadFoto').submit()" required/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Listagem de Tipo de Administrador</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= LINK ?>administrador"><i class="fa fa-home"></i> Início</a></li>
                    <li><a href="<?= LINK ?>tipoAdministrador">Tipo de Administrador</a></li>
                    <li class="active">Listar</li>
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
                            <table class="table table-hover">
                                <div class="row ">
                                    <div class="form-group col-sm-12 col-md-8">
                                        <h4><?= $viewVar['paginacao']['quanTipoAdministrador'] ?> Registro<?= $viewVar['paginacao']['quanTipoAdministrador'] == 1 ? '' : 's' ?></h4>
                                        <a href="<?= LINK ?>tipoAdministrador/cadastro" class="btn btn-sm btn-primary">Novo</a>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <div class="input-group pt-3">
                                           <input type="busca" class="form-control" id="busca" placeholder="Digite sua busca" autocomplete="off">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button" onclick="buscar()">Buscar</button>
                                            </span>
                                            <?= $viewVar['paginacao']['busca'] != '' ? 'Dados da busca: ' . $viewVar['paginacao']['busca'] . ' [<a href="' . LINK . 'tipoAdministrador/listar">Limpar</a>]' : '' ?>
                                        </div>
                                    </div>
                                </div>
                                <thead>
                                    <tr>
                                        <th style="width: 80%">Descrição</th>
                                        <th style="width: 10%">Status</th>
                                        <th style="width: 10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($viewVar['tipoAdministrador'] as $item) {
                                        ?>
                                        <tr>
                                            <td><a href="<?= LINK ?>tipoAdministrador/visualizar/<?= $item->getid() ?>"><?= $item->getTipo() ?></a></td>
                                            <td><?= $this->status($item->getStatus()) ?></td>
                                            <td>
                                                <div class="dropdown pull-right">
                                                    <button class="btn btn-default dropdown-toggle" type="button" id="menu<?= $item->getid() ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <i class="fa fa-bars"></i>
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu btn_listar" aria-labelledby="menu<?= $item->getid() ?>">
                                                        <li class="dropdown-header">Opções</li>
                                                        <li><a href="<?= LINK ?>tipoAdministrador/visualizar/<?= $item->getid() ?>"><i class="fa fa-search"></i> Visualizar</a></li>
                                                        <li><a href="<?= LINK ?>tipoAdministrador/editar/<?= $item->getid() ?>"><i class="fa fa-edit"></i> Editar</a></li>
                                                        <li><a href="<?= LINK ?>tipoAdministrador/excluir/<?= $item->getid() ?>/0" data-toggle="confirmation" data-placement="top" data-btn-ok-label="Excluir" data-btn-ok-icon="glyphicon glyphicon-share-alt" data-btn-ok-class="btn-success" data-btn-cancel-label="Cancelar" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-btn-cancel-class="btn-danger" data-title="Confirmação" data-content="Apagar <?= $item->getTipo() ?>?"><i class="fa fa-trash-o color-danger"></i> Excluir</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            $pagina = $viewVar['paginacao']['pagina'];
                            $total = $viewVar['paginacao']['quanPaginas'];
                            $i = $viewVar['paginacao']['inicio'];
                            $fim = $viewVar['paginacao']['fim'];
                            ?>
                            <nav class="text-right">
                                <ul class="pagination">
                                    <li class="<?php
                                    if ($pagina == 1) {
                                        echo 'disabled';
                                    }
                                    ?>">
                                        <a <?php
                                    if ($pagina != 1) {
                                        echo 'href="' . LINK . 'tipoAdministrador/listar/' . $viewVar['paginacao']['anterior'] . '/' . $viewVar["paginacao"]["busca"] . '"';
                                    }
                                    ?> aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php
                                        for ($i; $i < $fim; $i++) {
                                            ?>
                                        <li class="<?php
                                            if ($pagina == $i + 1) {
                                                echo('active');
                                            }
                                            ?>"><a href="<?= LINK ?>tipoAdministrador/listar/<?= $i + 1 ?>/<?= $viewVar['paginacao']['busca'] ?>"><?= str_pad($i + 1, 2, "0", STR_PAD_LEFT); ?></a></li>
                                            <?php
                                        }
                                        ?>
                                    <li class="<?php
                                            if ($pagina == $total or $fim == 0) {
                                                echo 'disabled';
                                            }
                                        ?>">
                                        <a <?php
                                            if ($pagina != $total and $fim != 0) {
                                                echo 'href="' . LINK . 'tipoAdministrador/listar/' . $viewVar['paginacao']['proxima'] . '/' . $viewVar["paginacao"]["busca"] . '"';
                                            }
                                        ?> aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>   
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
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function buscar() {
        var busca = $("#busca").val();

        window.location.replace($("#link").val() + 'tipoAdministrador/listar/' + busca);
    }
</script> 
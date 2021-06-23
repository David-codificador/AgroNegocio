<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\Entidades\Canvas;

class NoticiasController extends Controller {

    public function index() {
        $css = null;
        $js = null;

        $bo = new \App\Models\BO\NoticiasBO();

        $condicao = "";
        $valorCondicao = [];

        $noticias = $bo->listarVetor(\App\Models\Entidades\Noticias::TABELA['nome'], ["*"], 5, null, $condicao, $valorCondicao);
        $this->setViewParam('noticias', $noticias);


        $this->render("home/noticias", "Notícias", $css, $js, 3);
    }

    public function visualizar() {
        $css = null;
        $js = null;

        $this->redirect('noticias');
    }

    public function ver() {

        $id = $_POST['id'];
        if (is_numeric($id) and $id > 0) {
            $bo = new \App\Models\BO\NoticiasBO();

            $tabela = \App\Models\Entidades\Noticias::TABELA['nome'];

            $resultado = $bo->selecionarVetor($tabela, ['*', "date_format(data_publicacao, '%d-%m-%Y') as data_publicacao"], 'id = ?', [$id], '');

            if ($resultado) {
                $resultado['titulo_formatado'] = $this->remover_caracter($resultado['titulo']);

                $retorno = [
                    'status' => 1,
                    'retorno' => $resultado
                ];
            } else {
                $retorno = [
                    'status' => 0,
                    'msg' => 'Notícia não encontrada!'
                ];
            }
        } else {
            $retorno = [
                'status' => 0,
                'msg' => 'Parametro incorreto!'
            ];
        }

        echo json_encode($retorno);
        exit();
    }

    public function listarAjax() {

        $quantidade = $_POST['quantidade'];
        $p = $_POST['pagina'];

        //Formata o número inicial da páginação
        $pagina = $p * $quantidade - $quantidade;


        $bo = new \App\Models\BO\NoticiasBO();

        $tabela = \App\Models\Entidades\Noticias::TABELA['nome'];
        //Execulta a listagem dos registros
        $resultado = $bo->listarVetor($tabela, ["*", "date_format(data_publicacao, '%d-%m-%Y') as data_publicacao"], $quantidade, $pagina, null, [], "");


        if ($resultado) {
            $retorno = [
                'status' => 1,
                'msg' => '',
                'retorno' => $resultado
            ];
        } else {
            $retorno = [
                'status' => 0,
                'msg' => 'Fim dos registros!'
            ];
        }

        echo json_encode($retorno);
        exit();
    }

    public function cadastro() {
        $this->validaAdministrador();
        $this->nivelAcesso(6);

        $css = '';
        $js = '<script src="' . JSTEMPLATE . 'ckeditor/ckeditor.js"></script>';


        $this->render("noticias/cadastro", "Cadastro de Notícias", $css, $js, 1);
        Sessao::limpaFormulario();
    }

    public function inserir() {
        $this->validaAdministrador();
        $this->nivelAcesso(6);

        $bo = new \App\Models\BO\NoticiasBO();
        $vetor = $_POST;
        $dados = array();
        $campus = \App\Models\Entidades\Noticias::CAMPOS;

        Sessao::gravaFormulario($vetor);

        foreach ($vetor as $indice => $valor) {
            if (in_array($indice, $campus)) {
                if ($vetor[$indice] == '') {
                    $dados[$indice] = "null";
                } else {
                    $dados[$indice] = $vetor[$indice];
                }
            }
        }

        $dados['data_publicacao'] = date("Y-m-d H:i:s");
        $dados['administrador_id'] = Sessao::getAdministrador('id');

        if ($_FILES["imagem"]["name"] != "") {
            $tmp_nome = $_FILES["imagem"]['tmp_name'];
            $nome_envio = $_FILES["imagem"]['name'];

            $ext = strtolower(strrchr($nome_envio, "."));

            $nome = date('d_m_Y_h_i_s') . "_" . rand(111, 999) . $ext;

            //Fazer o Upload
            move_uploaded_file($tmp_nome, './public/imagemSite/noticias/' . $nome);
            if (file_exists('./public/imagemSite/noticias/' . $nome)) {

                $img = new Canvas();

                $img->carrega('./public/imagemSite/noticias/' . $nome)
                        ->hexa('#FFFFFF')
                        ->redimensiona(770, 427, 'preenchimento')
                        ->grava('./public/imagemSite/noticias/' . $nome, 80);

                $dados['imagem'] = $nome;
            } else {
                Sessao::gravaMensagem("Falha ao enviar foto", "Imagem não enviada", 2);
                $this->redirect('noticias/cadastro');
            }
        } else {
            Sessao::gravaMensagem("Erro", "Selecione uma imagem", 3);
            $this->redirect('noticias/cadastro');
        }


        $id = $bo->inserir(\App\Models\Entidades\Noticias::TABELA['nome'], $dados, \App\Models\Entidades\Noticias::CAMPOSINFO);

        if ($id == FALSE) {
            if (!Sessao::existeMensagem()) {
                Sessao::gravaMensagem("Falha", "Verifique todos os campos e tente novamente", 2);
            }

            $this->redirect('noticias/cadastro');
        } else {

            unset($dados['data_publicacao']);
            unset($dados['administrador_id']);
            unset($dados['imagem']);

            $x = '';
            foreach ($dados as $indice => $value) {
                if ($value != "null") {
                    $x .= "campo " . \App\Models\Entidades\Noticias::CAMPOSINFO[$indice]['descricao'] . ": " . $value . "<br>";
                }
            }
            $x .= '<img src="' . IMAGEMSITE . 'noticias/' . $nome . '" style="width: 100%">';

            $info = [
                'tipo' => 1,
                'administrador' => Sessao::getAdministrador('id'),
                'campos' => $x,
                'tabela' => \App\Models\Entidades\Noticias::TABELA['descricao'],
                'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou o cadastro de um nova Notícia.'
            ];

            $this->inserirAuditoria($info);

            Sessao::limpaFormulario();
            Sessao::gravaMensagem("Sucesso", "Notícia inserida!", 1);

            $this->redirect('noticias/listar');
        }
    }

    public function listar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(6);

        $css = '';
        $js = '<script src="' . JSTEMPLATE . 'bootstrap-confirmation/bootstrap-confirmation.min.js"></script>';

        $bo = new \App\Models\BO\NoticiasBO();

        if (!isset($parametro[0]) or!is_numeric($parametro[0])) {
            //Caso não seja o usuário é redireciona para a tela de listagem na página 1 com os parametros de busca caso exista
            $this->redirect('noticias/listar/1/' . (isset($parametro[0]) ? $parametro[0] : ''));
        }


        $p = (isset($parametro[0]) or is_numeric($parametro[0])) ? $parametro[0] : 1;
        $busca = (isset($parametro[1])) ? $parametro[1] : null;

        $quantidade = 10;
        $pagina = $p * $quantidade - $quantidade;

        $condicao = "";
        $valoresCondicao = [];

        if ($busca) {
            $condicao .= " titulo like '%?%'";
            array_push($valoresCondicao, "$busca");
        }

        $orderBy = "id desc";

        $tabela = \App\Models\Entidades\Noticias::TABELA['nome'];

        $resultado = $bo->listarVetor($tabela, ["*"], $quantidade, $pagina, $condicao, $valoresCondicao, $orderBy);

        $this->setViewParam('noticias', $resultado);

        $quanNoticias = $bo->selecionar($tabela, ["count(id) as id"], $condicao, $valoresCondicao, $orderBy);

        $quanPaginas = ceil($quanNoticias->getId() / $quantidade);

        if ($p > $quanPaginas and $p != 1) {
            Sessao::gravaMensagem("Falha", "Página não encontrada", 2);
            $this->redirect('noticias/listar');
        }

        if ($p < 5) {
            $i = 0;
            $fim = $quanPaginas < 5 ? $quanPaginas : 5;
        } else {
            if ($p < $quanPaginas - 2) {
                $i = $p - 3;
                $fim = $p + 2;
            } else {
                $i = $quanPaginas - 5;
                $fim = $quanPaginas;
            }
        }

        $paginacao = array(
            'quanNoticias' => $quanNoticias->getId(),
            'quanPaginas' => $quanPaginas,
            'inicio' => $i,
            'fim' => $fim,
            'pagina' => $p,
            'anterior' => $p - 1,
            'proxima' => $p + 1,
            'busca' => $busca
        );

        $this->setViewParam('paginacao', $paginacao);

        if ($quanNoticias->getId() < 1) {
            Sessao::gravaMensagem('', 'Nenhum registro encontrado!', 2);
        }

        $this->render('noticias/listar', "Listagem de Noticias", $css, $js, 1);
    }

    public function excluir($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(6);

        $id = $parametro[0];

        if (is_numeric($id)) {
            $bo = new \App\Models\BO\NoticiasBO();
            $tabela = \App\Models\Entidades\Noticias::TABELA['nome'];

            $resposta = $bo->excluir($tabela, "id = ?", [$id], 1);

            if ($resposta) {
                unlink('./public/imagemSite/noticias/' . $resposta['imagem']);

                Sessao::gravaMensagem("Sucesso", "Notícia Excluida", 1);

                $info = [
                    'tipo' => 3,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => "-",
                    'tabela' => \App\Models\Entidades\Noticias::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a exclusão de uma Notícia.'
                ];

                $this->inserirAuditoria($info);
            } else {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem("Falha", "Notícia não excluida", 2);
                }
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('noticias/listar');
    }

    public function editar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(6);

        $id = $parametro[0];

        if (is_numeric($id)) {

            $bo = new \App\Models\BO\NoticiasBO();
            $noticias = $bo->selecionarVetor(\App\Models\Entidades\Noticias::TABELA['nome'], ['*'], "id = ?", [$id], null);

            if ($noticias) {

                $css = '';
                $js = '<script src="' . JSTEMPLATE . 'ckeditor/ckeditor.js"></script>';



                $this->setViewParam('item', $noticias);

                $this->render('noticias/editar', $css, $js, 1);
            } else {
                Sessao::gravaMensagem("Falha", "Notícia não encontrada", 2);
                $this->redirect('noticias/listar');
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
            $this->redirect('noticias/listar');
        }
    }

    public function editarImagem() {
        $this->validaAdministrador();
        $this->nivelAcesso(6);
        $id = $_POST['id'];

        if (is_numeric($id)) {
            if ($_FILES["imagem"]["name"] != "") {
                $tmp_nome = $_FILES["imagem"]['tmp_name'];
                $nome_envio = $_FILES["imagem"]['name'];

                $ext = strtolower(strrchr($nome_envio, "."));

                $nome = date('d_m_Y_h_i_s') . "_" . rand(111, 999) . $ext;

                //Fazer o Upload
                move_uploaded_file($tmp_nome, './public/imagemSite/noticias/' . $nome);
                if (file_exists('./public/imagemSite/noticias/' . $nome)) {

                    $img = new Canvas();

                    $img->carrega('./public/imagemSite/noticias/' . $nome)
                            ->hexa('#FFFFFF')
                            ->redimensiona(370, 484, 'preenchimento')
                            ->grava('./public/imagemSite/noticias/' . $nome, 80);

                    $dados['imagem'] = $nome;
                } else {
                    Sessao::gravaMensagem("Falha ao enviar foto", "Imagem não enviada", 2);
                    $this->redirect('noticias/editar/' . $id);
                }
            } else {
                Sessao::gravaMensagem("Falha", "Imagem não selecionado", 2);
                $this->redirect('noticias/editar/' . $id);
            }

            $bo = new \App\Models\BO\NoticiasBO();

            $resultado = $bo->editar(\App\Models\Entidades\Noticias::TABELA['nome'], $dados, "id = ?", [$id], 1, \App\Models\Entidades\Noticias::CAMPOSINFO);

            if (Sessao::existeMensagem() or $resultado == FALSE) {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem("Falha", "Imagem não editada", 2);
                }

                unlink('./public/imagemSite/noticias/' . $nome);

                $this->redirect('noticias/editar/' . $id);
            } else {
                $x = "campo " . \App\Models\Entidades\Noticias::CAMPOSINFO["imagem"]['descricao'] . ' editado de:<br><img src="' . IMAGEMSITE . 'noticias/' . $resultado["imagem"] . '" /><br>para:<br><img src="' . IMAGEMSITE . 'noticias/' . $nome . '" /><br>';

                $info = [
                    'tipo' => 2,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => $x,
                    'tabela' => \App\Models\Entidades\Noticias::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a edição da imagem da Noticia ' . $resultado['titulo']
                ];

                $this->inserirAuditoria($info);

                Sessao::gravaMensagem("Sucesso", "Imagem da Notícia " . $resultado['titulo'] . ", editado", 1);

                $this->redirect('noticias/editar/' . $id);
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('noticias/listar');
    }

    public function salvar() {
        $this->validaAdministrador();
        $this->nivelAcesso(6);
        $id = $_POST['noticias'];

        if (is_numeric($id)) {
            $bo = new \App\Models\BO\NoticiasBO();

            $vetor = $_POST;

            $dados = array();
            $campus = \App\Models\Entidades\Noticias::CAMPOS;

            foreach ($vetor as $indice => $valor) {
                if (in_array($indice, $campus)) {
                    if ($vetor[$indice] == '') {
                        $dados[$indice] = "null";
                    } else {
                        $dados[$indice] = $vetor[$indice];
                    }
                }
            }

            $resultado = $bo->editar(\App\Models\Entidades\Noticias::TABELA['nome'], $dados, "id = ?", [$id], 1, \App\Models\Entidades\Noticias::CAMPOSINFO);
            //Verificar o porque de não entrar nesse if 
            if (Sessao::existeMensagem() or $resultado == FALSE) {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem($vetor['titulo'], "Notícia sem edição", 2);
                }

                $this->redirect('noticias/listar');
            } else {

                $x = '';

                foreach ($dados as $indice => $value) {
                    if ($value == 'null') {
                        $value = '';
                    }

                    if ($resultado[$indice] != $value) {
                        $x .= "campo " . \App\Models\Entidades\Noticias::CAMPOSINFO[$indice]['descricao'] . ' editado de: "' . $resultado[$indice] . '" para "' . $value . '"<br>';
                    }
                }

                $info = [
                    'tipo' => 2,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => $x,
                    'tabela' => \App\Models\Entidades\Noticias::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a edição das informações de uma Notícia'
                ];

                $this->inserirAuditoria($info);

                Sessao::gravaMensagem("Sucesso", "Notícia " . $resultado['titulo'] . ", editada", 1);

                $this->redirect('noticias/listar');
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('noticias/listar');
    }

}

<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\Entidades\Canvas;

class ProdutosController extends Controller {

    public function index() {
        $css = null;
        $js = null;

        $this->render("home/produtos", "Produtos", $css, $js, 3);
    }

    public function buscarInformacoes() {

        $quantidade = $_POST['quantidade'];
        $p = $_POST['pagina'];

        //Formata o número inicial da páginação
        $pagina = $p * $quantidade - $quantidade;


        $bo = new \App\Models\BO\ProdutosBO();

        $tabela = \App\Models\Entidades\Produtos::TABELA['nome'];
        //Execulta a listagem dos registros
        $resultado = $bo->listarVetor($tabela, ["*"], $quantidade, $pagina, null, [], "");


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

    public function detalhesproduto($parametro) {
        $css = null;
        $js = null;

        $id = $parametro[0];
        $bo = new \App\Models\BO\ProdutosBO();

        $item = $bo->selecionarVetor(\App\Models\Entidades\Produtos::TABELA['nome'], ['*'], 'id = ?', [$id], '');
        if ($item) {
            //listar produtos.
            $produtos = $bo->listarVetor(\App\Models\Entidades\Produtos::TABELA['nome'], ['*'], 3, null, null, [], "rand()");
            $this->setViewParam('produtos', $produtos);

            $this->setViewParam("item", $item);
            $this->render("home/detalhesproduto", "Detalhes do Produto", $css, $js, 3);
        } else {
            Sessao::gravaMensagemSite("Produto não encontrado");
            $this->redirect("produtos");
        }
    }

    public function cadastro() {
        $this->validaAdministrador();
        $this->nivelAcesso(4);

        $css = '';
        $js = '<script src="' . JSTEMPLATE . 'ckeditor/ckeditor.js"></script>';


        $this->render("produtos/cadastro", "Cadastro de Produtos", $css, $js, 1);
        Sessao::limpaFormulario();
    }

    public function inserir() {
        $this->validaAdministrador();
        $this->nivelAcesso(4);

        $bo = new \App\Models\BO\ProdutosBO();
        $vetor = $_POST;
        $dados = array();
        $campus = \App\Models\Entidades\Produtos::CAMPOS;

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

        $dados['data_cadastro'] = date("Y-m-d H:i:s");
        $dados['administrador_id'] = Sessao::getAdministrador('id');

        if ($_FILES["imagem"]["name"] != "") {
            $tmp_nome = $_FILES["imagem"]['tmp_name'];
            $nome_envio = $_FILES["imagem"]['name'];

            $ext = strtolower(strrchr($nome_envio, "."));

            $nome = date('d_m_Y_h_i_s') . "_" . rand(111, 999) . $ext;

            //Fazer o Upload
            move_uploaded_file($tmp_nome, './public/imagemSite/produtos/' . $nome);
            if (file_exists('./public/imagemSite/produtos/' . $nome)) {

                $img = new Canvas();

                $img->carrega('./public/imagemSite/produtos/' . $nome)
                        ->hexa('#FFFFFF')
                        ->redimensiona(370, 484, 'preenchimento')
                        ->grava('./public/imagemSite/produtos/' . $nome, 80);

                $dados['imagem'] = $nome;
            } else {
                Sessao::gravaMensagem("Falha ao enviar foto", "Imagem não enviada", 2);
                $this->redirect('produtos/cadastro');
            }
        } else {
            Sessao::gravaMensagem("Erro", "Selecione uma imagem", 3);
            $this->redirect('produtos/cadastro');
        }


        $id = $bo->inserir(\App\Models\Entidades\Produtos::TABELA['nome'], $dados, \App\Models\Entidades\Produtos::CAMPOSINFO);

        if ($id == FALSE) {
            if (!Sessao::existeMensagem()) {
                Sessao::gravaMensagem("Falha", "Verifique todos os campos e tente novamente", 2);
            }

            $this->redirect('produtos/cadastro');
        } else {

            unset($dados['data_cadastro']);
            unset($dados['administrador_id']);
            unset($dados['imagem']);

            $x = '';
            foreach ($dados as $indice => $value) {
                if ($value != "null") {
                    $x .= "campo " . \App\Models\Entidades\Produtos::CAMPOSINFO[$indice]['descricao'] . ": " . $value . "<br>";
                }
            }
            $x .= '<img src="' . IMAGEMSITE . 'produtos/' . $nome . '" style="width: 100%">';

            $info = [
                'tipo' => 1,
                'administrador' => Sessao::getAdministrador('id'),
                'campos' => $x,
                'tabela' => \App\Models\Entidades\Produtos::TABELA['descricao'],
                'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou o cadastro de um novo Produto.'
            ];

            $this->inserirAuditoria($info);

            Sessao::limpaFormulario();
            Sessao::gravaMensagem("Sucesso", "Produto inserido!", 1);

            $this->redirect('produtos/listar');
        }
    }

    public function listar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(4);

        $css = '';
        $js = '<script src="' . JSTEMPLATE . 'bootstrap-confirmation/bootstrap-confirmation.min.js"></script>';

        $bo = new \App\Models\BO\ProdutosBO();

        if (!is_numeric($parametro[0])) {
            $this->redirect('produtos/listar/1/' . $parametro[0]);
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

        $tabela = \App\Models\Entidades\Produtos::TABELA['nome'];

        $resultado = $bo->listarVetor($tabela, ["*"], $quantidade, $pagina, $condicao, $valoresCondicao, $orderBy);

        $this->setViewParam('produtos', $resultado);

        $quanProdutos = $bo->selecionar($tabela, ["count(id) as id"], $condicao, $valoresCondicao, $orderBy);

        $quanPaginas = ceil($quanProdutos->getId() / $quantidade);

        if ($p > $quanPaginas and $p != 1) {
            Sessao::gravaMensagem("Falha", "Página não encontrada", 2);
            $this->redirect('produtos/listar');
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
            'quanProdutos' => $quanProdutos->getId(),
            'quanPaginas' => $quanPaginas,
            'inicio' => $i,
            'fim' => $fim,
            'pagina' => $p,
            'anterior' => $p - 1,
            'proxima' => $p + 1,
            'busca' => $busca
        );

        $this->setViewParam('paginacao', $paginacao);

        if ($quanProdutos->getId() < 1) {
            Sessao::gravaMensagem('', 'Nenhum registro encontrado!', 2);
        }

        $this->render('produtos/listar', "Listagem de Produtos", $css, $js, 1);
    }

    public function excluir($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(4);

        $id = $parametro[0];

        if (is_numeric($id)) {
            $bo = new \App\Models\BO\ProdutosBO();
            $tabela = \App\Models\Entidades\Produtos::TABELA['nome'];

            $resposta = $bo->excluir($tabela, "id = ?", [$id], 1);

            if ($resposta) {
                unlink('./public/imagemSite/produtos/' . $resposta['imagem']);

                Sessao::gravaMensagem("Sucesso", "Produto Excluido", 1);

                $info = [
                    'tipo' => 3,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => "-",
                    'tabela' => \App\Models\Entidades\Produtos::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a exclusão de um Podruto.'
                ];

                $this->inserirAuditoria($info);
            } else {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem("Falha", "Produto não excluido", 2);
                }
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('produtos/listar');
    }

    public function editar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(4);

        $id = $parametro[0];

        if (is_numeric($id)) {

            $bo = new \App\Models\BO\ProdutosBO();
            $produtos = $bo->selecionarVetor(\App\Models\Entidades\Produtos::TABELA['nome'], ['*'], "id = ?", [$id], null);

            if ($produtos) {

                $css = '';
                $js = '<script src="' . JSTEMPLATE . 'ckeditor/ckeditor.js"></script>';



                $this->setViewParam('item', $produtos);

                $this->render('produtos/editar', $css, $js, 1);
            } else {
                Sessao::gravaMensagem("Falha", "Produto não encontrada", 2);
                $this->redirect('produtos/listar');
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
            $this->redirect('produtos/listar');
        }
    }

    public function editarImagem() {
        $this->validaAdministrador();
        $this->nivelAcesso(4);
        $id = $_POST['id'];

        if (is_numeric($id)) {
            if ($_FILES["imagem"]["name"] != "") {
                $tmp_nome = $_FILES["imagem"]['tmp_name'];
                $nome_envio = $_FILES["imagem"]['name'];

                $ext = strtolower(strrchr($nome_envio, "."));

                $nome = date('d_m_Y_h_i_s') . "_" . rand(111, 999) . $ext;

                //Fazer o Upload
                move_uploaded_file($tmp_nome, './public/imagemSite/produtos/' . $nome);
                if (file_exists('./public/imagemSite/produtos/' . $nome)) {

                    $img = new Canvas();

                    $img->carrega('./public/imagemSite/produtos/' . $nome)
                            ->hexa('#FFFFFF')
                            ->redimensiona(370, 484, 'preenchimento')
                            ->grava('./public/imagemSite/produtos/' . $nome, 80);

                    $dados['imagem'] = $nome;
                } else {
                    Sessao::gravaMensagem("Falha ao enviar foto", "Imagem não enviada", 2);
                    $this->redirect('produtos/editar/' . $id);
                }
            } else {
                Sessao::gravaMensagem("Falha", "Imagem não selecionado", 2);
                $this->redirect('produtos/editar/' . $id);
            }

            $bo = new \App\Models\BO\ProdutosBO();

            $resultado = $bo->editar(\App\Models\Entidades\Produtos::TABELA['nome'], $dados, "id = ?", [$id], 1, \App\Models\Entidades\Produtos::CAMPOSINFO);

            if (Sessao::existeMensagem() or $resultado == FALSE) {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem("Falha", "Imagem não editada", 2);
                }

                unlink('./public/imagemSite/produtos/' . $nome);

                $this->redirect('produtos/editar/' . $id);
            } else {
                $x = "campo " . \App\Models\Entidades\Produtos::CAMPOSINFO["imagem"]['descricao'] . ' editado de:<br><img src="' . IMAGEMSITE . 'produtos/' . $resultado["imagem"] . '" /><br>para:<br><img src="' . IMAGEMSITE . 'produtos/' . $nome . '" /><br>';

                $info = [
                    'tipo' => 2,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => $x,
                    'tabela' => \App\Models\Entidades\Produtos::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a edição da imagem do Produto ' . $resultado['titulo']
                ];

                $this->inserirAuditoria($info);

                Sessao::gravaMensagem("Sucesso", "Imagem do Produto " . $resultado['titulo'] . ", editado", 1);

                $this->redirect('produtos/editar/' . $id);
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('produtos/listar');
    }
    
    public function salvar() {
        $this->validaAdministrador();
        $this->nivelAcesso(4);
        $id = $_POST['produtos'];

        if (is_numeric($id)) {
            $bo = new \App\Models\BO\ProdutosBO();

            $vetor = $_POST;

            $dados = array();
            $campus = \App\Models\Entidades\Produtos::CAMPOS;

            foreach ($vetor as $indice => $valor) {
                if (in_array($indice, $campus)) {
                    if ($vetor[$indice] == '') {
                        $dados[$indice] = "null";
                    } else {
                        $dados[$indice] = $vetor[$indice];
                    }
                }
            }

            $resultado = $bo->editar(\App\Models\Entidades\Produtos::TABELA['nome'], $dados, "id = ?", [$id], 1, \App\Models\Entidades\Produtos::CAMPOSINFO);

            if (Sessao::existeMensagem() or $resultado == FALSE) {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem($vetor['descricao'], "Produto sem edição", 2);
                }

                $this->redirect('produtos/listar');
            } else {
                
                $x = '';

                foreach ($dados as $indice => $value) {
                    if ($value == 'null') {
                        $value = '';
                    }

                    if ($resultado[$indice] != $value) {
                        $x .= "campo " . \App\Models\Entidades\Produtos::CAMPOSINFO[$indice]['descricao'] . ' editado de: "' . $resultado[$indice] . '" para "' . $value . '"<br>';
                    }
                }

                $info = [
                    'tipo' => 2,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => $x,
                    'tabela' => \App\Models\Entidades\Produtos::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a edição das informações de um Produto'
                ];

                $this->inserirAuditoria($info);

                Sessao::gravaMensagem("Sucesso", "Produto " . $resultado['titulo'] . ", editado", 1);

                $this->redirect('produtos/listar');
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('produtos/listar');
    }


}

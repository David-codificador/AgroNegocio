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

    public function detalhesproduto() {
        $css = null;
        $js = null;

        $this->render("home/detalhesproduto", "Detalhes do Produto", $css, $js, 3);
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

            $this->redirect('produtos/cadastro');
        }
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

    public function VisualizarAjax() {
        $id = $_POST['id'];        
        
        if (is_numeric($id)) {


            $bo = new \App\Models\BO\ProdutosBO();

            $item = $bo->selecionarVetor(\App\Models\Entidades\Produtos::TABELA['nome'], ['*'], 'id = ?', [$_POST['id']], '');

            if ($item) {
                $retorno = [
                    'status' => 1,
                    'msg' => 'Produto encontrado!',
                    'retorno' => $item
                ];
            } else {
                $retorno = [
                    'status' => 0,
                    'msg' => 'Produto não encontrado!'
                ];
            }
        } else {
            $retorno = [
                'status' => 0,
                'msg' => 'Parametros Incorretos!'
            ];
        }
        echo json_encode($retorno);
        exit();
    }

}

<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\Entidades\Canvas;

class GaleriaController extends Controller {

    public function index() {
        $css = null;
        $js = null;

        $this->render("home/galeria", "Galeria", $css, $js, 3);
    }

    public function cadastro() {
        $this->validaAdministrador();
        $this->nivelAcesso(7);

        $css = '';
        $js = '';


        $this->render("galeria/cadastro", "Cadastro de Galeria", $css, $js, 1);
        Sessao::limpaFormulario();
    }

    public function inserir() {
        $this->validaAdministrador();
        $this->nivelAcesso(7);

        $bo = new \App\Models\BO\GaleriaBO();
        $vetor = $_POST;
        $dados = array();
        $campus = \App\Models\Entidades\Galeria::CAMPOS;

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
            move_uploaded_file($tmp_nome, './public/imagemSite/galeria/' . $nome);
            if (file_exists('./public/imagemSite/galeria/' . $nome)) {

                $img = new Canvas();

                $img->carrega('./public/imagemSite/galeria/' . $nome)
                        ->hexa('#FFFFFF')
                        ->redimensiona(370, 484, 'preenchimento')
                        ->grava('./public/imagemSite/galeria/' . $nome, 80);

                $dados['imagem'] = $nome;
            } else {
                Sessao::gravaMensagem("Falha ao enviar foto", "Imagem não enviada", 2);
                $this->redirect('galeria/cadastro');
            }
        } else {
            Sessao::gravaMensagem("Erro", "Selecione uma imagem", 3);
            $this->redirect('galeria/cadastro');
        }


        $id = $bo->inserir(\App\Models\Entidades\Galeria::TABELA['nome'], $dados, \App\Models\Entidades\Galeria::CAMPOSINFO);

        if ($id == FALSE) {
            if (!Sessao::existeMensagem()) {
                Sessao::gravaMensagem("Falha", "Verifique todos os campos e tente novamente", 2);
            }

            $this->redirect('galeria/cadastro');
        } else {

            unset($dados['data_cadastro']);
            unset($dados['administrador_id']);
            unset($dados['imagem']);

            $x = '';
            foreach ($dados as $indice => $value) {
                if ($value != "null") {
                    $x .= "campo " . \App\Models\Entidades\Galeria::CAMPOSINFO[$indice]['descricao'] . ": " . $value . "<br>";
                }
            }
            $x .= '<img src="' . IMAGEMSITE . 'galeria/' . $nome . '" style="width: 100%">';

            $info = [
                'tipo' => 1,
                'administrador' => Sessao::getAdministrador('id'),
                'campos' => $x,
                'tabela' => \App\Models\Entidades\Galeria::TABELA['descricao'],
                'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou o cadastro de um nova imagem na Galeria.'
            ];

            $this->inserirAuditoria($info);

            Sessao::limpaFormulario();
            Sessao::gravaMensagem("Sucesso", "Imagam Inserida na Galeria", 1);

            $this->redirect('galeria/listar');
        }
    }

    public function listar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(7);

        $css = '';
        $js = '';

        $bo = new \App\Models\BO\GaleriaBO();

        if (!isset($parametro[0]) or!is_numeric($parametro[0])) {
            //Caso não seja o usuário é redireciona para a tela de listagem na página 1 com os parametros de busca caso exista
            $this->redirect('galeria/listar/1/' . (isset($parametro[0]) ? $parametro[0] : ''));
        }

        $p = (isset($parametro[0]) or is_numeric($parametro[0])) ? $parametro[0] : 1;
        $busca = (isset($parametro[1])) ? $parametro[1] : null;

        $quantidade = 10;
        $pagina = $p * $quantidade - $quantidade;

        $condicao = "";
        $valoresCondicao = [];

        if ($busca) {
            $condicao .= "";
            array_push($valoresCondicao, "$busca");
        }

        $orderBy = "id asc";

        $tabela = \App\Models\Entidades\Galeria::TABELA['nome'];

        $resultado = $bo->listarVetor($tabela, ["*"], $quantidade, $pagina, $condicao, $valoresCondicao, $orderBy);

        $this->setViewParam('galeria', $resultado);

        $quanGaleria = $bo->selecionar($tabela, ["count(id) as id"], null, null, $condicao, $valoresCondicao, $orderBy);

        $quanPaginas = ceil($quanGaleria->getId() / $quantidade);

        if ($p > $quanPaginas and $p != 1) {
            Sessao::gravaMensagem("Falha", "Página não encontrada", 2);
            $this->redirect('galeria/listar');
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
            'quanGaleria' => $quanGaleria->getId(),
            'quanPaginas' => $quanPaginas,
            'inicio' => $i,
            'fim' => $fim,
            'pagina' => $p,
            'anterior' => $p - 1,
            'proxima' => $p + 1,
            'busca' => $busca
        );

        $this->setViewParam('paginacao', $paginacao);

        if ($quanGaleria->getId() < 1) {
            Sessao::gravaMensagem('', 'Nenhum registro encontrado!', 2);
        }

        $this->render('galeria/listar', "Listagem", $css, $js, 1);
    }
    
    public function excluir($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(7);

        $id = $parametro[0];

        if (is_numeric($id)) {
            $bo = new \App\Models\BO\GaleriaBO();
            $tabela = \App\Models\Entidades\Galeria::TABELA['nome'];

            $resposta = $bo->excluir($tabela, "id = ?", [$id], 1);

            if ($resposta) {
                if ($resposta['imagem'] != 'padrao.jpg') {
                    unlink('./public/imagemSite/galeria/' . $resposta['imagem']);
                }
                Sessao::gravaMensagem("Sucesso", "Imagem da galeria excluida", 1);

                $info = [
                    'tipo' => 3,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => "-",
                    'tabela' => \App\Models\Entidades\Galeria::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a exclusão de uma imagem da galeria: ' . $resposta['imagem']
                ];

                $this->inserirAuditoria($info);
            } else {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem("Falha", "Imagem da Galeria  não excluida", 2);
                }
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('galeria/listar');
    }
    
     public function editarImagem() {
        $this->validaAdministrador();
        $this->nivelAcesso(5);
        $id = $_POST['id'];

        if (is_numeric($id)) {
            if ($_FILES["imagem"]["name"] != "") {
                $tmp_nome = $_FILES["imagem"]['tmp_name'];
                $nome_envio = $_FILES["imagem"]['name'];

                $ext = strtolower(strrchr($nome_envio, "."));

                $nome = date('d_m_Y_h_i_s') . "_" . rand(111, 222) . $ext;

                //Fazer o Upload
                move_uploaded_file($tmp_nome, './public/imagemSite/galeria/' . $nome);
                if (file_exists('./public/imagemSite/galeria/' . $nome)) {

                    $img = new Canvas();

                    $img->carrega('./public/imagemSite/galeria/' . $nome)
                            ->hexa('#FFFFFF')
                            ->redimensiona(370, 484, 'preenchimento')
                            ->grava('./public/imagemSite/galeria/' . $nome, 80);

                    $dados['imagem'] = $nome;
                } else {
                    Sessao::gravaMensagem("Falha ao enviar Imagem para Galeria ", "Imagem  não enviada", 2);
                    $this->redirect('galeria/editar/' . $id);
                }
            } else {
                Sessao::gravaMensagem("Falha", "Imagem da galeria  não selecionada", 2);
                $this->redirect('galeria/editar/' . $id);
            }

            $bo = new \App\Models\BO\GaleriaBO();

            $resultado = $bo->editar(\App\Models\Entidades\Galeria::TABELA['nome'], $dados, "id = ?", [$id], 1, \App\Models\Entidades\Galeria::CAMPOSINFO);

            if (Sessao::existeMensagem() or $resultado == FALSE) {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem("Falha", "Imagem não editada", 2);
                }

                $this->redirect('galeria/editar/' . $id);
            } else {
                $x = "campo " . \App\Models\Entidades\Galeria::CAMPOSINFO["imagem"]['descricao'] . ' editado de:<br><img src="' . IMAGEMSITE . 'galeria/' . $resultado["imagem"] . '" /><br>para:<br><img src="' . IMAGEMSITE . 'galeria/' . $nome . '" /><br>';

                $info = [
                    'tipo' => 2,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => $x,
                    'tabela' => \App\Models\Entidades\Galeria::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a edição da imagem do galeria '
                ];

                $this->inserirAuditoria($info);

                Sessao::gravaMensagem("Sucesso", "Imagem do Galeria  editado", 1);

                $this->redirect('galeria/listar/');
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('galeria/listar');
    }
    
        public function editar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $id = $parametro[0];

        if (is_numeric($id)) {

            $bo = new \App\Models\BO\GaleriaBO();
            $galeria = $bo->selecionarVetor(\App\Models\Entidades\Galeria::TABELA['nome'], ['*'], "id = ?", [$id], null);

            if ($galeria) {
                $css = '';
                $js = '';

                $this->setViewParam('item', $galeria);

                $this->render('galeria/editar', $css, $js, 1);
            } else {
                Sessao::gravaMensagem("Falha", "Imagem da Galeria não foi encontrada", 2);
                $this->redirect('galeria/listar');
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
            $this->redirect('galeria/listar');
        }
    }
    
}

<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\Entidades\Canvas;

class BannerController extends Controller {

    public function index() {
        $this->validaAdministrador();

        $this->redirect('banner/listar');
    }

    public function cadastro() {
        $this->validaAdministrador();
        $this->nivelAcesso(5);

        $css = '';
        $js = '';


        $this->render("banner/cadastro", "Cadastro de Banner", $css, $js, 1);
        Sessao::limpaFormulario();
    }

    public function inserir() {
        $this->validaAdministrador();
        $this->nivelAcesso(5);

        $bo = new \App\Models\BO\BannerBO();
        $vetor = $_POST;
        $dados = array();
        $campus = \App\Models\Entidades\Banner::CAMPOS;

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
            move_uploaded_file($tmp_nome, './public/imagemSite/banner/' . $nome);
            if (file_exists('./public/imagemSite/banner/' . $nome)) {

                $img = new Canvas();

                $img->carrega('./public/imagemSite/banner/' . $nome)
                        ->hexa('#FFFFFF')
                        ->redimensiona(1610, 490, 'preenchimento')
                        ->grava('./public/imagemSite/banner/' . $nome, 80);

                $dados['imagem'] = $nome;
            } else {
                Sessao::gravaMensagem("Falha ao enviar foto", "Imagem não enviada", 2);
                $this->redirect('banner/cadastro');
            }
        } else {
            Sessao::gravaMensagem("Erro", "Selecione uma imagem", 3);
            $this->redirect('banner/cadastro');
        }


        $id = $bo->inserir(\App\Models\Entidades\Banner::TABELA['nome'], $dados, \App\Models\Entidades\Banner::CAMPOSINFO);

        if ($id == FALSE) {
            if (!Sessao::existeMensagem()) {
                Sessao::gravaMensagem("Falha", "Verifique todos os campos e tente novamente", 2);
            }

            $this->redirect('banner/cadastro');
        } else {

            unset($dados['data_cadastro']);
            unset($dados['administrador_id']);
            unset($dados['imagem']);

            $x = '';
            foreach ($dados as $indice => $value) {
                if ($value != "null") {
                    $x .= "campo " . \App\Models\Entidades\Banner::CAMPOSINFO[$indice]['descricao'] . ": " . $value . "<br>";
                }
            }
            $x .= '<img src="' . IMAGEMSITE . 'banner/' . $nome . '" style="width: 100%">';

            $info = [
                'tipo' => 1,
                'administrador' => Sessao::getAdministrador('id'),
                'campos' => $x,
                'tabela' => \App\Models\Entidades\Banner::TABELA['descricao'],
                'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou o cadastro de um novo Banner.'
            ];

            $this->inserirAuditoria($info);

            Sessao::limpaFormulario();
            Sessao::gravaMensagem("Sucesso", "Banner inserido", 1);

            $this->redirect('banner/listar');
        }
    }

    public function listar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(5);

        $css = '';
        $js = '';

        $bo = new \App\Models\BO\BannerBO();

        if (!is_numeric($parametro[0])) {
            $this->redirect('banner/listar/1/' . $parametro[0]);
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

        $tabela = \App\Models\Entidades\Banner::TABELA['nome'];

        $resultado = $bo->listarVetor($tabela, ["*"], $quantidade, $pagina, $condicao, $valoresCondicao, $orderBy);

        $this->setViewParam('banner', $resultado);

        $quanBanner = $bo->selecionar($tabela, ["count(id) as id"], null, null, $condicao, $valoresCondicao, $orderBy);

        $quanPaginas = ceil($quanBanner->getId() / $quantidade);

        if ($p > $quanPaginas and $p != 1) {
            Sessao::gravaMensagem("Falha", "Página não encontrada", 2);
            $this->redirect('banner/listar');
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
            'quanBanner' => $quanBanner->getId(),
            'quanPaginas' => $quanPaginas,
            'inicio' => $i,
            'fim' => $fim,
            'pagina' => $p,
            'anterior' => $p - 1,
            'proxima' => $p + 1,
            'busca' => $busca
        );

        $this->setViewParam('paginacao', $paginacao);

        if ($quanBanner->getId() < 1) {
            Sessao::gravaMensagem('', 'Nenhum registro encontrado!', 2);
        }

        $this->render('banner/listar', "Listagem", $css, $js, 1);
    }

    public function excluir($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(5);

        $id = $parametro[0];

        if (is_numeric($id)) {
            $bo = new \App\Models\BO\BannerBO();
            $tabela = \App\Models\Entidades\Banner::TABELA['nome'];

            $resposta = $bo->excluir($tabela, "id = ?", [$id], 1);

            if ($resposta) {
                if ($resposta['imagem'] != 'padrao.jpg') {
                    unlink('./public/imagemSite/banner/' . $resposta['imagem']);
                }
                Sessao::gravaMensagem("Sucesso", "Banner excluido", 1);

                $info = [
                    'tipo' => 3,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => "-",
                    'tabela' => \App\Models\Entidades\Banner::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a exclusão de um banner: ' . $resposta['imagem']
                ];

                $this->inserirAuditoria($info);
            } else {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem("Falha", "Banner  não excluido", 2);
                }
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('banner/listar');
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
                move_uploaded_file($tmp_nome, './public/imagemSite/banner/' . $nome);
                if (file_exists('./public/imagemSite/banner/' . $nome)) {

                    $img = new Canvas();

                    $img->carrega('./public/imagemSite/banner/' . $nome)
                            ->hexa('#FFFFFF')
                            ->redimensiona(1610, 490, 'preenchimento')
                            ->grava('./public/imagemSite/banner/' . $nome, 80);

                    $dados['imagem'] = $nome;
                } else {
                    Sessao::gravaMensagem("Falha ao enviar Banner ", "Banner  não enviado", 2);
                    $this->redirect('banner/editar/' . $id);
                }
            } else {
                Sessao::gravaMensagem("Falha", "Banner  não selecionado", 2);
                $this->redirect('banner/editar/' . $id);
            }

            $bo = new \App\Models\BO\BannerBO();

            $resultado = $bo->editar(\App\Models\Entidades\Banner::TABELA['nome'], $dados, "id = ?", [$id], 1, \App\Models\Entidades\Banner::CAMPOSINFO);

            if (Sessao::existeMensagem() or $resultado == FALSE) {
                if (!Sessao::existeMensagem()) {
                    Sessao::gravaMensagem("Falha", "Imagem não editada", 2);
                }

                $this->redirect('banner/editar/' . $id);
            } else {
                $x = "campo " . \App\Models\Entidades\Banner::CAMPOSINFO["imagem"]['descricao'] . ' editado de:<br><img src="' . IMAGEMSITE . 'banner/' . $resultado["imagem"] . '" /><br>para:<br><img src="' . IMAGEMSITE . 'banner/' . $nome . '" /><br>';

                $info = [
                    'tipo' => 2,
                    'administrador' => Sessao::getAdministrador('id'),
                    'campos' => $x,
                    'tabela' => \App\Models\Entidades\Banner::TABELA['descricao'],
                    'descricao' => 'O ' . Sessao::getAdministrador('tipo_administrador_nome') . ' ' . Sessao::getAdministrador("nome") . ', efetuou a edição da imagem do banner '
                ];

                $this->inserirAuditoria($info);

                Sessao::gravaMensagem("Sucesso", "Imagem do Banner  editado", 1);

                $this->redirect('banner/listar/');
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
        }

        $this->redirect('banner/listar');
    }

    public function editar($parametro) {
        $this->validaAdministrador();
        $this->nivelAcesso(2);

        $id = $parametro[0];

        if (is_numeric($id)) {

            $bo = new \App\Models\BO\BannerBO();
            $banner = $bo->selecionarVetor(\App\Models\Entidades\Banner::TABELA['nome'], ['*'], "id = ?", [$id], null);

            if ($banner) {
                $css = '';
                $js = '';

                $this->setViewParam('item', $banner);

                $this->render('banner/editar', $css, $js, 1);
            } else {
                Sessao::gravaMensagem("Falha", "Banner não encontrado", 2);
                $this->redirect('banner/listar');
            }
        } else {
            Sessao::gravaMensagem("Acesso incorreto", "As informações enviadas não conrrespondem ao esperado", 3);
            $this->redirect('banner/listar');
        }
    }

}

<?php

namespace App\Controllers;

use App\Lib\Sessao;

class AuditoriaController extends Controller {

    public function index() {
        $this->validaAdministrador();
        $this->nivelAcesso(3);

        $css = '       
             <link rel="stylesheet" href="' . CSSTEMPLATE . '/iziModal/iziModal.min.css" media="screen" >
        ';

        $js = '
           <script src="' . JSTEMPLATE . '/iziModal/iziModal.min.js"></script> 
    ';


        $this->render("auditoria/index", "Auditoria do Sistema", $css, $js, 1);
    }

    public function listarAjax() {
        $this->validaAdministrador();
        $this->nivelAcesso(3);

        $p = isset($_POST['pagina']) ? $_POST['pagina'] : 1;
        $busca = $_POST['condicao'];
        $valoresCondicao = [];


        $quantidade = 5;
        $pagina = $p * $quantidade - $quantidade;
        $condicao = '';

        if ($busca != '') {
            $condicao .= "a.tabela like '%?%' or a.descricao like '%?%' or ad.nome like '%?%'";
            array_push($valoresCondicao, "$busca");
        }

        if (is_numeric($pagina)) {
            $bo = new \App\Models\BO\AuditoriaBO();
            $registro = $bo->listarVetor(\App\Models\Entidades\Auditoria::TABELA['nome'] . ' a left join ' . \App\Models\Entidades\Administrador::TABELA['nome'] . ' ad on a.administrador = ad.id', ["a.*", "date_format(a.data, '%d/%m/%Y') as data"], $quantidade, $pagina, $condicao, $valoresCondicao, "a.id desc");

            if (count($registro) > 0) {
                for ($i = 0; count($registro) > $i; $i++) {
                    $registro[$i]['tipo'] = \App\Models\Entidades\Auditoria::TIPO[$registro[$i]['tipo']];
                }

                $retorno = [
                    'status' => 1,
                    'registros' => $registro
                ];
            } else {
                $retorno = [
                    'status' => 0,
                    'msg' => "Fim dos registros!"
                ];
            }
            echo json_encode($retorno);
        } else {
            echo json_encode($retorno);
        }
    }

    public function buscarInfoAjax() {
        $this->validaAdministrador();
        $this->nivelAcesso(3);

        $id = $_POST['id'];

        $bo = new \App\Models\BO\AuditoriaBO();
        $registro = $bo->selecionarVetor(\App\Models\Entidades\Auditoria::TABELA['nome'] . ' a left join ' . \App\Models\Entidades\Administrador::TABELA['nome'] . ' ad on a.administrador = ad.id ', ['a.*', 'date_format(a.data, "%d/%m/%Y as %H:%i") as data', 'ad.nome'], 'a.id = ?', [$id], '');
        $registro['tipo'] = \App\Models\Entidades\Auditoria::TIPO[$registro['tipo']];


        echo json_encode($registro);
    }

}

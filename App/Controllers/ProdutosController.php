<?php

namespace App\Controllers;

use App\Lib\Sessao;

class ProdutosController extends Controller {

    public function index() {
        $css = null;
        $js =null;

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
    

}

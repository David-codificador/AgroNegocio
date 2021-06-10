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


}

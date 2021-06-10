<?php

namespace App\Controllers;

use App\Lib\Sessao;

class NoticiasController extends Controller {

    public function index() {
        $css = null;
        $js =null;

        $this->render("home/noticias", "Notícias", $css, $js, 3);
    }
    
      public function detalhesnoticia() {
        $css = null;
        $js = null;

        $this->render("home/detalhesnoticia", "Detalhes da Notícia", $css, $js, 3);
    }


}

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
        $this->nivelAcesso(2);

        $css = '';
        $js = '';


        $this->render("banner/cadastro", "Cadastro de Obras", $css, $js, 1);
        Sessao::limpaFormulario();
    }
    
}

<?php

namespace App\Controllers;

use App\Lib\Sessao;

class GaleriaController extends Controller {

    public function index() {
        $css = null;
        $js =null;

        $this->render("home/galeria", "Galeria", $css, $js, 3);
    }

}

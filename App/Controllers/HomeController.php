<?php

namespace App\Controllers;

use App\Lib\Sessao;

class HomeController extends Controller {

    public function index() {
        $css = null;
        $js = null;

        //Listar Banners
        $bo = new \App\Models\BO\BannerBO();
        $banner = $bo->listarVetor(\App\Models\Entidades\Banner::TABELA['nome'], ['*'], null, null, "", [], 'rand()');
        $this->setViewParam('banner', $banner);

        //Listar Notícias 
        $bo = new \App\Models\BO\NoticiasBO();
        $noticias = $bo->listarVetor(\App\Models\Entidades\Noticias::TABELA['nome'], ["*", "date_format(data_publicacao, '%d-%m-%Y') as data_publicacao"], 2, null, "", [], 'rand()');
        $this->setViewParam('noticias', $noticias);



        $this->render("home/index", "Início", $css, $js, 3);
    }

}

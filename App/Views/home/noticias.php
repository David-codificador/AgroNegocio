
<section class="blog-one news">
    <div class="container" id="listar">
        <div class="row" id="info_ajax">
            <!-- ListarAjax -->
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="our_projects_btn">
                    <a class="thm-btn" onclick="buscarInfo(++window.pagina)" id="mais" >Mais Notícias</a>
                    <a class="thm-btn d-none" onclick="limpar()" id="limpa_busca" >Limpar Busca</a>
                    <div id="fim_registros"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- VerAjax -->
<section class="news_detail secao d-none" id="ver">
    <div class="container">
        <div class="row" id="ver-carregando"></div>
        <div class="row  d-none" id="ver-conteudo">
            <div class="col-xl-8 col-lg-7">
                <div class="news_detail_left">
                    <div class="news_detail_image_box">
                        <img id="imagem-ver" src="" alt="">
                        <div class="news_detail_date_box">
                            <p id="data_publicacao-ver"></p>
                        </div>
                    </div>
                    <div class="news_detail_content">
                        <h2 id="titulo-ver"></h2>
                        <div id="texto-ver"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__search">
                        <div class="sidebar__search-form">
                            <input type="search" placeholder="Buscar Notícia" id="input-busca">
                            <button type="submit" onclick="buscar()"><i class="icon-magnifying-glass"></i></button>
                        </div>
                    </div>
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">Mais Notícias</h3>
                        <?php
                        foreach ($viewVar['noticias'] as $item) {
                            ?> 
                            <ul class="sidebar__post-list list-unstyled">
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="<?= IMAGEMSITE ?>noticias/<?= $item['imagem'] ?>" alt="">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <a onclick="ver(<?= $item['id'] ?>)" style="cursor: pointer !important;"><?= $item['titulo'] ?></a>
                                        </h3>
                                    </div>
                                </li>
                            </ul>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="have_questions_btn">
            <a onclick="fechar()" class="thm-btn">Voltar</a>
        </div>
    </div>
</section>
<div style="padding-top: 30px !important;"></div>
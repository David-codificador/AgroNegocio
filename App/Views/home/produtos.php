
<section class="recent-project our_projects">
    <div class="container"  id="listar">
        <div class="row" id="info_ajax">    
                                   
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="our_projects_btn">
                    <a class="thm-btn" onclick="buscarInfo(++window.pagina)" id="mais" >Ver Mais Produtos</a>
                     <div id="fim_registros"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-none" id="ver">
        <div class="row">
            <div class="col-xl-12">
                <div class="our_projects_btn text-right">
                    <a onclick="fechar()">x</a>
                </div>
            </div>
        </div>   
        <div class="row" id="ver-carregando"></div>
        <div class="row d-none" id="ver-conteudo">
            
            <div class="col-xl-8 col-lg-7">
                <div class="project_detail_left_content">
                    <div class="harvest_innovations_detail">
                        <h2 id="titulo-ver"></h2>
                        <div id="descricao-ver"></div>
                    </div>

                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="project_information_box">
                    <div class="project_detail_image">
                        <img id="imagem-ver" src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





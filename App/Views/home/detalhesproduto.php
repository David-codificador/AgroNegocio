<section class="project_detail">
    <div class="container">
        <div class="row">

            <div class="col-xl-8 col-lg-7">
                <div class="project_detail_left_content">
                    <div class="harvest_innovations_detail">
                        <h2><?= $viewVar['item']['titulo'] ?></h2>
                        <p><?= $viewVar['item']['descricao'] ?></p>
                    </div>

                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="project_information_box">
                    <div class="project_detail_image">
                        <img src="<?= IMAGEMSITE ?>produtos/<?= $viewVar['item']['imagem'] ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="recent-project recent_project_detail">
    <div class="container">
        <div class="block-title text-center">
            <p></p>
            <h3>Mais Produtos</h3>
        </div>
        <div class="row">
            <?php
            foreach ($viewVar['produtos'] as $item) {
                ?>
                <div class="col-xl-4 col-lg-4">
                    <div class="recent_project_single">
                        <div class="project_img_box">
                            <img src="<?= IMAGEMSITE ?>produtos/<?= $item['imagem'] ?>" alt="Recent Project Img">
                            <div class="project_content">
                                <h3><?= $item['titulo'] ?></h3>
                            </div>
                            <div class="hover_box">
                                <a href="<?=LINK?>produtos/detalhesproduto/<?=$item['id']?>/<?=$this->remover_caracter($item['titulo'])?>.html"><span class="icon-left-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
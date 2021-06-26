<!-- Banner Section -->
<section class="banner_four_section">

    <div class="banner-carousel-four owl-theme owl-carousel">
        <!-- Slide Item -->
        <?php
        foreach ($viewVar['banner'] as $item) {
            ?>
            <div class="slide-item">
                <div class="image-layer" style="background-image: url(<?= IMAGEMSITE ?>/banner/<?= $item['imagem'] ?>);">
                </div>
                <div class="auto-container">
                    <div class="content-box">
                        <div class="content text-right">
                            <div class="inner">
                                <!-- Texto Aqui -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>
<!--End Banner Section -->
<section class="details_one">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="details_one_single  wow fadeInUp" data-wow-delay="300ms">
                    <div class="details_one_icon">
                        <span class="icon-farmer"></span>
                    </div>
                    <div class="details_one_content">
                        <h2>Compromisso com os <br>Produtores</h2>
                    </div>
                       </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="details_one_single wow fadeInUp" data-wow-delay="600ms">
                    <div class="details_one_icon">
                        <span class="icon-customer-review"></span>
                    </div>
                    <div class="details_one_content">
                        <h2>Cliente <br>Satisfeito</h2>
                    </div> 
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="details_one_single wow fadeInUp" data-wow-delay="900ms">
                    <div class="details_one_icon">
                        <span class="icon-calendar"></span>
                    </div>
                    <div class="details_one_content">
                        <h2>Cumprir todas as<br>Metas</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <section class="about_one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="about1_img">
                            <div class="about1_shape_1"></div>
                            <img src="<?=IMAGEMSITE?>sobre_1.jpg" alt="About-Img">
                            <div class="about1_icon-box">
                                <div class="circle">
                                    <span class="icon-handshake"></span>
                                </div>
                            </div>
                            <div class="about_img_2">
                                <img src="<?=IMAGEMSITE?>sobre_2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="block-title text-left">
                            <p>Sobre a nossa Empresa</p>
                            <h3>A nossa empresa é focada na venda de frutas</h3>
                        </div>
                        <div class="about_content">
                            <div class="text">
                                <p>Temos aqui os melhores produtos e sempre buscamos a satisfação de nossos clientes.</p>
                            </div>
                            <div class="about1_icon_wrap">
                                <div class="about1_icon_single">
                                    <div class="about1_icon">
                                        <span class="icon-phone-call"></span>
                                    </div>
                                    <p>Atendemos todo o Brasil</p>
                                </div>
                                <div class="about1_icon_single">
                                    <div class="about1_icon">
                                        <span class="icon-meeting"></span>
                                    </div>
                                    <p>Procurando sempre ouvir os clientes e servi-los da melhor forma</p>
                                </div>
                            </div>
                            <div class="bottom_text">
                                <p>Se deseja conhecer mais sobre nós clique no botão abaixo.</p>
                            </div>
                            <div class="about1__button-block">
                                <a href="<?=LINK?>sobre" class="thm-btn about_one__btn">Saber Mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<section class="faq_one">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="faq_one_left">
                    <div class="block-title text-left">
                        <p>frequently asked questions</p>
                        <h3>have any question?</h3>
                        <div class="leaf">
                            <img src="<?= IMAGEMSITE ?>resources/leaf.png" alt="">
                        </div>
                    </div>
                    <div class="faq_one_image"
                         style="background-image: url(<?= IMAGEMSITE ?>resources/faq_one_img-1.jpg)">
                        <div class="phone_number">
                            <p>If you have emergency call nows<a href="tel:888-999-0000">666 888 0000</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="faq_one_right">
                    <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                        <div class="accrodion active">
                            <div class="accrodion-title">
                                <h4>Why are your tours so expensive?</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Suspendisse finibus urna mauris, vitae consequat quam vel. Vestibulum leo
                                        ligula, molestie ullamcorper vulputate vitae sodales commodo nisl. Nulla
                                        facilisi. Pellentesque est metus many of eration in some form.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion ">
                            <div class="accrodion-title">
                                <h4>Which payment methods are acceptable?</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Suspendisse finibus urna mauris, vitae consequat quam vel. Vestibulum leo
                                        ligula, molestie ullamcorper vulputate vitae sodales commodo nisl. Nulla
                                        facilisi. Pellentesque est metus many of eration in some form.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h4>How to book the new tour for 2 persons?</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Suspendisse finibus urna mauris, vitae consequat quam vel. Vestibulum leo
                                        ligula, molestie ullamcorper vulputate vitae sodales commodo nisl. Nulla
                                        facilisi. Pellentesque est metus many of eration in some form.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog_four">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                <div class="block-title text-left">
                    <p>Para Notícias</p>
                    <h3>Novos Artigos e<br>Notícias sobre safras de<br>Melancia</h3>

                </div>
                <div class="blog-four_btn">
                    <a href="<?= LINK ?>noticias" class="thm-btn">Ir para Notícias</a>
                </div>
            </div>
            <?php
            foreach ($viewVar['noticias'] as $item) {
                ?>
                <div class="col-xl-4 col-lg-4">
                    <div class="blog_four_single wow fadeInLeft" data-wow-delay="300ms">
                        <div class="blog_four_image">
                            <img src="<?= IMAGEMSITE ?>/noticias/<?= $item['imagem'] ?>" alt="">
                            <div class="blog_four_date_box">
                                <p><?= $item['data_publicacao'] ?></p>
                            </div>
                        </div>
                        <div class="blog-four_content">
                            <ul class="list-unstyled blog-four_meta">
                                
                            </ul>
                            <h3><a href="news_detail.html" class="blog_four_title"><?=$item['titulo']?></a></h3>
                            <div class="blog_four_read_more_btn">
                                <a href="#"><i class="fa fa-angle-right"></i>Ver Mais</a>
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
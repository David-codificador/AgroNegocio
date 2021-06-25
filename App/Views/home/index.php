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
                        <span class="icon-harvest"></span>
                    </div>
                    <div class="details_one_content">
                        <h2>Frutas de Qualidade<br>é Aqui</h2>
                    </div>
                    <div class="details_one_count_box">
                        <h3>01</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="details_one_single wow fadeInUp" data-wow-delay="600ms">
                    <div class="details_one_icon">
                        <span class="icon-customer-review"></span>
                    </div>
                    <div class="details_one_content">
                        <h2>Innovative economy<br>solutions</h2>
                    </div>
                    <div class="details_one_count_box">
                        <h3>02</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="details_one_single wow fadeInUp" data-wow-delay="900ms">
                    <div class="details_one_icon">
                        <span class="icon-calendar"></span>
                    </div>
                    <div class="details_one_content">
                        <h2>Better Live stock<br>Farming</h2>
                    </div>
                    <div class="details_one_count_box">
                        <h3>01</h3>
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
                                <p>30 Oct, 2019</p>
                            </div>
                        </div>
                        <div class="blog-four_content">
                            <ul class="list-unstyled blog-four_meta">
                                <li><a href="news_detail.html"><i class="far fa-user-circle"></i> Admin</a></li>
                                <li><a href="news_detail.html"><i class="far fa-comments"></i> 2 Comments</a></li>
                            </ul>
                            <h3><a href="news_detail.html" class="blog_four_title">Agriculture Miracle you<br>Don't
                                    Know About</a></h3>
                            <div class="blog_four_read_more_btn">
                                <a href="news_detail.html"><i class="fa fa-angle-right"></i>Read More</a>
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
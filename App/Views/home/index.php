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
                        <h2>Organic Agriculture<br>Responsibility</h2>
                    </div>
                    <div class="details_one_count_box">
                        <h3>01</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="details_one_single wow fadeInUp" data-wow-delay="600ms">
                    <div class="details_one_icon">
                        <span class="icon-farmer"></span>
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
                        <span class="icon-tractor"></span>
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

<section class="welcome_two">
    <div class="welcome_two_bg" style="background-image: url(<?= IMAGEMSITE ?>resources/welcome_2_bg.png)"></div>
    <div class="container">
        <div class="block-title text-center">
            <p>Welcome to agrikol</p>
            <h3>We’ve 40 Years Agriculture<br>Experiences</h3>
            <div class="leaf">
                <img src="<?= IMAGEMSITE ?>resources/leaf.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="welcome_two_text text-center">
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered alteration in<br>some form, by injected humour, or randomised words which don't
                        look even slightly believable.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="welcome_two_single">
                    <div class="welcome_two_image_left wow fadeInLeft" data-wow-delay="100ms">
                        <img src="<?= IMAGEMSITE ?>resources/welcome-2_img-1.jpg" alt="Welcome Two Image">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="welcome_two_single">
                    <div class="welcome_two_image_right wow fadeInRight" data-wow-delay="100ms">
                        <img src="<?= IMAGEMSITE ?>resources/welcome-2_img-2.jpg" alt="Welcome Two Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="eco_friendly" style="background-image: url(<?= IMAGEMSITE ?>resources/eco-friendly_bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="eco_friendly_content">
                    <div class="eco_friendly_icon_box">
                        <span class="icon-focus"></span>
                    </div>
                    <div class="eco_friendly_title">
                        <h2>Eco-Friendly Products Can Be<br>Made From Scratch</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="service_four">
    <div class="container">
        <div class="service_four_top"></div>
        <div class="block-title text-center">
            <p>What we do</p>
            <h3>Services We Offer</h3>
            <div class="leaf">
                <img src="<?= IMAGEMSITE ?>resources/leaf.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="service_four_single wow fadeInLeft" data-wow-delay="300ms">
                    <div class="service_four_icon">
                        <span class="icon-temperature"></span>
                    </div>
                    <div class="service_four_deatils">
                        <h3><a href="service-detail.html" class="service_four_title">fresh vegetables</a></h3>
                        <p>There are many variations of passages of available, but the majority have suffered.
                        </p>
                    </div>
                    <div class="service_four_read_more">
                        <a href="service-detail.html"><span class="icon-left-arrow"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="service_four_single wow fadeInLeft" data-wow-delay="600ms">
                    <div class="service_four_icon">
                        <span class="icon-harvest"></span>
                    </div>
                    <div class="service_four_deatils">
                        <h3><a href="service-detail.html" class="service_four_title">agriculture products</a>
                        </h3>
                        <p>There are many variations of passages of available, but the majority have suffered.
                        </p>
                    </div>
                    <div class="service_four_read_more">
                        <a href="service-detail.html"><span class="icon-left-arrow"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="service_four_single wow fadeInLeft" data-wow-delay="900ms">
                    <div class="service_four_icon">
                        <span class="icon-growth"></span>
                    </div>
                    <div class="service_four_deatils">
                        <h3><a href="service-detail.html" class="service_four_title">organic products</a></h3>
                        <p>There are many variations of passages of available, but the majority have suffered.
                        </p>
                    </div>
                    <div class="service_four_read_more">
                        <a href="service-detail.html"><span class="icon-left-arrow"></span></a>
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

<section class="testimonials-three">
    <div class="container">
        <div class="block-title text-center">
            <p>testimonails</p>
            <h3>What people say</h3>
            <div class="leaf">
                <img src="<?= IMAGEMSITE ?>resources/leaf.png" alt="">
            </div>
        </div>
        <div class="testimonials-three__carousel thm__owl-carousel light-dots owl-carousel owl-theme"
             data-options='{"nav": false, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 700, "dots": false, "margin": 30, "loop": true, "responsive": { "0": { "items": 1, "nav": false, "navText": [], "dots": false }, "767": { "items": 1, "nav": true, "navText": [], "dots": false }, "991": { "items": 2 }, "1199": { "items": 2 }, "1200": { "items": 3 } }}'>
            <div class="item">
                <div class="testimonials-three__single">
                    <div class="testimonials-three__content">
                        <div class="testimonials-three_icon">
                            <img src="<?= IMAGEMSITE ?>shapes/testi-qoute-3-1.png" alt="">
                        </div>
                        <p>There are many variations of passages of lorem ipsum but the majority have alteration
                            in some form, by randomised words look.</p>
                    </div>
                    <div class="testimonials-three__info">
                        <img src="<?= IMAGEMSITE ?>testimonials/testimonial-3-img-1.png" alt="">
                        <h3>Kevin Smith</h3>
                        <p>founder</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonials-three__single">
                    <div class="testimonials-three__content">
                        <div class="testimonials-three_icon">
                            <img src="<?= IMAGEMSITE ?>shapes/testi-qoute-3-1.png" alt="">
                        </div>
                        <p>There are many variations of passages of lorem ipsum but the majority have alteration
                            in some form, by randomised words look.</p>
                    </div>
                    <div class="testimonials-three__info">
                        <img src="<?= IMAGEMSITE ?>testimonials/testimonial-3-img-2.png" alt="">
                        <h3>jessica brown</h3>
                        <p>founder</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonials-three__single">
                    <div class="testimonials-three__content">
                        <div class="testimonials-three_icon">
                            <img src="<?= IMAGEMSITE ?>shapes/testi-qoute-3-1.png" alt="">
                        </div>
                        <p>There are many variations of passages of lorem ipsum but the majority have alteration
                            in some form, by randomised words look.</p>
                    </div>
                    <div class="testimonials-three__info">
                        <img src="<?= IMAGEMSITE ?>testimonials/testimonial-3-img-3.png" alt="">
                        <h3>daniyal coper</h3>
                        <p>founder</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="brand-one brand-four">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="brand-one-carousel owl-carousel">
                    <div class="single_brand_item">
                        <a href="#"><img src="<?= IMAGEMSITE ?>resources/brand-1-1.png" alt="brand"></a>
                    </div>
                    <div class="single_brand_item">
                        <a href="#"><img src="<?= IMAGEMSITE ?>resources/brand-1-2.png" alt="brand"></a>
                    </div>
                    <div class="single_brand_item">
                        <a href="#"><img src="<?= IMAGEMSITE ?>resources/brand-1-3.png" alt="brand"></a>
                    </div>
                    <div class="single_brand_item">
                        <a href="#"><img src="<?= IMAGEMSITE ?>resources/brand-1-4.png" alt="brand"></a>
                    </div>
                    <div class="single_brand_item">
                        <a href="#"><img src="<?= IMAGEMSITE ?>resources/brand-1-5.png" alt="brand"></a>
                    </div>
                    <div class="single_brand_item">
                        <a href="#"><img src="<?= IMAGEMSITE ?>resources/brand-1-1.png" alt="brand"></a>
                    </div>
                    <div class="single_brand_item">
                        <a href="#"><img src="<?= IMAGEMSITE ?>resources/brand-1-2.png" alt="brand"></a>
                    </div>
                    <div class="single_brand_item">
                        <a href="#"><img src="<?= IMAGEMSITE ?>resources/brand-1-3.png" alt="brand"></a>
                    </div>
                    <div class="single_brand_item">
                        <a href="#"><img src="<?= IMAGEMSITE ?>resources/brand-1-4.png" alt="brand"></a>
                    </div>
                    <div class="single_brand_item">
                        <a href="#"><img src="<?= IMAGEMSITE ?>resources/brand-1-5.png" alt="brand"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="achieved_one">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="achieved_one_left_img">
                    <img src="<?= IMAGEMSITE ?>resources/achieved_1-img-1.jpg" alt="Achieved One Image">
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="achieved_one_right-content">
                    <div class="achieved_one_right_img">
                        <img src="<?= IMAGEMSITE ?>resources/achieved_1-img-2.jpg" alt="Achieved Two Image">
                    </div>
                    <div class="block-title">
                        <p>agrikol Success</p>
                        <h3>We Archived</h3>
                        <div class="leaf">
                            <img src="<?= IMAGEMSITE ?>resources/leaf.png" alt="">
                        </div>
                    </div>
                    <div class="achieved_one_text">
                        <p>There are many variations of passages available but the majority have suffered
                            alteration in some form by inject humour or donec vel erat sollicitudin, dapibus dui
                            at, porttitor sem.</p>
                    </div>
                    <div class="achieved_one_btn">
                        <a href="why_choose_us.html" class="thm-btn">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="funfact_one">
    <div class="container">
        <ul class="counter_one_box list-unstyled">
            <li class="funfact_one_single wow fadeInLeft" data-wow-delay="300ms">
                <div class="funfact_one_icon">
                    <i class="icon-watering"></i>
                </div>
                <h3><span class="counter">5493</span></h3>
                <p>Projects</p>
            </li>
            <li class="funfact_one_single wow fadeInLeft" data-wow-delay="600ms">
                <div class="funfact_one_icon">
                    <i class="icon-wheelbarrow"></i>
                </div>
                <h3><span class="counter">1750</span></h3>
                <p>products</p>
            </li>
            <li class="funfact_one_single wow fadeInLeft" data-wow-delay="900ms">
                <div class="funfact_one_icon">
                    <i class="icon-customer-review"></i>
                </div>
                <h3><span class="counter">2458</span></h3>
                <p>satisfied</p>
            </li>
            <li class="funfact_one_single wow fadeInLeft" data-wow-delay="1200ms">
                <div class="funfact_one_icon">
                    <i class="icon-meeting"></i>
                </div>
                <h3><span class="counter">1670</span></h3>
                <p>community</p>
            </li>
        </ul>
    </div>
</section>

<section class="blog_four">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                <div class="block-title text-left">
                    <p>from the blog</p>
                    <h3>blog posts And<br>articles Updated<br>Daily</h3>
                    <div class="leaf">
                        <img src="<?= IMAGEMSITE ?>resources/leaf.png" alt="">
                    </div>
                </div>
                <div class="blog-four_btn">
                    <a href="" class="thm-btn">View All News</a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="blog_four_single wow fadeInLeft" data-wow-delay="300ms">
                    <div class="blog_four_image">
                        <img src="<?= IMAGEMSITE ?>blog/blog-4-img-1.jpg" alt="">
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
            <div class="col-xl-4 col-lg-4">
                <div class="blog_four_single wow fadeInLeft" data-wow-delay="600ms">
                    <div class="blog_four_image">
                        <img src="<?= IMAGEMSITE ?>blog/blog-4-img-2.jpg" alt="">
                        <div class="blog_four_date_box">
                            <p>30 Oct, 2019</p>
                        </div>
                    </div>
                    <div class="blog-four_content">
                        <ul class="list-unstyled blog-four_meta">
                            <li><a href="news_detail.html"><i class="far fa-user-circle"></i> Admin</a></li>
                            <li><a href="news_detail.html"><i class="far fa-comments"></i> 2 Comments</a></li>
                        </ul>
                        <h3><a href="news_detail.html" class="blog_four_title">Winter Wheat Harvest
                                Gathering<br>Momentum</a></h3>
                        <div class="blog_four_read_more_btn">
                            <a href="news_detail.html"><i class="fa fa-angle-right"></i>Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
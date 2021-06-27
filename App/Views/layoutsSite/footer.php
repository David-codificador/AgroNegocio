
<footer class="site-footer">
    <div class="site-footer_farm_image"><img src="<?= IMAGEMSITE ?>resources/site-footer-farm.png"
                                             alt="Farm Image"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="footer-widget__column margin_left_30 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget__title">
                        <h3>Explore</h3>
                    </div>
                    <ul class="footer-widget__links-list list-unstyled">
                        <li><a href="<?= LINK ?>">Início</a></li>
                        <li><a href="<?= LINK ?>sobre">Sobre</a></li>
                        <li><a href="<?= LINK ?>produtos">Produtos</a></li>
                        <li><a href="<?= LINK ?>noticias">Notícias</a></li>
                        <li><a href="<?= LINK ?>galeria">Galeria</a></li>
                        <li><a href="<?= LINK ?>contato">Contato</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="footer-widget__column wow fadeInUp" data-wow-delay="300ms">
                    <div class="footer-widget__title">
                        <h3>Notícias</h3>
                    </div>
                    <ul class="footer-widget__news list-unstyled">
                        <?php
                        foreach ($noticiasIndex as $item) {
                            ?> 
                            <li>
                                <div class="footer-widget__news_image">
                                    <img src="<?= IMAGEMSITE ?>/noticias/<?= $item['imagem'] ?>" alt="">
                                </div>
                                <div class="footer-widget__news_text">
                                    <p><a href="<?=LINK?>noticias/visualizar/<?= $item['id'] ?>"><?=$item['titulo']?></a></p>
                                </div>
                                <div class="footer-widget__news_date_box">
                                    <p><?= $item['data_publicacao'] ?></p>
                                </div>
                            </li>
                            <?php
                        }
                        ?>       
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="footer-widget__column wow fadeInUp" data-wow-delay="400ms">
                    <div class="footer-widget__title">
                        <h3>Contato</h3>
                    </div>
                    <div class="footer-widget_contact">
                        <p>66 Broklyn Street, New Town<br>DC 5752, New Yrok</p>
                        <a href="mailto:needhelp@agrikol.com">natan_seabra@hotmail.com</a><br>
                        <a href="tel:666-888-0000">666 888 0000</a>
                        <div class="site-footer__social">
                            <a href="#"><i class="fab fa-whatsapp"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="site-footer_bottom">
    <div class="container">
        <div class="site-footer_bottom_copyright">
            <p>@ All copyright 2020, <a href="#">Layerdrops.com</a></p>
        </div>
        <div class="site-footer_bottom_menu">
            <ul class="list-unstyled">
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Use</a></li>
            </ul>
        </div>
    </div>
</div>




</div><!-- /.page-wrapper -->


<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


<div class="side-menu__block">


    <div class="side-menu__block-overlay custom-cursor__overlay">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
    </div><!-- /.side-menu__block-overlay -->
    <div class="side-menu__block-inner ">
        <div class="side-menu__top justify-content-end">

            <a href="#" class="side-menu__toggler side-menu__close-btn"><img
                    src="<?= IMAGEMSITE ?>shapes/close-1-1.png" alt=""></a>
        </div><!-- /.side-menu__top -->


        <nav class="mobile-nav__container">
            <!-- content is loading via js -->
        </nav>
        <div class="side-menu__sep"></div><!-- /.side-menu__sep -->
        <div class="side-menu__content">
            <p><a href="mailto:needhelp@tripo.com">needhelp@agrikol.com</a> <br> <a href="tel:888-999-0000">888 999
                    0000</a></p>
            <div class="side-menu__social">
                <a href="#"><i class="fab fa-facebook-square"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
            </div>
        </div><!-- /.side-menu__content -->
    </div><!-- /.side-menu__block-inner -->
</div><!-- /.side-menu__block -->



<div class="search-popup">
    <div class="search-popup__overlay custom-cursor__overlay">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
    </div><!-- /.search-popup__overlay -->
    <div class="search-popup__inner">
        <form action="#" class="search-popup__form">
            <input type="text" name="search" placeholder="Type here to Search....">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div><!-- /.search-popup__inner -->
</div><!-- /.search-popup -->


<script src="<?= JSSITE ?>jquery.min.js"></script>
<script src="<?= JSSITE ?>bootstrap.bundle.min.js"></script>
<script src="<?= JSSITE ?>owl.carousel.min.js"></script>
<script src="<?= JSSITE ?>waypoints.min.js"></script>
<script src="<?= JSSITE ?>jquery.counterup.min.js"></script>
<script src="<?= JSSITE ?>TweenMax.min.js"></script>
<script src="<?= JSSITE ?>wow.js"></script>
<script src="<?= JSSITE ?>jquery.magnific-popup.min.js"></script>
<script src="<?= JSSITE ?>jquery.ajaxchimp.min.js"></script>
<script src="<?= JSSITE ?>swiper.min.js"></script>
<script src="<?= JSSITE ?>typed-2.0.11.js"></script>
<script src="<?= JSSITE ?>vegas.min.js"></script>
<script src="<?= JSSITE ?>jquery.validate.min.js"></script>
<script src="<?= JSSITE ?>bootstrap-select.min.js"></script>
<script src="<?= JSSITE ?>countdown.min.js"></script>
<script src="<?= JSSITE ?>jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?= JSSITE ?>bootstrap-datepicker.min.js"></script>
<script src="<?= JSSITE ?>nouislider.min.js"></script>
<script src="<?= JSSITE ?>jquery.mask.js"></script>
<script src="isotope.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script>


<!-- template scripts -->
<script src="<?= JSSITE ?>theme.js"></script>
<?= $js ?>
<?= $arquivoJS ?>
<!-- END REVOLUTION SLIDER -->

<script>
<?php
if ($Sessao::existeMensagemSite()) {
    ?>
        alert("<?= $Sessao::retornaMensagemSite() ?>");
    <?php
    $Sessao::limpaMensagemSite();
}
?>
</script>
</body>
</html>
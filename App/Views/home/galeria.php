<section class="gallery_two">
    <div class="container">
        <div class="row masonary-layout">
             <?php
        foreach ($viewVar['galeria'] as $item) {
            ?>
            <div class="col-xl-3 col-lg-4 col-md-4 masonary-item">
                <div class="gallery_two_single">
                    <div class="gallery_two_image">
                        <img src="<?= IMAGEMSITE ?>galeria/<?=$item['imagem']?>" alt="">
                        <div class="gallery_two_hover_box">
                            <div class="gallery_two_icon">
                                <a class="img-popup" href="<?= IMAGEMSITE ?>galeria/<?=$item['imagem']?>"><span
                                        class="icon-plus-symbol"></span></a>
                            </div>
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
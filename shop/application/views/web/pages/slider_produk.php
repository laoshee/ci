        
<div class="row slide-laptop">
    <div class="col s1 m1 l1 ">
    </div>    

    <div class="col s10 s10 l10 ">
        <div class="slider_slick slider-nav">
            <?php
                foreach ($all_featured_products as $slide_product) {
            ?>
            <div class="slick-konten">
                <span class="img">
                    <a href="<?php echo base_url('detail_produk/' . $slide_product->product_id); ?>">
                        <img class="responsive-img" src="<?php echo base_url('assets/uploads/' . $slide_product->product_folder_square.'/' . $slide_product->product_image_square) ?>" alt="" />
                    </a>
                </span>
            </div>
            <?php } ?> 

            <!-- <div class="slick-konten"><span class="img"><img src="<?php echo base_url() ?>assets/uploads/flawlwss_eyebrow.JPG" alt=""/></span></div> -->
            <!-- <div class="slick-konten"><span class="img"><img src="<?php echo base_url() ?>assets/uploads/onColour matte Lipstick.JPG" alt=""/></span></div>
            <div class="slick-konten"><span class="img"><img src="<?php echo base_url() ?>assets/uploads/optifresh.JPG" alt=""/></span></div>
            <div class="slick-konten"><span class="img"><img src="<?php echo base_url() ?>assets/uploads/flawlwss_eyebrow.JPG" alt=""/></span></div>
            <div class="slick-konten"><span class="img"><img src="<?php echo base_url() ?>assets/uploads/onColour matte Lipstick.JPG" alt=""/></span></div>
            <div class="slick-konten"><span class="img"><img src="<?php echo base_url() ?>assets/uploads/optifresh.JPG" alt=""/></span></div> -->
            
        </div>    
    </div>    
</div>    

<div class="row slide-mobile">
    <div class="col s1 m1 l1 ">
    </div>    

    <div class="col s10 s10 l10 ">
        <div class="slider_slick_mobile slider-nav">
            <div class="slick-konten"><span class="img"><img src="<?php echo base_url() ?>assets/uploads/flawlwss_eyebrow.JPG" alt=""/></span></div>
            <div class="slick-konten"><span class="img"><img src="<?php echo base_url() ?>assets/uploads/onColour matte Lipstick.JPG" alt=""/></span></div>
            <div class="slick-konten"><span class="img"><img src="<?php echo base_url() ?>assets/uploads/optifresh.JPG" alt=""/></span></div>
            <div class="slick-konten"><span class="img"><img src="<?php echo base_url() ?>assets/uploads/flawlwss_eyebrow.JPG" alt=""/></span></div>
            <div class="slick-konten"><span class="img"><img src="<?php echo base_url() ?>assets/uploads/onColour matte Lipstick.JPG" alt=""/></span></div>
            <div class="slick-konten"><span class="img"><img src="<?php echo base_url() ?>assets/uploads/optifresh.JPG" alt=""/></span></div>
            
        </div>    
    </div>    
</div>    
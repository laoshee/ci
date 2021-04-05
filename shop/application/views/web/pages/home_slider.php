<div class="header_bottom">
    <!-- <div class="header_bottom_left">
        <?php
        $popular_posts = $this->web_model->get_all_popular_posts();

        $popular_posts_chunk = array_chunk($popular_posts, 2);
        foreach ($popular_posts_chunk as $single_popular_chunk) {
            ?>
            <div class="section group">
                <?php foreach($single_popular_chunk as $single_popular){?>
                <div class="listview_1_of_2 images_1_of_2">
                    <div class="listimg listimg_2_of_1">
                        <a href="<?php echo base_url('single/'.$single_popular->product_id);?>"> <img src="<?php echo base_url() ?>assets/uploads/<?php echo $single_popular->product_image?>" alt="" /></a>
                    </div>
                    <div class="text list_2_of_1">
                        <h2><?php echo word_limiter($single_popular->product_title,2) ?></h2>
                        <p><?php echo word_limiter($single_popular->product_short_description, 5) ?></p>
                        <div class="button"><span><a href="<?php echo base_url('single/'.$single_popular->product_id);?>">Add to cart</a></span></div>
                    </div>
                </div>
                <?php }?>
            </div>
        <?php } ?> -->
        <div class="clear"></div>
    </div>
    <!-- <div class="header_bottom_right_images">
        FlexSlider
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <?php
                    $slider_posts = $this->web_model->get_all_slider_post();
                    foreach ($slider_posts as $slider_post) {
                        ?>
                        <li><a href="<?php echo $slider_post->slider_link ?>"><img src="<?php echo base_url() ?>assets/uploads/<?php echo $slider_post->slider_image ?>" alt=""/></a></li>
                    <?php } ?>
                </ul>
            </div>
        </section>
        FlexSlider
    </div> -->
    <div class="row">
    <div class="col s12 m12 l12">
        <div class="card">
        <div class="slider">
    <ul class="slides">
        <?php
            $slider_posts = $this->web_model->get_all_slider_post();
            foreach ($slider_posts as $slider_post) {
            ?>
            <li><a href="<?php echo $slider_post->slider_link ?>"><img src="<?php echo base_url() ?>assets/uploads/<?php echo $slider_post->slider_image ?>" alt=""/>
            <div class="caption center-align">
            <h3>BAZAR MALL</h3>
            <h5 class="light grey-text text-lighten-3">tempat lapak berjualan</h5>
            </div>
            </a>
            </li>
        <?php } ?>
       
     
      </li>
    </ul>
  </div>
  </div>
  </div>

    <div class="clear"></div>
</div>	
</div>	
</div>	
<!-- <div class="container"> -->
<blockquote><p class="flow-text red-text"><b><?php echo $this->session->flashdata('message'); ?></b></p></blockquote>
<?php $this->load->view('web/pages/home_slider');?>
<?php $this->load->view('web/pages/slider_produk.php');?>

    <div class="row">
        <div class="row">
            <?php foreach ($all_new_products as $single_new_product) { ?>
                <div class="col s12 m12 l3">
                        <div class="card red accent-1">
                            <center>
                                <div class="card-image"><br>
                                    <a href="<?php echo base_url('detail_produk/' . $single_new_product->product_id); ?>">
                                        <img class="responsive-img" src="<?php echo base_url('assets/uploads/' . $single_new_product->product_folder_square.'/' . $single_new_product->product_image_square) ?>" alt="" />
                                    </a> <!-- style="width:250px;height:250px"-->
                                </div>
                            </center>
                            <div class="card-content">
                            <span class="card-title black-text"> <b><?php echo $single_new_product->product_title; ?></b></span>

                            <p><?php echo word_limiter($single_new_product->product_short_description, 7) ?></p>
                            <p><span class="price"><b>Rp. <?php echo $this->cart->format_number($single_new_product->product_price); ?> </b></span></p>

                            </div>
                            <div class="card-action card red">
                                <a href="<?php echo base_url('detail_produk/' . $single_new_product->product_id); ?>" class="white-text">Detail</a>
                            </div>
                        </div>
                </div>
            <?php } ?>
        </div>
    </div> 


    <div class="row">
        <div class="row">
            <?php foreach ($old_products as $old) { ?>
                <div class="col s12 m12 l3">
                        <div class="card red accent-1">
                            <center>
                                <div class="card-image"><br>
                                    <a href="<?php echo base_url('detail_produk/' . $old->product_id); ?>">
                                        <img class="responsive-img" src="<?php echo base_url('assets/uploads/' . $old->product_folder_square.'/' . $old->product_image_square) ?>" alt="" />
                                    </a>
                                </div>
                            </center>
                            <div class="card-content">
                            <span class="card-title black-text"> <b><?php echo $old->product_title; ?></b></span>

                            <p><?php echo word_limiter($old->product_short_description, 7) ?></p>
                            <p><span class="price"><b>Rp. <?php echo $this->cart->format_number($old->product_price); ?> </b></span></p>

                            </div>
                            <div class="card-action card red">
                                <a href="<?php echo base_url('detail_produk/' . $old->product_id); ?>" class="white-text">Detail</a>
                            </div>
                        </div>
                </div>
            <?php } ?>
        </div>
    </div> 
</div>


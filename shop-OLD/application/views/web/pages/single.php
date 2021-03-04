<div class="container">
    <div class="row">
        <div class="col s12 m12 l8">
            <div class="card red accent-1">
                <div class="card horizontal">
                    <div class="card-image">
                        <img class="responsive-img" src="<?php echo base_url('assets/uploads/'.$get_single_product->product_image)?>" alt="" />
                    </div>

                <div class="card-stacked">
                    <div class="card-content">
                    <span class="card-title black-text"> <b><?php echo $get_single_product->product_title?></b></span>
                        <p><?php echo $get_single_product->product_short_description?></p> <br>
                        <p>Price: Rp.   <span><?php echo $this->cart->format_number($get_single_product->product_price)?> </span></p>
                        <p>Category: <span><?php echo $get_single_product->category_name?></span></p>
                        <p>Brand:<span><?php echo $get_single_product->brand_name?></span></p>
                    </div>
                    <div class="card-action red">
                        <div class="add-cart">
                            <form action="<?php echo base_url('save/cart');?>" method="post">
                                <label class="white-text"> Amount :</label>
                                <input type="number" class="buyfield" name="qty" min="1" value="1"/>
                                <input type="hidden" class="buyfield" name="product_id" value="<?php echo $get_single_product->product_id?>"/>
                                <input type="submit" class="waves-effect waves-light btn " name="submit" value="Buy Now"/>
                            </form>				
                        </div>
                    </div>
                </div>               
            </div>
                <div class="card-content red">
                    <blockquote class="border red"> <span class="card-title black-text"> <b>Product Details</b></span></blockquote>
                    <p class="valign-wrapper  black-text" style="text-align: justify"><?php echo $get_single_product->product_long_description?></p>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l4">
            <div class="card-panel red accent-1">
                <span class="card-title"><b>CATEGORIES</b></span>                
                <ul>
                    <?php foreach($get_all_category as $single_category){?>
                    <li>
                        <!-- <?php echo base_url('get/kategory/'.$single_category->id);?> -->
                        <a href="" class="white-text">-
                        <?php echo $single_category->category_name; }?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

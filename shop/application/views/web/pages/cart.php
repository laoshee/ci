<?php if ($this->cart->total_items()) { ?>
<center><h2>Your Cart</h2></center>

<div class="loading" style="display: none;text-align: center;">
	<!-- <div class="content">
		<img src="<?php echo base_url('assets/images/spinner_loading.gif'); ?>"/>
		<i class="fa fa-spinner fa-spin" aria-hidden="true" style="font-size:30px"></i>
	</div> -->
    <div class="preloader-wrapper active">
        <div class="spinner-layer spinner-red-only">
        <div class="circle-clipper left">
            <div class="circle"></div>
        </div><div class="gap-patch">
            <div class="circle"></div>
        </div><div class="circle-clipper right">
            <div class="circle"></div>
        </div>
        </div>
    </div>
</div>
<div class="onload_cart">
</div>

<div class="container row" id="">
<div class="card sticky-action horizontal">
	<div class="card-stacked"> 
		<div class="  red accent-1"><!--card-content -->
            <table class="highlight">
                <thead>
                <tr>
                    <th >No.</th>
                    <th >Name</th>
                    <th style="height:110px">Image</th>
                    <th >Price</th>
                    <th >Qty</th>
                    <th >Total Price</th>
                    <th >Remove</th>
                </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 0;
                    foreach ($cart_contents as $cart_items) {
                        $i++;
                        // print_r($cart_items);
                        ?>
                        <tr>
                            <td style="display:none"><input type="text" name="<?=$i.'[rowid]';?>" id="rowid" value="<?php echo $cart_items['rowid'] ?>"hidden /></td>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $cart_items['name'] ?></td> <!---$cart_items['name']  dari library yen sko db jeneng e product_title-->
                            <td style="width:100px"><img class="responsive-img" src="<?php echo base_url('assets/uploads/' . $cart_items['options']['product_image']) ?>" alt="" style="width:75%"/></td>
                            <td>Rp. 
                            <!-- <span id="amount1"  oninput="calc(this)"class="amount"> -->
                                <?php echo $this->cart->format_number($cart_items['price']) ?></span></td>
                            <!-- <td> <input type="number" name="qty"  id="amount2" oninput="calc(this)" /> </td> -->
                            <td><input type="number" name="<?=$i.'[qty]';?>" class="itemQty" min="1" id="" value="<?= $cart_items['qty'] ?>" style="border-bottom: white 1px solid;"/>  
                            </td>
                            <!-- <td>
                                <form action="<?php echo base_url('update/cart'); ?>" method="post">
                                    <input type="number" name="qty" value="<?php echo $cart_items['qty'] ?>"/>
                                    <input type="hidden" name="rowid" value="<?php echo $cart_items['rowid'] ?>"/>
                                    <input type="submit" name="submit" value="Update"/>
                                </form>
                            </td> -->
                            <td>Rp. <span id="subtotal"><?php echo $this->cart->format_number($cart_items['subtotal']) ?></span></td>
                            <!-- <td> <input type="text" value="" id="total"></td> -->
                            <td>
                                <form action="<?php echo base_url('web/remove_cart'); ?>" method="post">
                                    <input type="hidden" name="rowid" value="<?php echo $cart_items['rowid'] ?>"/>
                                    <button type="submit" name="submit" class="btn waves-effect waves-light red btn-small"><i class="large material-icons" style="display:contents">delete_forever</i>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="col s6 m6 l6 offset-s6 offset-m6 offset-l6">
                <table style="float:right;text-align:left;" width="40%">
                    <tr>
                        <th>Sub Total : </th>
                        <td>Rp. <?php echo $this->cart->format_number($this->cart->total()) ?></td>
                    </tr>
                    <tr>
                        <th>TAX : </th>
                        <td>Rp. 
                            <?php
                            $total = $this->cart->total();
                            $tax = ($total * 15) / 100;
                            echo $this->cart->format_number($tax);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Grand Total :</th>
                        <td>Rp. <?php echo $this->cart->format_number($tax + $this->cart->total()); ?> </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

    <div class="row">
        <div class="col s3"></div>
        <div class="col s3">
        <a class="waves-effect waves-light red btn-large" href="<?php echo base_url('/') ?>"><i class="material-icons left">add_shopping_cart</i>Continue Shoping</a>
        
        </div>
        <div class="col s6">
            <?php
                $customer_id = $this->session->userdata('customer_id');
                if (empty($customer_id)) {
            ?>
                    <a class="waves-effect waves-light red btn-large" href="<?php echo base_url('user_form') ?>"><i class="material-icons right">payment</i>Payout</a>
            <?php
                } elseif (!empty($customer_id)) {
            ?>
                    <a class="waves-effect waves-light red btn-large" href="<?php echo base_url('customer/shipping') ?>"><i class="material-icons right">payment</i>Payout</a>
            <?php
                }
            ?>        
        </div>
    </div>
<?php } else {  echo "<center><h1>Your Cart Empty</h1></center>"; } ?>

            <!-- <div class="shopping">
                <div class="shopleft">
                    <a href="<?php echo base_url('product') ?>"> <img src="<?php echo base_url() ?>assets/web/images/shop.png" alt="" /></a>
                </div>
                <div class="shopright">
                    <?php
                    $customer_id = $this->session->userdata('customer_id');
                    if (empty($customer_id)) {
                        ?>
                        <a href="<?php echo base_url('user_form') ?>"> <img src="<?php echo base_url() ?>assets/web/images/check.png" alt="" /></a>
                        <?php
                    } elseif (!empty($customer_id)) {
                        ?>
                        <a href = "<?php echo base_url('customer/shipping') ?>"> <img src = "<?php echo base_url() ?>assets/web/images/check.png" alt = "" /></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>  	
        <div class="clear"></div>
    </div>
</div> -->

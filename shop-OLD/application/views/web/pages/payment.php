<?php if (!empty($bill)){ ;?>

<div class="container">
<div class="row">
    <center><h2 class="header"> <!--<i class="large material-icons" style="display:contents">payment</i>-->
        Your Order Sucessfully Done.</h2>
    </center>
        <div class="card horizontal red accent-1">
            <div class="card-stacked">
                <div class="card-content">
                <!-- <h2></h2> -->
                    <center><p class="flow-text"><b> Check your bill through <a href="<?= base_url('bill');?>" class="white-text">this link</a>. Immediately pay off the payment. <br>Thanks You for purchasing.</b></p></center>
                <div class="row">
                    <div class="valign-wrapper center-align">
                        <div class=" card horizontal">
                            <div class="card-stacked">
                                <div class="card-content">
                                    <?php foreach ($customer as $c) { ?>                
                                    <table class="col s12 m5 l5">
                                        <thead>
                                        <!-- <tr>
                                            <th>Name</th>  bordered centered highlight responsive-table
                                        </tr> -->
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <th colspan='3' class="center-align flow-text red-text">Customer Data</th>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>:</td>
                                            <td><?= $c->customer_name; ?> <br></td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>:</td>
                                            <td><?= $c->customer_address; ?> </td>
                                        </tr>
                                        </tbody>
                                    </table>                  
                                    <?php } ?>
                                    <table class="col s12 m6 l5 offset-m1 offset-l2 table">
                                        <thead>
                                            <!-- <tr><th></th></tr> -->
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th colspan='1' class="center-align flow-text red-text">How To Purchasing</th>
                                            </tr>
                                            <tr>
                                                <td>tagihan dapat segera di lunasi melalui nomor rekening: 123xx123xx</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <b><span class="col s12 m12 l12 center-align flow-text red-text">Information Bill</span></b>
                                    <table class="col s12 m7 l12 bordered striped centered highlight responsive-table">
                                    <?php foreach ($bill as $b) { ?>                
                                        <thead>
                                        <tr>
                                            <th>No. ID</th>
                                            <th>Shiping City</th>
                                            <th>Payment</th>
                                            <th>Total Order</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td><?php echo $b->order_id; ?></td>
                                            <td><?php echo $b->shipping_city; ?></td>
                                            <td><?php echo $b->payment; ?></td>
                                            <td>Rp. <?php echo number_format($b->order_total,2,',','.'); ?></td>
                                            <td><?php echo $b->actions; ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
</div>

</div>
<?php } 
    else {  echo redirect('404_override','refresh');
} ?>
<div class="container">
<div class="row">
    <center><h2 class="header"> <!--<i class="large material-icons" style="display:contents">payment</i>-->
        Your Order Sucessfully Done.</h2>
    </center>
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                <!-- <h2></h2> -->
                    <center><p class="flow-text"><b> Check your bill through <a href="<?= base_url('/');?>">this link</a>. Immediately pay off the payment. <br>Thanks You for purchasing.</b></p></center>
                <div class="row">
                    <div class="s12 m12 l12">

                    <div class="card horizontal">
                        <div class="card-stacked">
                            <div class="card-content">
                                <h2>Your Bill.</h2> <br>
                                <?php foreach ($customer as $c) { ?>                
                                Name : <?= $c->customer_name; ?> <br>
                                Address : <?= $c->customer_address; ?> <br>

                                <?php } ?>
                                <table class="bordered striped centered highlight responsive-table">
                                <?php foreach ($bill as $b) { ?>                
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Item Name</th>
                                        <th>Item Price</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>Alvin</td>
                                        <td>Eclair</td>
                                        <td>$0.87</td>
                                    </tr>
                                    <tr>
                                        <td>Alan</td>
                                        <td>Jellybean</td>
                                        <td>$3.76</td>
                                    </tr>
                                    <tr>
                                        <td>Jonathan</td>
                                        <td>Lollipop</td>
                                        <td>$7.00</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <?php echo $b->order_total; ?> cek
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                        <h2>a</h2>
                        


                    </div>
                </div>
            </div>
        </div>
</div>
</div>

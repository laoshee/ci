<div class="container">
<div class="row">
    <center><h2 class="header"> <i class="large material-icons" style="display:contents">payment</i>Payment</h2></center>
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                <!-- <h2>Payment</h2> -->
                <div class="row">
                    <div class="s12 m12 l12">
                    <form method="post" action="<?php echo base_url('customer/save_order');?>"> <!--style="text-align: left"> -->
                        <label>
                            <input type ="radio" class="with-gap" name="payment" value="COD"> <span>Cash On Delivery</span>
                        </label><br>
                        <label>
                            <input type ="radio" class="with-gap" name="payment" value="Bank Mandiri"> <span>Bank Mandiri</span>
                        </label><br>
                        <label>
                            <input type ="radio" class="with-gap" name="payment" value="Bank Bri"> <span>Bank BRI</span>
                        </label><br>
                        <label>
                            <button type="submit" class="btn waves-effect red waves-light">Submit<i class="material-icons right">send</i></button>
                        </label>
                    </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
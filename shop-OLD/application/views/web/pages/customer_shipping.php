<div class="container">
<div class="row">
            <center><h2 class="header"> <i class="large material-icons" style="display:contents">car</i></h2></center>
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                    <h2>Shipping Address</h2>
                    <blockquote><p class="flow-text red-text"><b><?php echo $this->session->flashdata('message'); ?></b></p></blockquote>
                    <div class="col s12 m12 l6">
                        <form method="post" action="<?php echo base_url('customer/save_shipping_address');?>"><!--('customer/save/shipping/address');?>">-->
                            <div style="display:none">
                                <input type="text" name="customer_id" value="<?= $this->session->userdata('customer_id'); ?>" hidden>
                            </div>
                            <div class="input-field col s12">
                                <input type="text" name="shipping_name" class="valdate">
                                <label ><!--for=""-->Name</label>
                            </div>
                            <div class="input-field col s12">
                                <input type="text" name="shipping_phone" class="">
                                <label ><!--for=""-->Phone</label>
                            </div>                                    
                            <div class="input-field col s12">
                                <input type="text" name="shipping_address" class="">
                                <label ><!--for=""-->Address</label>
                            </div>
                    </div>
                    <div class="col s12 m12 l6">                            
                        <div class="input-field col s12">
                            <input type="text" name="shipping_city" class="">
                            <label ><!--for=""-->City</label>
                        </div>
                        <div class="input-field col s12">
                            <input type="text" name="shipping_zipcode" class="">
                            <label ><!--for=""-->Kode Pos</label>
                        </div>
                        <div class="input-field col s12">
                            <button type="submit" class="btn waves-effect red waves-light">Submit<i class="material-icons right">send</i></button>
                        </div>
                    </div>
                    </div>    
                        </form>
                    </div>    
                </div>
            </div>
    </div>
</div>
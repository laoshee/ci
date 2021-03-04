<center><h2><?php echo get_option('contact_title');?></h2></center>
<div class="container">
<div class="row">
    <div class="col s12 m6 l5">
            <center><h2 class="header"> <i class="large material-icons" style="display:contents">person</i></h2></center>
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                            <h2>Existing Customers</h2>

                            <div class="row">
                                <blockquote><p class="flow-text red-text"><b><?php echo $this->session->flashdata('messagelogin'); ?></b></p></blockquote>
                                <form class="col s12" action="<?php echo base_url('customer/customer_shipping_login');?>" method="post">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email" type="email" name="customer_email" class="validate">
                                        <label for="email">Email</label>
                                        <span class="helper-text" data-error="wrong" data-success="betul betul"></span>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="password" type="password" name="customer_password" class="validate">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <button type="submit" class="btn waves-effect red waves-light">Submit<i class="material-icons right">send</i></button>
                                    </div>
                                </div>
                                </div>
                                </form>
                            </div>    
                    </div>
                            <!-- 
                                <form >
                                    <span><label>Email:</label></span>
                                    <input name="customer_email" placeholder="Enter Your Email" type="text"/>
                                    <span><label>Password:</label></span>
                                    <input name="customer_password" placeholder="Enter Your Password" type="password"/>
                                    <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                                </form>
                                <div class="card-action">
                                <a href="#">This is a link</a>
                                </div> 
                            -->
                </div>
            </div>
    <div class="col s12 m6 l7">
        <center><h2 class="header"> <i class="large material-icons" style="display:contents">person_add</i></h2></center>
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                    <h2>Register New Account</h2>
                    <div class="row">
                        <blockquote><p class="flow-text red-text"><b><?php echo $this->session->flashdata('messageregister'); ?></b></p></blockquote>
                        <form class="col s12" method="post" action="<?php echo base_url('customer/shipping_register');?>">
                            <div class="row">
                                <div class="col s12">
                                    Your NickName:
                                    <div class="input-field input-field col s12">
                                        <input type="text" name="customer_name" class="validate" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                this.value = 'customer_name';
                                            }" >
                                        <!-- <label for="nick_name">Your NickName</label> -->
                                    </div>                            
                                </div>                             
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    Password:
                                    <div class="input-field col s12">
                                        <input id="password" name="customer_password" type="password" >
                                    </div>                            
                                </div>                             
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    Email:
                                    <div class="input-field col s12">
                                        <input id="email" type="email" name="customer_email" >
                                    </div>                            
                                </div>                             
                            </div>      
                            <div class="row">
                                <div class="col s12">
                                    Address:
                                    <div class="input-field col s12">
                                        <input type="text" name="customer_address" class="validate">
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col s12">
                                    City:
                                    <div class="input-field col s12">
                                        <input type="text" name="customer_city" class="validate">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col s12">
                                    Phone:
                                    <div class="input-field col s12">
                                        <input type="number" name="customer_phone" class="validate">
                                        <!-- <label for="email_inline">Email</label> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn waves-effect red waves-light">Create Account<i class="material-icons right">send</i></button>
                            <!-- <div><div><button class="grey">Create Account</button></div></div>
                            <p >Agree to the <a href="#">Terms &amp; Conditions</a>.</p> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
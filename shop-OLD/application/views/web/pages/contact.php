<center><h2><?php echo get_option('contact_title');?></h2></center>
<div class="container">
<div class="row">
    <div class="col s12 m12 l6">
            <center><h2 class="header"> <i class="large material-icons" style="display:contents">person</i></h2></center>
            <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                        <h2>Contact Us</h2>
                        <form>
                            <div>
                                <span><label>NAME:</label></span>
                                <span><input type="text" value=""></span>
                            </div>
                            <div>
                                <span><label>E-MAIL:</label></span>
                                <span><input type="text" value=""></span>
                            </div>
                            <div>
                                <span><label>MOBILE.NO:</label></span>
                                <span><input type="text" value=""></span>
                            </div>
                            <div>
                                <span><label>SUBJECT:</label></span>
                                <span><textarea> </textarea></span>
                            </div>
                            <div>
                                <span><button type="submit" class="btn waves-effect red waves-light" disabled>Submit<i class="material-icons right">send</i></span></button>
                            </div>
                        </form>
                </div>
                <!-- <div class="card-action">
                <a href="#">This is a link</a>
                </div> -->
            </div>
        </div>
    </div>
    <div class="col s12 m12 l6">
        <center><h2 class="header"> <i class="large material-icons" style="display:contents">info</i></h2></center>
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                        <h2>Company Information</h2>
                        <p><?php echo get_option('company_location');?></p>
                        
                        <div class="row">
                        <div class="col s12 m12 l12">
                        <table class="responsive-table">
                            <thead>
                            <tr>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Follow on</th>
                            
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td><?php echo get_option('company_number');?></td>
                            <!-- </tr>
                            <tr> -->
                                <td><?php echo get_option('company_email');?></td>
                            <!-- </tr>
                            <tr> -->
                                <td><a href="<?php echo get_option('company_facebook');?>"><span>Facebook</span></a>,
                                    <a href="<?php echo get_option('company_twitter');?>"><span>Twitter</span></a></p></td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- <div class="main">
    <div class="content">
        <div class="support">
            <div class="support_desc">
                <h3><?php echo get_option('contact_title');?></h3>
                <p><?php echo get_option('contact_subtitle');?></p>
                <p><?php echo get_option('contact_description');?></p>
            </div>
            <img src="<?php echo base_url()?>assets/web/images/contact.png" alt="" />
            <div class="clear"></div>
        </div> 	
    </div>
</div> -->

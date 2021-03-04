<div class="container">
<div class="row">
    <div class="col s12 m12 l12">
        <center><h2 class="header"> <i class="large material-icons" style="display:contents">person</i></h2></center>
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                        <h2>Customers Login</h2>

                        <div class="row">
                            <blockquote><p class="flow-text red-text"><b><p><?php echo $this->session->flashdata('message'); ?></p></b></p></blockquote>
                            <form class="col s12" action="<?php echo base_url('customer/logincheck');?>" method="post">
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
            </div>
        </div>
</div>
</div>
<!DOCTYPE HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/materialize/css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css">
    <link href="<?php echo base_url() ?>assets/web/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="<?php echo base_url() ?>assets/web/js/jquerymain.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/jquery-1.7.2.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/nav.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/easing.js"></script> 
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>assets/web/css/select2/select2.min.css" rel="stylesheet" type="text/css"/>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/css/select2.min.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/js/select2.min.js"></script>
    <title>ONLINE SHOP</title>
</head>
<body >

<nav class="nav-extended">
      <div class="nav-wrapper">
        <a href="<?php echo base_url(''); ?>" class="brand-logo">
        ONLINE SHOP</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li class="tab">
                   <i class="tiny material-icons" style="display:contents">shopping_cart</i>
                </li>
                <li class="tab">
                <a href="<?php echo base_url('cart');?>" >Cart(<?php echo $this->cart->total_items();?> Items)</a> 
                  </li>

                  <?php
                $customer_id = $this->session->userdata('customer_id');
                if ($customer_id) {
                    ?>
                    <li class="tab">  <div class="col s12 m2">&nbsp;Welcome, <?= $this->session->userdata('customer_name'); ?>&nbsp;</a></div></li>
                    <li class="tab">  <div class="col s12 m2"><div class="login z-depth-3"><a href="<?php echo base_url('/customer/logout'); ?>">Logout&nbsp;</a></div></div></li>
                <?php } else {
                    ?>
                    <li class="tab"> <div class="col s12 m2"><div class="login z-depth-3"><a href="<?php echo base_url('/customer/login'); ?>">Login&nbsp;</a></div></div></li>
                
                <li class="tab <?php
                if ($this->uri->uri_string() == 'customer/register') {
                    echo "active";
                }?>">                
                <?php }?>
        </ul>
      </div>
    </div>

      <div class="nav-content">
        <ul class="tabs tabs-transparent">
          <li class="tab <?php
                if ($this->uri->uri_string() == '') {
                    echo "active";
                }
                ?>"><a href="<?php echo base_url('/'); ?>" class="z-depth-1 white-text">Home</a></li>

                <li class="tab"><a href="<?php echo base_url('/cart'); ?>"  class="z-depth-1 white-text">Cart</a></li>

                <?php if ($this->session->userdata('customer_id')) { ?>
                <li class="tab <?php
                if ($this->uri->uri_string() == 'bill') {
                    echo "active";
                }
                ?>"><a href="<?php echo base_url('/bill'); ?>"  class="z-depth-1 white-text">Bill</a></li>
                <?php } ?>

        </ul>
      </div>
</nav>
    
<ul class="sidenav" id="mobile-demo">
    <li class="tab">
        
    </li>
    <li class="tab">
        <a href="<?php echo base_url('cart');?>" ><i class="tiny material-icons" style="display:contents">shopping_cart</i>Cart(<?php echo $this->cart->total_items();?> Items)</a> 
    </li>
        <?php $customer_id = $this->session->userdata('customer_id'); if ($customer_id) { ?>
    <li class="tab">  <div class="col s12 m2">&nbsp;Welcome, <?= $this->session->userdata('customer_name'); ?>&nbsp;</a></div></li>
    <li class="tab">  <div class="col s12 m2"><div class="login z-depth-3"><a href="<?php echo base_url('/customer/logout'); ?>">Logout&nbsp;</a></div></div></li>
        <?php } else {?>
    <li class="tab"> <div class="col s12 m2"><div class="login z-depth-3"><a href="<?php echo base_url('/customer/login'); ?>">Login&nbsp;</a></div></div></li>
    <li class="tab <?php if ($this->uri->uri_string() == 'customer/register') { echo "active"; }?>">
        <?php }?>
</ul>

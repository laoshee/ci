<!DOCTYPE HTML>
<head>
<meta name="msvalidate.01" content="3A64CFD2453B814B480D2A11106D1D77">
<meta name="p:domain_verify" content="29921f78f3be548092983ce84fb9d867">
<meta name="google-site-verification" content="UA-141223387-1">
<meta name="yandex-verification" content="04243a8bb17d8f31">
<meta name="dicoding:email" content="bayusutrisno@outlook.co.id">

<meta property="og:locale" content="id_ID">
<meta property="og:type" content="website">
<meta property="og:url" content="https://bayoe.id/">
<meta property="og:site_name" content="bayoe.ID">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/materialize/css/materialize.min.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/web/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="<?php echo base_url() ?>assets/web/js/jquerymain.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/jquery-1.7.2.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/nav.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/easing.js"></script> 
    <!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/nav-hover.js"></script> -->
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('/assets/uploads/'); ?><?php echo get_option('site_favicon'); ?>" />
    <title><?=$title;?></title>
</head>
<body >

<nav class="nav-extended">
      <div class="nav-wrapper">
        <a href="<?php echo base_url(''); ?>" class="brand-logo">
        <img  class="responsive-img" src="<?php echo base_url('/assets/uploads/'); ?><?php echo get_option('site_logo'); ?>" alt="logo"/></a>
            <!-- <img  class="responsive-img" src="https://bayoe.id/wp-content/uploads/2020/05/logo-bayoe_id.png" alt="logo"/></a> -->
            <!-- <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('uploads/'); ?><?php echo get_option('site_logo'); ?>"alt="logo"/>LOGO</a> -->
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
            <!-- <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down"> -->

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
                <!-- <div class="col s12 m2"><a href="<?php echo base_url('/customer/register'); ?>" class="z-depth-3">Register</a> </div> </li> -->
                
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
                <!-- <li class="tab <?php
                if ($this->uri->uri_string() == 'product') {
                    echo "active";
                }
                ?>"> -->
                    <!-- <a href="<?php echo base_url('/product'); ?>"  class="z-depth-1 white-text">Products</a> </li> -->
                    <?php if ($this->cart->total_items()) { ?>
                    <li class="tab <?php
                    if ($this->uri->uri_string() == 'cart') {
                        echo "active";
                    }
                    ?>"><a href="<?php echo base_url('/cart'); ?>"  class="z-depth-1 white-text">Cart</a></li>
                    <?php } ?>
                <?php if ($this->session->userdata('customer_id')) { ?>
                <li class="tab <?php
                if ($this->uri->uri_string() == 'bill') {
                    echo "active";
                }
                ?>"><a href="<?php echo base_url('/bill'); ?>"  class="z-depth-1 white-text">Bill</a></li>
                <?php } ?>
                <li class="tab <?php
                if ($this->uri->uri_string() == 'contact') {
                    echo "active";
                }
                ?>"><a href="<?php echo base_url('/contact'); ?>" class="z-depth-1 white-text">Contact</a> </li>
                

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

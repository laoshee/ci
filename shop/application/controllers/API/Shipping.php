<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping extends CI_Controller {

    public function index()
    {
        
    }

    public function gratis_ongkir()
    {
        $data['cart_contents'] = $this->cart->contents();
        $data['title']    = 'Bazar Mall';
        $this->load->view('web/pages/form_ongkir_cod',$data);
        $this->load->view('element/footer');
    }

    public function kurir() {
        $data['cart_contents'] = $this->cart->contents();
        $data['title']    = 'Bazar Mall';
        // $this->load->view('element/header');
        // $this->load->view('web/pages/shipping',$data);
        $this->load->view('v_ongkir',$data);
        $this->load->view('element/footer');//perlu buat load script
    }

}
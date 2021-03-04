<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    public function index()
    {
        $data                          = array();
        // $data['all_featured_products'] = $this->web_model->get_all_featured_product();
        $data['all_new_products']      = $this->web_model->get_all_new_product();
        
        $master['title'] = 'SHOP BAYOE.ID';
        $master['content'] =  $this->load->view('web/pages/home', $data, TRUE);
        // $this->load->view('web/inc/slider');
        $this->load->view('masterpage',$master);        
    }

    public function error()
    {
        $data = array();
        $master['title'] = 'SHOP BAYOE.ID';
        $master['content'] =  $this->load->view('web/pages/error', $data, TRUE);
        $this->load->view('masterpage',$master);  
    }

    public function single($id)
    {
        // $data                       = array();
        $data['get_single_product'] = $this->web_model->get_single_product($id);
        $data['get_all_category']   = $this->web_model->get_all_category();
        $master['title'] = 'SHOP BAYOE.ID';
        $master['content'] =  $this->load->view('web/pages/single', $data, TRUE);
        $this->load->view('masterpage',$master);  
    }
    
    public function cart()
    {
        $data                  = array();
        $data['cart_contents'] = $this->cart->contents(); // $this->cart seko library
        $master['title'] = 'SHOP BAYOE.ID';
        $master['content'] =  $this->load->view('web/pages/cart', $data, TRUE);
        $this->load->view('masterpage',$master);  
    }

    public function save_cart()
    {
        $data       = array();
        $product_id = $this->input->post('product_id');
        $results    = $this->web_model->get_product_by_id($product_id);

        $data['id']      = $results->product_id;
        $data['name']    = $results->product_title;
        $data['price']   = $results->product_price;
        $data['qty']     = $this->input->post('qty');
        $data['options'] = array('product_image' => $results->product_image);

        $this->cart->insert($data);
        // redirect('cart');
        echo json_encode($data);
    }

    public function update_cart()
    {
        // $data          = array();
        // $data['qty']   = $this->input->post('qty');
        // $data['rowid'] = $this->input->post('rowid');

        $id = $this->input->post('id');
        $qty= $this->input->post('qty');
        $data = array(
            'rowid' => $id,
            'qty' =>$qty
        );
        
        // $total = $this->cart->total_items();
        // $item = $this->input->post('rowid');
        // $qty = $this->input->post('qty');
        // for($i=0;$i < $total;$i++)
        // {
        //     $data = array(
        //     'rowid' => $item[$i],
        //     'qty'   => $qty[$i]
        //     );
        //   $cek = 
        $this->cart->update($data);
        // }
        // echo $this->cart();
		//echo json_encode($cek); //dicek sek

        // redirect('cart');
    }

    // public function cart_autoqty(){ nganggo windows load soal e kabeh perlu load
    //     $data['cart_contents'] = $this->cart->contents(); // $this->cart seko library
    //     $this->load->view('web/pages/cart', $data, TRUE);
    //     // $this->cart();
    // }

    public function remove_cart()
    {

        $data = $this->input->post('rowid');
        $this->cart->remove($data);
        redirect('cart');
    }

    public function user_form()
    {
        $master['title'] = 'SHOP BAYOE.ID';
        $master['content'] =  $this->load->view('web/pages/user_form', null, true);
        $this->load->view('masterpage',$master); 
    }

    public function contact()
    {
        $data = array();
        $master['title'] = 'SHOP BAYOE.ID';
        $master['content'] =  $this->load->view('web/pages/contact', $data, TRUE);
        $this->load->view('masterpage',$master);   
    }

}

/* End of file Web.php */

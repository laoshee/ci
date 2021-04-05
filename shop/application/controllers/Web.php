<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    public function index()
    {
        $data                       = array();
        $data['all_featured_products'] = $this->web_model->get_product();
        $data['all_new_products']   = $this->web_model->get_all_new_product();
        $data['old_products']       = $this->web_model->get_old_product();
        
        $master['title']            = 'Bazar Mall';
        $master['content']          =  $this->load->view('web/pages/home', $data, TRUE);
        // $this->load->view('web/inc/slider');
        $this->load->view('masterpage',$master);        
    }

    public function error()
    {
        $data = array();
        $master['title']            = 'Bazar Mall';
        $master['content']          =  $this->load->view('web/pages/error', $data, TRUE);
        $this->load->view('masterpage',$master);  
    }

    public function single($id)
    {
        // $data                    = array();
        $data['get_single_product'] = $this->web_model->get_single_product($id);
        $data['get_all_category']   = $this->web_model->get_all_category();
        $master['title']            = 'Bazar Mall';
        $master['content']          =  $this->load->view('web/pages/single', $data, TRUE);
        $this->load->view('masterpage',$master);  
    }
    
    public function cart()
    {
        $data                       = array();
        $data['cart_contents']      = $this->cart->contents(); // $this->cart seko library
        $master['title']            = 'Bazar Mall';
        $master['content']          =  $this->load->view('web/pages/cart', $data, TRUE);
        $this->load->view('masterpage',$master);  
    }

    public function save_cart()
    {
        $data       = array();
        $product_id = $this->input->post('product_id');
        $results    = $this->web_model->get_product_by_id($product_id);
        $qty = $this->input->post('qty');
        $total = $results->product_weight * $qty;
        $berat = $results->product_weight;

        $data['id']      = $results->product_id;
        $data['name']    = $results->product_title;
        $data['price']   = $results->product_price;
        $data['qty']     = $qty;
        $data['options'] = array(
                                'product_image' => $results->product_image,
                                'p_weight' => $total,
                                'p_beratsatuan' => $berat
                            );

        $this->cart->insert($data);
        // redirect('cart');
        echo json_encode($data);
    }

    public function update_cart()
    {
        // $data          = array();
        // $data['qty']   = $this->input->post('qty');
        // $data['rowid'] = $this->input->post('rowid');
        $product_id                     = $this->input->post('product_id');
        $results                        = $this->web_model->get_product_by_id($product_id);
        $id                             = $this->input->post('idrow');
        $qty                            = $this->input->post('qty');
        $berat                          = $this->input->post('totberat');
        $berat_satuan                   = $this->input->post('berat_satuan');
        $total                          = $berat_satuan * $qty;
        $data                           = array(
                                            'rowid' => $id,
                                            'qty' =>$qty,
                                          );
        $data['options']['p_weight']   = $total;
        // $data['rowid']      = $id;
        // $data['qty']        = $qty;
        // $data['options']['a']   = $id;
        // $data['options']    = array(
        //                     // 'product_image' => $results->product_image,
        //                     'p_weight' => $total,
        //                     'p_beratsatuan' => $berat,
        //                     'a' => $product_id
        //                     );

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
        // $this->cart->update($data);
        $this->cart->update_options($data);
        // print_r($this->cart->contents());
        // var_dump($this->cart->contents());

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
        $data               = $this->input->post('rowid');
        $this->cart->remove($data);
        redirect('cart');
    }

    public function user_form()
    {
        $master['title']    = 'Bazar Mall';
        $master['content']  =  $this->load->view('web/pages/user_form', null, true);
        $this->load->view('masterpage',$master); 
    }

    public function contact()
    {
        $data = array();
        $master['title']    = 'Bazar Mall';
        $master['content']  =  $this->load->view('web/pages/contact', $data, TRUE);
        $this->load->view('masterpage',$master);   
    }

}

/* End of file Web.php */

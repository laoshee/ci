<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function index()
    {
        
    }

    public function shipping_register(){
        $data['customer_name']      = $this->input->post('customer_name');
        $data['customer_password']  = md5($this->input->post('customer_password'));
        $data['customer_email']     = $this->input->post('customer_email');
        $data['customer_address']   = $this->input->post('customer_address');
        $data['customer_provinsi']  = $this->input->post('ambilprovinsi');
        $data['customer_kota']      = $this->input->post('ambilkota');
        $data['kode_provinsi']      = $this->input->post('customer_provinsi');
        $data['kode_kota']          = $this->input->post('customer_kota_asal');
        $data['customer_desa']      = $this->input->post('customer_desa');
        $data['customer_phone']     = $this->input->post('customer_phone');
        $data['tgl_daftar']         = (date("Y-m-d H:i:s"));
        $data['customer_active']    = '1';
        

        $this->form_validation->set_rules('customer_name', 'Nama', 'trim|required');
        $this->form_validation->set_rules('customer_password', 'Password', 'trim|required');
        $this->form_validation->set_rules('customer_email', 'Email', 'trim|required|valid_email|is_unique[t_customer.customer_email]');
        $this->form_validation->set_rules('customer_address', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('customer_phone', 'Phone', 'trim|required');
        // $this->form_validation->set_rules('ambilprovinsi', 'Password', 'trim|required');
        // $this->form_validation->set_rules('ambilkota', 'Address', 'trim|required');
        $this->form_validation->set_rules('customer_provinsi', 'Provinsi', 'trim|required');
        $this->form_validation->set_rules('customer_kota_asal', 'Kota', 'trim|required');
        $this->form_validation->set_rules('customer_desa', 'Desa', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->save_customer($data);
            $get_customer = $this->web_model->get_customer_info($data);

            if ($result) {
                $this->session->set_userdata('customer_id', $get_customer->customer_id);
                $this->session->set_userdata('customer_name',  $get_customer->customer_name);
                redirect('customer/shipping');
            } else {
                $this->session->set_flashdata('messageregister', 'Customer Shipping Fail');
                redirect('user_form');
            }
        } else {
            $this->session->set_flashdata('messageregister', validation_errors());
            redirect('user_form');
        }
    }

    public function customer_shipping_login()
    {
        $data                      = array();
        $data['customer_email']    = $this->input->post('customer_email');
        $data['customer_password'] = md5($this->input->post('customer_password'));

        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->get_customer_info($data);

            if ($result) {
                $this->session->set_userdata('customer_id', $result->customer_id);
                $this->session->set_userdata('customer_name', $result->customer_name);
                $this->session->set_userdata('customer_email', $result->customer_email);
                $histori = array(
                    'customer_id'       => $result->customer_id,
                    'keterangan'        => 'login',
                    'ip_address'        => $this->input->ip_address(),
                    'os'                => $this->agent->platform(),
                    'browser'           => $this->agent->browser(),
                    'browser_version'   => $this->agent->version(),
                    'tgl_input'         => (date("Y-m-d H:i:s")),
                );

                $saveData = $this->web_model->histori($histori);//{
                if($saveData){
                    redirect('customer/shipping');

                }else{
                    $this->session->set_flashdata('messagelogin', 'Customer Login Fail');
                    redirect('user_form');
                }
                //}
                
            } else {
                $this->session->set_flashdata('messagelogin', 'Customer Login Fail');
                redirect('user_form');
            }
        } else {
            $this->session->set_flashdata('messagelogin', validation_errors());
            redirect('user_form');
        }
    }

    public function customer_shipping()
    {
        $master['title'] = 'Bazar Mall';
        $master['content'] =  $this->load->view('web/pages/customer_shipping', NULL, true);
        $this->load->view('masterpage',$master); 
    }

    /////////////////////////////////////////////////////////////////
    //////////////////   BLOCK tanpa API    /////////////////////////
    /////////////////////////////////////////////////////////////////
    // public function save_shipping_address()
    // {
    //     $this->form_validation->set_rules('shipping_name', 'Wrong Name', 'trim|required');
    //     // $this->form_validation->set_rules('shipping_email', 'Shipping Email', 'trim|required|valid_email|is_unique[tbl_shipping.shipping_email]');
    //     $this->form_validation->set_rules('shipping_phone', 'Wrong Phone', 'trim|required');
    //     $this->form_validation->set_rules('shipping_address', 'Wrong Address', 'trim|required');
    //     $this->form_validation->set_rules('shipping_city', 'Wrong City', 'trim|required');
    //     $this->form_validation->set_rules('shipping_zipcode', 'Kode Pos', 'trim|required');

    //     $data['customer_id']      = $this->input->post('customer_id');
    //     $data['shipping_name']    = $this->input->post('shipping_name');
    //     $data['shipping_phone']   = $this->input->post('shipping_phone');
    //     $data['shipping_address'] = $this->input->post('shipping_address');
    //     $data['shipping_city']    = $this->input->post('shipping_city');
    //     $data['shipping_zipcode'] = $this->input->post('shipping_zipcode');

    //     if ($this->form_validation->run() === true) {
    //         $result = $this->web_model->save_shipping_address($data);
    //         $this->session->set_userdata('shipping_id', $result);
    //         if ($result) {
    //             redirect('checkout');
    //         } else {
    //             $this->session->set_flashdata('message', 'Shipping Fail');
    //             // redirect('customer/shipping');
    //             $this->customer_shipping();
    //         }
    //     } else {
    //         $this->session->set_flashdata('message', validation_errors());
    //         redirect('customer/shipping');
    //     }
    // }

    public function save_shipping_address()
    {
        $this->form_validation->set_rules('shipping_name', 'Wrong Name', 'trim|required');
        $this->form_validation->set_rules('kurir', 'Wrong kurir', 'trim|required');
        $this->form_validation->set_rules('kota_asal', 'Wrong City', 'trim|required');
        $this->form_validation->set_rules('kota_tujuan', 'Wrong Destination', 'trim|required');
        $this->form_validation->set_rules('berat_kg', 'Wrong Weight', 'trim|required');
        $this->form_validation->set_rules('ongkos', 'Wrong Weight', 'trim|required');

        $data['customer_id']            = $this->input->post('customer_id');
        $data['shipping_name']          = $this->input->post('shipping_name');
        $data['shipping_kurir']         = $this->input->post('kurir');
        $data['shipping_idasal']        = $this->input->post('shipping_idasal');
        $data['shipping_asal']          = $this->input->post('kota_asal');
        $data['shipping_tujuan']        = $this->input->post('kota_tujuan');
        $data['shipping_berat_kg']      = $this->input->post('berat_kg');
        $data['shipping_ongkos']        = $this->input->post('ongkos');
        $data['shipping_address']       = $this->input->post('shipping_alamat');
        $data['shipping_provinsi']      = $this->input->post('shipping_provinsi');
        $data['shipping_idprovinsi']    = $this->input->post('shipping_idprovinsi');
        $data['shipping_idkota']        = $this->input->post('shipping_idkota');
        $data['shipping_desa']          = $this->input->post('shipping_desa');
        $data['shipping_phone']         = $this->input->post('shipping_phone');
        $data['shipping_grandtotal']    = $this->input->post('grand_total');        
        $data['tgl_input']              = (date("Y-m-d H:i:s"));

        // shipping_nmkota

        if ($this->form_validation->run() === true) {
            $result = $this->web_model->save_shipping_address($data);
            $this->session->set_userdata('shipping_id', $result);

            $id_order = $this->web_model->buat_kodeorder();
            // $payment_id                  = $this->web_model->save_payment_info($data);
            // $tax                         = ($this->cart->total() * 15) / 100;
            // $odata['order_total']        = $tax + $this->cart->total();
            $tgl                            = (date("Y-m-d H:i:s"));
            $odata['order_id']              = $id_order;
            $odata['customer_id']           = $this->session->userdata('customer_id');
            $odata['shipping_id']           = $this->session->userdata('shipping_id');
            $odata['order_barang']          = $this->input->post('shipping_totbarang');        
            $odata['order_kurir']           = $this->input->post('ongkos');
            $odata['order_grandtotal']      = $this->input->post('grand_total');
            $odata['tgl_input']             = $tgl;

            $order_id = $this->web_model->save_order_info($odata);

            $oddata = array();

            $myoddata = $this->cart->contents();
            foreach ($myoddata as $oddatas) {
                $oddata['order_id']               = $id_order;
                $oddata['product_id']             = $oddatas['id'];
                $oddata['product_name']           = $oddatas['name'];
                $oddata['product_price']          = $oddatas['price'];
                $oddata['product_sales_quantity'] = $oddatas['qty'];
                $oddata['berat_satuan']           = $oddatas['options']['p_beratsatuan'];
                $oddata['total_weight']           = $oddatas['options']['p_weight'];
                $oddata['product_image']          = $oddatas['options']['product_image'];
                $this->web_model->save_order_details_info($oddata);
            }
            $this->cart->destroy();
            $this->payment( $id_order);
        } else {
            redirect('customer/shipping','refresh');
        }
    }


    public function checkout()
    {
        $master['title'] = 'Bazar Mall';
        $master['content'] =  $this->load->view('web/pages/checkout', NULL, true);
        $this->load->view('masterpage',$master); 
    }

    public function save_order() //save order masuk di VIEW CHECKOUT
    {
        // $data['payment_type'] = $this->input->post('payment');

        $this->form_validation->set_rules('payment', 'Payment', 'trim|required');

        if ($this->form_validation->run() == true) {
            $id_order = $this->web_model->buat_kodeorder();
            $tgl = (date("Y-m-d H:i:s"));
            // $payment_id                      = $this->web_model->save_payment_info($data);
            $odata['order_id']                  = $id_order;
            $odata['customer_id']               = $this->session->userdata('customer_id');
            $odata['shipping_id']               = $this->session->userdata('shipping_id');
            $odata['payment']                   = $this->input->post('payment');
            $tax                                = ($this->cart->total() * 15) / 100;
            $odata['order_total']               = $tax + $this->cart->total();
            $odata['tgl_input']                 = $tgl;

            $order_id = $this->web_model->save_order_info($odata);

            $oddata = array();

            $myoddata = $this->cart->contents();

            foreach ($myoddata as $oddatas) {
                // $oddata['order_id']            = $order_id;
                $oddata['order_id']               = $id_order;
                $oddata['product_id']             = $oddatas['id'];
                $oddata['product_name']           = $oddatas['name'];
                $oddata['product_price']          = $oddatas['price'];
                $oddata['product_sales_quantity'] = $oddatas['qty'];
                $oddata['product_image']          = $oddatas['options']['product_image'];
                $this->web_model->save_order_details_info($oddata);
            }

            // if ($payment_method == 'paypal') {

            // }
            // if ($payment_method == 'cashon') {

            // }

            $this->cart->destroy();
            $this->payment( $id_order);
            // redirect('payment');
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('checkout');
        }
    }

    public function payment($id_order)
    {
        // $id_order = 'OR-2102-0003';
        $id['customer_id']  = $this->session->userdata('customer_id');
        $get                = $this->session->userdata('customer_id');
        $data['bill']       = $this->web_model->customer_orderdetail($get,$id_order);
        $data['customer']   = $this->web_model->get_onecustomer($id);
        if($id_order){
        $master['title']    = 'Bazar Mall';
        $master['content']  =  $this->load->view('web/pages/payment', $data, true);
        $this->load->view('masterpage',$master); 
        }else{
            redirect('404_override','refresh');
        }
    }

    public function customer_bill()
    {
        $id['customer_id']  = $this->session->userdata('customer_id');
        $get                = $this->session->userdata('customer_id');
        $data['bill']       = $this->web_model->customer_order($get);
        $data['customer']   = $this->web_model->get_onecustomer($id);

        $master['title']    = 'Bazar Mall';
        $master['content']  =  $this->load->view('web/customer/bill', $data, true);
        $this->load->view('masterpage',$master); 
    }

    public function detail_idcart()
    {
        $get                = $this->session->userdata('customer_id');
        $id_order           = $this->input->post('orderid');
        $data               = $this->web_model->customer_orderdetail_byone($get,$id_order);
        echo json_encode($data);
    }

    public function detail_idcarttotal()
    {
        $get                = $this->session->userdata('customer_id');
        $id_order           = $this->input->post('orderid');
        $data               = $this->web_model->customer_orderdetail_bysum($get,$id_order);
        echo json_encode($data);
    }

    public function login()
    {
        $master['title']    = 'Bazar Mall';
        $master['content']  =  $this->load->view('web/pages/customer_login', NULL, true);
        $this->load->view('masterpage',$master); 
    }

    public function logincheck(){
        $data['customer_email']    = $this->input->post('customer_email');
        $data['customer_password'] = md5($this->input->post('customer_password'));

        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->get_customer_info($data);
            if ($result) {
                $this->session->set_userdata('customer_id', $result->customer_id);
                $this->session->set_userdata('customer_name', $result->customer_name);
                $this->session->set_userdata('customer_email', $data['customer_email']);
                $ambil = $this->session->userdata('customer_name');

                $this->session->set_flashdata('message', "Welcome Back, $ambil");
                redirect('/');
            } else {
                $this->session->set_flashdata('message', 'Customer Login Fail');
                redirect('customer/login');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('customer/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('customer_id');
        $this->session->unset_userdata('customer_email');
        redirect('customer/login');
    }

}

/* End of file Customer.php */


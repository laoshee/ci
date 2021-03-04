<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function index()
    {
        
    }

    public function shipping_register(){
        $data['customer_name']     = $this->input->post('customer_name');
        $data['customer_email']    = $this->input->post('customer_email');
        $data['customer_password'] = md5($this->input->post('customer_password'));
        $data['customer_address']  = $this->input->post('customer_address');
        $data['customer_city']     = $this->input->post('customer_city');
        $data['customer_phone']    = $this->input->post('customer_phone');
        

        $this->form_validation->set_rules('customer_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('customer_email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('customer_password', 'Password', 'trim|required');
        $this->form_validation->set_rules('customer_address', 'Address', 'trim|required');
        $this->form_validation->set_rules('customer_city', 'City', 'trim|required');
        $this->form_validation->set_rules('customer_phone', 'Phone', 'trim|required');

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
                redirect('customer/shipping');
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
        $master['title'] = 'SHOP BAYOE.ID';
        $master['content'] =  $this->load->view('web/pages/customer_shipping', NULL, true);
        $this->load->view('masterpage',$master); 
    }

    public function save_shipping_address()
    {
        $this->form_validation->set_rules('shipping_name', 'Wrong Name', 'trim|required');
        // $this->form_validation->set_rules('shipping_email', 'Shipping Email', 'trim|required|valid_email|is_unique[tbl_shipping.shipping_email]');
        $this->form_validation->set_rules('shipping_phone', 'Wrong Phone', 'trim|required');
        $this->form_validation->set_rules('shipping_address', 'Wrong Address', 'trim|required');
        $this->form_validation->set_rules('shipping_city', 'Wrong City', 'trim|required');
        $this->form_validation->set_rules('shipping_zipcode', 'Kode Pos', 'trim|required');

        $data['customer_id']      = $this->input->post('customer_id');
        $data['shipping_name']    = $this->input->post('shipping_name');
        $data['shipping_phone']   = $this->input->post('shipping_phone');
        $data['shipping_address'] = $this->input->post('shipping_address');
        $data['shipping_city']    = $this->input->post('shipping_city');
        $data['shipping_zipcode'] = $this->input->post('shipping_zipcode');

        if ($this->form_validation->run() === true) {
            $result = $this->web_model->save_shipping_address($data);
            $this->session->set_userdata('shipping_id', $result);
            if ($result) {
                redirect('checkout');
            } else {
                $this->session->set_flashdata('message', 'Shipping Fail');
                // redirect('customer/shipping');
                $this->customer_shipping();
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('customer/shipping');
        }
    }

    public function checkout()
    {
        $master['title'] = 'SHOP BAYOE.ID';
        $master['content'] =  $this->load->view('web/pages/checkout', NULL, true);
        $this->load->view('masterpage',$master); 
    }

    public function save_order()
    {
        // $data['payment_type'] = $this->input->post('payment');

        $this->form_validation->set_rules('payment', 'Payment', 'trim|required');

        if ($this->form_validation->run() == true) {
            $id_order = $this->web_model->buat_kodeorder();
            $tgl = (date("Y-m-d H:i:s"));
            // $payment_id           = $this->web_model->save_payment_info($data);
            $odata['order_id']               = $id_order;
            $odata['customer_id'] = $this->session->userdata('customer_id');
            $odata['shipping_id'] = $this->session->userdata('shipping_id');
            $odata['payment']  = $this->input->post('payment');
            $tax                  = ($this->cart->total() * 15) / 100;
            $odata['order_total'] = $tax + $this->cart->total();
            $odata['tgl_input']     = $tgl;

            $order_id = $this->web_model->save_order_info($odata);

            $oddata = array();

            $myoddata = $this->cart->contents();

            foreach ($myoddata as $oddatas) {
                // $oddata['order_id']               = $order_id;
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

    public function payment()//$id_order
    {
        $id_order = 'OR-2102-0003';
        $id['customer_id'] = $this->session->userdata('customer_id');
        $data['bill'] = $this->web_model->customer_orderdetail($id,$id_order);
        $data['customer'] = $this->web_model->get_onecustomer($id);
        $master['title'] = 'SHOP BAYOE.ID';
        $master['content'] =  $this->load->view('web/pages/payment', $data, true);
        $this->load->view('masterpage',$master); 
    }

    public function customer_bill()
    {
        $master['title'] = 'SHOP BAYOE.ID';
        $master['content'] =  $this->load->view('web/customer/bill', NULL, true);
        $this->load->view('masterpage',$master); 
    }


    public function login()
    {
        $master['title'] = 'SHOP BAYOE.ID';
        $master['content'] =  $this->load->view('web/pages/customer_login', NULL, true);
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
                $ambil = $this->session->userdata('customer_name');
                $this->session->set_userdata('customer_id', $result->customer_id);
                $this->session->set_userdata('customer_email', $data['customer_email']);
                $this->session->set_flashdata('message', 'Welcome Back, $ambil');
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


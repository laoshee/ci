<?php

class Web_Model extends CI_Model
{

    public function get_all_featured_product()
    {
        $this->db->select('*,product.publication_status as pstatus');
        $this->db->from('product');
        $this->db->join('category', 'category.id=product.product_category');
        $this->db->join('brand', 'brand.brand_id=product.product_brand');
        $this->db->order_by('product.product_id', 'DESC');
        $this->db->where('product.publication_status', 1);
        $this->db->where('product_feature', 1);
        $this->db->limit(4);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_new_product()
    {
        $this->db->select('*,product.publication_status as pstatus');
        $this->db->from('product');
        $this->db->join('category', 'category.id=product.product_category'); // KATEGORI
        $this->db->join('brand', 'brand.brand_id=product.product_brand'); //BRAND 
        $this->db->order_by('product.product_id', 'DESC');
        $this->db->where('product.publication_status', 1);
        $this->db->limit(4);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_product()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('category', 'category.id=product.product_category');
        $this->db->join('brand', 'brand.brand_id=product.product_brand');
        $this->db->order_by('product.product_id', 'DESC');
        $this->db->where('product.publication_status', 1);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_single_product($id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('category', 'category.id=product.product_category');
        $this->db->join('brand', 'brand.brand_id=product.product_brand');
        $this->db->where('product.product_id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function get_all_category()
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('publication_status', 1);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_product_by_cat($id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('category', 'category.id=product.product_category');
        $this->db->join('brand', 'brand.brand_id=product.product_brand');
        $this->db->order_by('product.product_id', 'DESC');
        $this->db->where('product.publication_status', 1);
        $this->db->where('category.id', $id);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_product_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('category', 'category.id=product.product_category');
        $this->db->join('brand', 'brand.brand_id=product.product_brand');
        $this->db->order_by('product.product_id', 'DESC');
        $this->db->where('product.publication_status', 1);
        $this->db->where('product.product_id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function save_customer($data)
    {
        return $this->db->insert('t_customer', $data);
        // return $this->db->insert_id();
    }

    public function save_shipping_address($data)
    {
        $this->db->insert('shipping', $data);
        return $this->db->insert_id();
    }

    public function get_customer_info($data)
    {
        $this->db->select('*');
        $this->db->from('t_customer');
        $this->db->where($data);
        $info = $this->db->get();
        return $info->row();
    }

    public function get_onecustomer($data)
    {
        $this->db->select('*');
        $this->db->from('t_customer');
        $this->db->where($data);
        $info = $this->db->get();
        return $info->result();
    }

    public function save_payment_info($data)
    {
        $this->db->insert('payment', $data);
        return $this->db->insert_id();
    }

    public function save_order_info($data)
    {
        return $this->db->insert('t_order', $data);
        // return $this->db->insert_id();
    }

    public function save_order_details_info($oddata)
    {
        $this->db->insert('t_order_details', $oddata);
    }

    public function get_all_slider_post()
    {
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->where('publication_status', 1);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_popular_posts()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('publication_status', 1);
        $this->db->limit(4);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_search_product($search)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('category', 'category.id=product.product_category');
        $this->db->join('brand', 'brand.brand_id=product.product_brand');
        $this->db->join('t_user', 't_user.user_id=product.product_author');
        $this->db->order_by('product.product_id', 'DESC');
        $this->db->where('product.publication_status', 1);
        $this->db->like('product.product_title', $search, 'both');
        $this->db->or_like('product.product_short_description', $search, 'both');
        $this->db->or_like('product.product_long_description', $search, 'both');
        $this->db->or_like('category.category_name', $search, 'both');
        $this->db->or_like('brand.brand_name', $search, 'both');
        $info = $this->db->get();
        return $info->result();
    }

    public function customer_orderdetail($id_customer,$id_order){
        $this->db->from('t_order o');
        $this->db->join('t_order_details od', 'o.order_id = od.order_id');
        $this->db->join('shipping s', 'o.shipping_id = s.shipping_id');
        $this->db->where('o.customer_id',$id_customer);//
        $this->db->where('o.order_id',$id_order);
        $this->db->order_by('o.tgl_input', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->result();
    }

    public function customer_orderdetail_byone($id_customer,$id_order){
        $this->db->select('od.product_name,od.product_image,od.product_price, od.product_sales_quantity as qty,(od.product_price * od.product_sales_quantity) as total');
        $this->db->from('t_order o');
        $this->db->join('t_order_details od', 'o.order_id = od.order_id');
        // $this->db->join('shipping s', 'o.shipping_id = s.shipping_id');
        $this->db->where('o.customer_id',$id_customer);//
        $this->db->where('o.order_id',$id_order);
	    $query = $this->db->get();
        if($query->num_rows() >0){
            foreach ($query->result() as $data) {
                $hasil=array(
                    'produk' => $data->product_name,
                    'gambar' => $data->product_image, 
                    'price' => $data->product_price 
                    );                    
            }
        }
        return $query->result();
    }

    public function customer_orderdetail_bysum($id_customer,$id_order){
        $this->db->select("od.product_name,od.product_image,SUM(od.product_price) as product_price,SUM(od.product_price * od.product_sales_quantity) as total");
        $this->db->from('t_order o');
        $this->db->join('t_order_details od', 'o.order_id = od.order_id');
        // $this->db->join('shipping s', 'o.shipping_id = s.shipping_id');
        $this->db->where('o.customer_id',$id_customer);//
        $this->db->where('o.order_id',$id_order);
	    $query = $this->db->get();
        if($query->num_rows() >0){
            foreach ($query->result() as $data) {
                $price = $data->total;
                $tax = ($price * 15) / 100;
                $sub_total = $price + $tax;
                $hasil=array(
                    'produk' => $data->product_name,
                    'gambar' => $data->product_image, 
                    'price' => $price ,
                    'tax' => $tax ,
                    'total' => $sub_total 
                    );                    
            }
        }
        return $hasil;
    }

    public function customer_order($id_customer){
        $this->db->select('o.*');
        $this->db->from('t_order o');
        // $this->db->join('t_order_details od', 'o.order_id = od.order_id');
        // $this->db->join('shipping s', 'o.shipping_id = s.shipping_id');
        $this->db->where('o.customer_id',$id_customer);
        $this->db->order_by('o.tgl_input', 'DESC');
        return $this->db->get()->result();
    }
    
    public function customer_vieworder($id){
        $this->db->from('t_order o');
        $this->db->join('t_order_details od', 'o.order_id = od.order_id');
        $this->db->where('o.customer_id',$id);
        $this->db->order_by('o.tgl_input', 'ASC');
        return $this->db->get()->result();
    }

    public function buat_kodeorder(){
        $hari_ini = date("Y-m-d");
        $tgl_pertama = date('Y-m-01', strtotime($hari_ini));
        $tgl_terakhir = date('Y-m-t', strtotime($hari_ini));
        $this->db->select('MAX(RIGHT(t_order.order_id,4)) as kode', FALSE);
        // $this->db->where('tgl_input between CURDATE() and  DATE(month)=CURDATE())');;
        // $this->db->where('DATE(tgl_input)=CURDATE()');
        // $this->db->where('tgl_input between CURDATE() and last_day(curdate() )');//- interval 1 month
        $this->db->where("tgl_input between '$tgl_pertama' and '$tgl_terakhir'");//- interval 1 month
        $query=$this->db->get('t_order');
       $isi="";  
       if($query->num_rows()<>0) {
           $isi=intval($query->row()->kode)+1;
       } 
       else {
           $isi = 1;
       }
       $kode_max=str_pad($isi,4,"0",STR_PAD_LEFT);
        $kode_jadi ="OR-".date('ym-').$kode_max;
        return $kode_jadi;
    }
    
}

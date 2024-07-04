<?php
class Product_model extends CI_Model
{
    public $product_title;
    public $additional_info_title;
    public $additional_info_description;
    public $meta_title;
    public $meta_keywords;
    public $meta_description;
    public $seo_url;
    public $product_description;
    public $video_embed_code;
    public $product_code;
    public $quantity;
    public $extra_discount_in_cart;
    public $tax_rate;
    public $sales_price;
    public $second_sales_price;
    public $subtract_stock;
    public $status;
    public $features_section;
    public $new_product_validity_period;
    public $sort_order;
    public $show_on_homepage;
    public $new_product;
    public $installments;
    public $warranty_perio;
    public $currency;

    public function run()
    {
        return "Test için";
    }
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_last_ten_products()
    {
        $query = $this->db->get('products', 10);
        return $query->result();
    }

    public function insert_table_data($data)
    {
        return $this->db->insert('products', $data);
    }


    public function get_all_products()
    {
        $query = $this->db->get('products');
        return $query->result();
    }

    public function get_product_by_id($id)
    {
        $this->db->where('id', $id); // Ensure case-insensitivity for 'id' field
        $query = $this->db->get('products');
            
        if ($query->num_rows() === 1) {
            return $query->row(); // Return single product object
        } else {
            return null; // Return null if product not found
        }
    }
}

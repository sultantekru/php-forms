<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->model('Product_model'); // Büyük/küçük harf duyarlılığına dikkat edin
        $this->load->helper('url');
    }

    public function index()
    {
        $data['products'] = $this->Product_model->get_all_products();
        $this->load->view('product_list_view', $data);
    }

    //TODO: Silinecek
    public function insert_data_into_table()
    {
        $data = array(
            "product_title" => "fikret",
        );
        $result = $this->Product_model->insert_table_data($data);

        if ($result) {
            echo "Data inserted successfully.";
        } else {
            echo "Failed to insert data.";
        }
    }

    public function add_product()
    {
        $this->load->view('add_or_update_product_view');
    }

    public function update_product($id)
    {
        $data['product'] = $this->Product_model->get_product_by_id($id);

        if (!$data['product']) {
            show_404();
        }

        $this->load->view('add_or_update_product_view', $data);
    }


    public function delete_product($id)
    {
        $this->Product_model->delete($id);
        redirect('/');
    }

    public function submit_product()
    {
        $id = $this->input->post('id');

        $data = array(
            "product_title" => $this->input->post('product_title'),
            "additional_info_title" => $this->input->post('additional_info_title'),
            "additional_info_description" => $this->input->post('additional_info_description'),
            "meta_title" => $this->input->post('meta_title'),
            "meta_keywords" => $this->input->post('meta_keywords'),
            "meta_description" => $this->input->post('meta_description'),
            "seo_url" => $this->input->post('seo_url'),
            "product_description" => $this->input->post('product_description'),
            "video_embed_code" => $this->input->post('video_embed_code'),
            "product_code" => $this->input->post('product_code'),
            "quantity" => $this->input->post('quantity'),
            "extra_discount_in_cart" => $this->input->post('extra_discount_in_cart'),
            "tax_rate" => $this->input->post('tax_rate'),
            "sales_price" => $this->input->post('sales_price'),
            "second_sales_price" => $this->input->post('second_sales_price'),
            "subtract_stock" => $this->input->post('subtract_stock'),
            "status" => $this->input->post('status'),
            "features_section" => $this->input->post('features_section'),
            "new_product_validity_period" => $this->input->post('new_product_validity_period'),
            "sort_order" => $this->input->post('sort_order'),
            "show_on_homepage" => $this->input->post('show_on_homepage'),
            "new_product" => $this->input->post('new_product'),
            "installments" => $this->input->post('installments'),
            "warranty_period" => $this->input->post('warranty_period'),
        );

        if ($id) {
            $result = $this->Product_model->update_table_data($id, $data);
        } else {
            $result = $this->Product_model->insert_table_data($data);
        }
    }
}

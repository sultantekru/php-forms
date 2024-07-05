<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
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
}

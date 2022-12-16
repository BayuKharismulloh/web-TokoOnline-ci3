<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('common_model', 'common');
        $this->load->model('product_model', 'product');
        $this->load->model('category_model', 'category');
    }

    public function index()
    {
        $data = [
            'title' => 'Produk | ' . site_name(),
            'categories' => $this->category->getCategories()

        ];

        $param['where']['status'] = 'published';

        if (!empty($this->input->get())) {
            if (!empty($this->input->get('product_name'))) {
                $param['like']['products.name'] = $this->input->get('product_name');
            }

            if (!empty($this->input->get('category'))) {
                $param['where']['category_id'] = $this->input->get('category');
            }

            if (!empty($this->input->get('start_price')) && !empty($this->input->get('end_price'))) {
                $param['where']['sale_price >='] = $this->input->get('start_price');
                $param['where']['sale_price <='] = $this->input->get('end_price');
            }
        }

        $data['products'] = $this->product->filterProducts($param);

        $this->template->load('guest/templates/guest_template', 'guest/products/products', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Produk | ' . site_name(),
            'product' => $this->product->getProduct($id)
        ];

        $this->template->load('guest/templates/guest_template', 'guest/products/detail', $data);
    }
}

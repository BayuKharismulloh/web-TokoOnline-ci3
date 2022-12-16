<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('common_model', 'common');
        $this->load->model('carousel_model', 'carousel');
        $this->load->model('product_model', 'product');
    }

    public function index()
    {
        $data = [
            'title' => 'Home | ' . site_name(),
            'products' => $this->product->filterProducts(['where' => ['status' => 'published'], 'limit' => [4, 0]]),
            'carousels' => $this->carousel->getCarousels(['status' => 'published'])
        ];

        $this->template->load('guest/templates/guest_template', 'guest/home/home', $data);
    }
}

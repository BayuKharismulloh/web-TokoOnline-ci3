<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model', 'common');
        $this->load->model('product_model', 'product');
        $this->load->model('category_model', 'category');
        $this->load->model('carousel_model', 'carousel');
        $this->load->model('approval_model', 'approval');
    }

    public function index()
    {
        $data = [
            'title' => "Dashboard | " . site_name(),
            'product_count' => count($this->product->getProducts()),
            'category_count' => count($this->category->getCategories()),
            'carousel_count' => count($this->carousel->getCarousels()),
            'pending_approval_count' => count($this->approval->getApprovals(['approvals.status' => 'in_review'])),
        ];

        $this->template->load('admin/templates/admin_template', 'admin/dashboard/dashboard', $data);
    }
}

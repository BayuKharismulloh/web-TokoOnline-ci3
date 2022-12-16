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
            'title' => "Produk | " . site_name(),
            'products' => $this->product->getProducts()
        ];

        $this->template->load('admin/templates/admin_template', 'admin/products/products', $data);
    }

    public function add()
    {
        $data = [
            'title' => "Tambah produk | " . site_name(),
            'categories' => $this->category->getCategories()
        ];

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('product_name', 'Nama produk', 'required');
            $this->form_validation->set_rules('category_id', 'Kategori', 'required');
            $this->form_validation->set_rules('product_price', 'Harga beli', 'required');
            $this->form_validation->set_rules('product_sale_price', 'Harga jual', 'required');
            $this->form_validation->set_rules('product_description', 'Deskripsi produk', 'required');
            if ($this->form_validation->run()) {
                $config['upload_path']          = './uploads/images/products';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['file_name']            = 'sumber-rezeki-product-' . strtotime(date('Y-m-d H:i:s'));
                // 		$config['overwrite']            = true;
                $config['max_size']             = 2048; // 2MB
                // 		$config['max_width']            = 1080;
                // 		$config['max_height']           = 1080;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('product_image')) {
                    $pic = $this->upload->data();

                    $source = './uploads/images/products/' . $pic['file_name'];

                    chmod($source, 0777);

                    $product = [
                        'name' => $this->input->post('product_name'),
                        'category_id' => $this->input->post('category_id'),
                        'image' => '/uploads/images/products/' . $pic['file_name'],
                        'price' => $this->input->post('product_price'),
                        'sale_price' => $this->input->post('product_sale_price'),
                        'description' => $this->input->post('product_description'),
                    ];

                    if ($this->session->role_id == 2) {

                        $product['status'] = 'IN_REVIEW';

                        $this->db->insert('products', $product);
                        $id = $this->db->insert_id();

                        $approval = [
                            'user_id' => $this->session->user_id,
                            'refference_id' => $id,
                            'type' => 'product',
                            'action' => 'ADD',
                            'title' => $this->session->full_name . ' ingin menambahkan produk baru',
                        ];

                        $this->db->insert('approvals', $approval);
                    } else {
                        $product['status'] = 'PUBLISHED';
                        $this->db->insert('products', $product);
                    }

                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    redirect('/admin/product/add');
                }
            } else {
                $data['pic_error'] = $this->upload->display_errors();
            }
        }

        $this->template->load('admin/templates/admin_template', 'admin/products/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => "Ubah produk | " . site_name(),
            'categories' => $this->category->getCategories(),
            'product' => $this->product->getProduct($id)
        ];

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('product_name', 'Nama produk', 'required');
            $this->form_validation->set_rules('category_id', 'Kategori', 'required');
            $this->form_validation->set_rules('product_price', 'Harga beli', 'required');
            $this->form_validation->set_rules('product_sale_price', 'Harga jual', 'required');
            $this->form_validation->set_rules('product_description', 'Deskripsi produk', 'required');
            if ($this->form_validation->run()) {
                $config['upload_path']          = './uploads/images/products';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['file_name']            = 'sumber-rezeki-product-' . strtotime($data['product']['created_at']);
                $config['overwrite']            = true;
                $config['max_size']             = 2048; // 2MB

                $this->load->library('upload', $config);

                $product = [
                    'name' => $this->input->post('product_name'),
                    'category_id' => $this->input->post('category_id'),
                    'price' => $this->input->post('product_price'),
                    'sale_price' => $this->input->post('product_sale_price'),
                    'description' => $this->input->post('product_description'),
                ];

                if ($this->upload->do_upload('product_image')) {
                    $pic = $this->upload->data();

                    $source = './uploads/images/products/' . $pic['file_name'];
                    chmod($source, 0777);

                    $product['image'] = './uploads/images/products/' . $pic['file_name'];
                }

                if ($this->session->role_id == 2) {

                    $product['status'] = 'IN_REVIEW';

                    $this->db->update('products', $product, ['id' => $id]);

                    $approval = [
                        'user_id' => $this->session->user_id,
                        'refference_id' => $id,
                        'type' => 'product',
                        'action' => 'EDIT',
                        'title' => $this->session->full_name . ' ingin mengubah produk "' . $data['product']['name'] . '"',
                    ];

                    $this->db->insert('approvals', $approval);
                } else {
                    $product['status'] = 'PUBLISHED';
                    $this->db->update('products', $product, ['id' => $id]);
                }


                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('/admin/product/edit/' . $id);
            }
        }

        $this->template->load('admin/templates/admin_template', 'admin/products/edit', $data);
    }

    public function delete()
    {
        $id = $this->input->post('product_id');

        if ($this->session->role_id == 1) {
            $this->db->delete('products', ['id' => $id]);
        } else {
            $product = $this->product->getProduct($id);

            $approval = [
                'user_id' => $this->session->user_id,
                'refference_id' => $id,
                'type' => 'product',
                'action' => "DELETE",
                'title' => $this->session->full_name . ' ingin menghapus produk "' . $product['name'] . '"',
            ];

            $this->db->insert('approvals', $approval);
        }

        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('/admin/product/');
    }
}

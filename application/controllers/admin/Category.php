<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('common_model', 'common');
        $this->load->model('category_model', 'category');
    }

    public function index()
    {
        $data = [
            'title' => "Kategori | " . site_name(),
            'categories' => $this->category->getCategories()
        ];

        $this->template->load('admin/templates/admin_template', 'admin/categories/categories', $data);
    }

    public function add()
    {
        $data = [
            'title' => "Tambah kategori | " . site_name(),
        ];

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('category_name', 'Nama kategori', 'required');
            if ($this->form_validation->run()) {
                $category = [
                    'name' => $this->input->post('category_name')
                ];

                $this->db->insert('categories', $category);

                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('/admin/category/add');
            }
        }

        $this->template->load('admin/templates/admin_template', 'admin/categories/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => "Ubah kategori | " . site_name(),
            'category' => $this->category->getCategory($id)
        ];

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('category_name', 'Nama kategori', 'required');
            if ($this->form_validation->run()) {
                $category = [
                    'name' => $this->input->post('category_name')
                ];

                $this->db->update('categories', $category, ['id' => $id]);

                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('/admin/category/edit/' . $id);
            }
        }

        $this->template->load('admin/templates/admin_template', 'admin/categories/edit', $data);
    }

    public function delete()
    {
        $id = $this->input->post('category_id');
        $this->db->delete('categories', ['id' => $id]);

        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('/admin/category/');
    }
}

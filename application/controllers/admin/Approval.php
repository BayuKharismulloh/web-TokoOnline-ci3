<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('common_model', 'common');
        $this->load->model('product_model', 'product');
        $this->load->model('carousel_model', 'carousel');
        $this->load->model('user_model', 'user');
        $this->load->model('approval_model', 'approval');
    }

    public function index()
    {
        $data = [
            'title' => "Approval | " . site_name(),
            'approvals' => $this->approval->getApprovals()
        ];

        $this->template->load('admin/templates/admin_template', 'admin/approvals/approvals', $data);
    }

    public function approve()
    {
        $id = $this->input->post('approval_id');
        $approval = $this->approval->getApproval($id);

        $this->db->trans_start();
        if ($approval['type'] == 'product') {
            if ($approval['action'] == 'ADD' || $approval['action'] == 'EDIT') {
                $this->db->update('products', ['status' => 'PUBLISHED'], ['id' => $approval['refference_id']]);
            } else {
                $this->db->delete('products', ['id' => $approval['refference_id']]);
            }
        } else if ($approval['type'] == 'carousel') {
            if ($approval['action'] == 'ADD' || $approval['action'] == 'EDIT') {
                $this->db->update('carousels', ['status' => 'PUBLISHED'], ['id' => $approval['refference_id']]);
            } else {
                $this->db->delete('carousels', ['id' => $approval['refference_id']]);
            }
        } else {
            $this->db->update('users', ['status' => 'active'], ['id' => $approval['refference_id']]);
        }

        $this->db->update('approvals', ['status' => 'APPROVED'], ['id' => $id]);
        $this->db->trans_complete();

        if ($this->db->trans_status() !== false) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('/admin/approval');
        }
    }

    public function deny()
    {
        $id = $this->input->post('approval_id');
        $approval = $this->approval->getApproval($id);

        if ($approval['type'] == 'product') {
            $this->db->update('products', ['status' => 'DRAFT'], ['id' => $approval['refference_id']]);
        } else if ($approval['type'] == 'carousel') {
            $this->db->update('carousels', ['status' => 'DRAFT'], ['id' => $approval['refference_id']]);
        } else {
            $this->db->update('users', ['status' => 'inactive'], ['id' => $approval['refference_id']]);
        }

        $this->db->update('approvals', ['status' => 'DENIED'], ['id' => $id]);

        if ($this->db->trans_status() !== false) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('/admin/approval');
        }
    }
}

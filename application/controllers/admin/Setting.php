<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('common_model', 'common');
        $this->load->model('user_model', 'user');
    }
    public function index()
    {
        $id = $this->session->user_id;

        $data = [
            'title' => "Pengaturan | " . site_name(),
            'user' => $this->user->getUserByID($id)
        ];

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('full_name', 'Nama lengkap', 'required');
            $this->form_validation->set_rules('user_name', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            if ($this->input->post('password')) {
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('password_confirm', 'Password', 'required|matches[password]');
            }
            if ($this->form_validation->run()) {
                $config['upload_path']          = './uploads/images/avatars';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['file_name']            = 'sumber-rezeki-avatar-' . strtotime($data['user']['created_at']);
                $config['overwrite']            = true;
                $config['max_size']             = 2048; // 2MB
                // 		$config['max_width']            = 1080;
                // 		$config['max_height']           = 1080;

                $this->load->library('upload', $config);

                $user = [
                    'full_name' => $this->input->post('full_name'),
                    'user_name' => $this->input->post('user_name'),
                    'email' => $this->input->post('email'),
                ];

                if ($this->upload->do_upload('user_image')) {
                    $pic = $this->upload->data();
                    $user['image'] = '/uploads/images/avatars/' . $pic['file_name'];
                    
                    $source = './uploads/images/avatars/' . $pic['file_name'];
                    chmod($source, 0777);
                }

                if ($this->input->post('password') && $this->input->post('password_confirm')) {
                    $user['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                }

                $this->db->update('users', $user, ['id' => $id]);

                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('/admin/setting');
            }
        }

        $this->template->load('admin/templates/admin_template', 'admin/users/setting', $data);
    }
}

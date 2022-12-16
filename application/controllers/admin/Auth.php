<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('common_model', 'common');
        $this->load->model('user_model', 'user');
    }

    public function sign_in()
    {
        $data = [
            'title' => "Masuk | " . site_name(),
        ];

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('user_name', 'Username', [
                'required',
                ['is_valid_credential', [$this->user, 'is_valid_credential']],
                ['is_active', [$this->user, 'is_active']]

            ]);
            $this->form_validation->set_rules('password', 'Password', [
                'required',
                ['is_valid_credential', [$this->user, 'is_valid_credential']],
            ]);
            if ($this->form_validation->run()) {
                $user_name = $this->input->post('user_name');
                $user = $this->user->getUser($user_name);
                $sess = [
                    'logged_in' => true,
                    'user_id' => $user['id'],
                    'user_name' => $user['user_name'],
                    'full_name' => $user['full_name'],
                    'role_id' => $user['role_id'],
                    'role' => $user['role_name'],
                ];

                $this->session->set_userdata($sess);
                redirect('/admin/dashboard/');
            }
        }

        $this->template->load('admin/templates/admin_auth_template', 'admin/auth/sign_in', $data);
    }

    public function sign_up()
    {
        $data = [
            'title' => "Daftar | " . site_name(),
        ];

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('full_name', 'Nama lengkap', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
            $this->form_validation->set_rules('user_name', 'Username', 'required|is_unique[users.user_name]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password_confirm', 'Konfirmasi password', 'required|matches[password]');
            if ($this->form_validation->run()) {
                $user = [
                    'role_id' => 2,
                    'full_name' => $this->input->post('full_name'),
                    'user_name' => $this->input->post('user_name'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'status' => 'inactive'
                ];

                $this->db->insert('users', $user);
                $id = $this->db->insert_id();

                $userdata = $this->user->getUserByID($id);

                $approval = [
                    'user_id' => $id,
                    'refference_id' => $id,
                    'title' => $userdata['full_name'] . ' ingin mendaftar sebagai staff',
                    'action' => 'ADD'
                ];

                $this->db->insert('approvals', $approval);

                $this->session->set_flashdata('success', 'Data berhasil disimpan.');
                redirect('/admin/sign-up/');
            }
        }

        $this->template->load('admin/templates/admin_auth_template', 'admin/auth/sign_up', $data);
    }

    public function sign_out()
    {
        $this->session->sess_destroy();
        redirect('/admin/sign-in/');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUsers($param = [])
    {
        $this->db->select('users.*');
        $this->db->select('roles.name as role_name');
        $this->db->select('roles.id as role_id');
        $this->db->join('roles', 'roles.id=users.role_id', 'inner');
        return $this->db->get_where('users', $param)->result_array();
    }

    public function getUser($user_name)
    {
        $this->db->select('users.*');
        $this->db->select('roles.name as role_name');
        $this->db->select('roles.id as role_id');
        $this->db->join('roles', 'roles.id=users.role_id', 'inner');
        return $this->db->get_where('users', ['user_name' => $user_name])->row_array();
    }

    public function getUserByID($id)
    {
        $this->db->select('users.*');
        $this->db->select('roles.name as role_name');
        $this->db->select('roles.id as role_id');
        $this->db->join('roles', 'roles.id=users.role_id', 'inner');
        return $this->db->get_where('users', ['users.id' => $id])->row_array();
    }

    public function is_valid_credential()
    {
        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['user_name' => $user_name])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                return true;
            } else {
                $this->form_validation->set_message('is_valid_credential', 'Username atau password salah.');
                return false;
            }
        } else {
            $this->form_validation->set_message('is_valid_credential', 'Username atau password salah.');
            return false;
        }
    }

    public function is_active()
    {
        $user_name = $this->input->post('user_name');

        $user = $this->db->get_where('users', ['user_name' => $user_name, 'status' => 'active'])->row_array();

        if ($user) {
            return true;
        } else {
            $this->form_validation->set_message('is_active', 'Akun anda belum aktif.');
            return false;
        }
    }
}

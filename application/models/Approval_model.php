<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval_model extends CI_Model
{
    public function getApprovals($param = [])
    {
        $this->db->order_by('approvals.created_at', 'DESC');
        $this->db->select('approvals.*');
        $this->db->select('users.id as user_id');
        $this->db->select('user_name');
        $this->db->select('full_name');
        $this->db->select('users.image');
        $this->db->select('users.status as user_status');
        $this->db->join('users', 'users.id=approvals.user_id', 'inner');
        return $this->db->get_where('approvals', $param)->result_array();
    }

    public function getApproval($id)
    {
        $this->db->select('approvals.*');
        $this->db->select('users.id as user_id');
        $this->db->select('user_name');
        $this->db->select('full_name');
        $this->db->select('users.image');
        $this->db->select('users.status as user_status');
        $this->db->join('users', 'users.id=approvals.user_id', 'inner');
        return $this->db->get_where('approvals', ['approvals.id' => $id])->row_array();
    }
}

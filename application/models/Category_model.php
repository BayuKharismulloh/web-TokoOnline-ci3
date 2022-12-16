<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    public function getCategories($param = [])
    {
        return $this->db->get_where('categories', $param)->result_array();
    }

    public function getCategory($category_id)
    {
        return $this->db->get_where('categories', ['id' => $category_id])->row_array();
    }
}

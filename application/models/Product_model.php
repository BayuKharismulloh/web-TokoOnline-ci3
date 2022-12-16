<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function getProducts($param = [])
    {
        $this->db->join('categories', 'categories.id=products.category_id', 'inner');

        $this->db->select('products.*');
        $this->db->select('categories.name as category_name');

        return $this->db->get_where('products', $param)->result_array();
    }

    public function filterProducts($param = [])
    {
        if (isset($param['like'])) {
            $this->db->like($param['like']);
        }

        if (isset($param['where'])) {
            $this->db->where($param['where']);
        }

        if (isset($param['limit'])) {
            $this->db->limit($param['limit'][0], $param['limit'][1]);
        }

        $this->db->join('categories', 'categories.id=products.category_id', 'inner');

        $this->db->select('products.*');
        $this->db->select('categories.name as category_name');

        return $this->db->get('products')->result_array();
    }

    public function getProduct($id)
    {
        $this->db->join('categories', 'categories.id=products.category_id', 'inner');

        $this->db->select('products.*');
        $this->db->select('categories.name as category_name');

        return $this->db->get_where('products', ['products.id' => $id])->row_array();
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carousel_model extends CI_Model
{
    public function getCarousels($param = [])
    {
        return $this->db->get_where('carousels', $param)->result_array();
    }

    public function getCarousel($id)
    {
        return $this->db->get_where('carousels', ['id' => $id])->row_array();
    }
}

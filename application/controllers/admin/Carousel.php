<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carousel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('common_model', 'common');
        $this->load->model('carousel_model', 'carousel');
    }

    public function index()
    {
        $data = [
            'title' => "Carousel | " . site_name(),
            'carousels' => $this->carousel->getCarousels()
        ];

        $this->template->load('admin/templates/admin_template', 'admin/carousels/carousels', $data);
    }

    public function add()
    {
        $data = [
            'title' => "Tambah carousel | " . site_name(),
        ];

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('carousel_title', 'Nama carousel', 'required');
            $this->form_validation->set_rules('carousel_link', 'Tautan', 'required');
            if ($this->form_validation->run()) {
                $config['upload_path']          = './uploads/images/carousels';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['file_name']            = 'sumber-rezeki-carousel-' . strtotime(date('Y-m-d H:i:s'));
                // 		$config['overwrite']            = true;
                $config['max_size']             = 2048; // 2MB
                // 		$config['max_width']            = 1080;
                // 		$config['max_height']           = 1080;

                $this->load->library('upload', $config);

                if($this->upload->do_upload('carousel_image')){
                    $pic = $this->upload->data();
                    
                    $source = './uploads/images/carousels/' . $pic['file_name'];
                    chmod($source, 0777);
    
                    // get sequence
                    $carousels_count = count($this->carousel->getCarousels());
                    $sequence = $carousels_count + 1;
    
                    $carousel = [
                        'title' => $this->input->post('carousel_title'),
                        'link' => $this->input->post('carousel_link'),
                        'image' => './uploads/images/carousels/' . $pic['file_name'],
                        'sequence' => $sequence,
                    ];
    
                    if ($this->session->role_id == 2) {
    
                        $carousel['status'] = 'IN_REVIEW';
    
                        $this->db->insert('carousels', $carousel);
                        $id = $this->db->insert_id();
    
                        $approval = [
                            'user_id' => $this->session->user_id,
                            'refference_id' => $id,
                            'type' => 'carousel',
                            'action' => 'ADD',
                            'title' => $this->session->full_name . ' ingin menambahkan carousel baru',
                        ];
    
                        $this->db->insert('approvals', $approval);
                    } else {
                        $carousel['status'] = 'PUBLISHED';
                        $this->db->insert('carousels', $carousel);
                    }
    
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    redirect('/admin/carousel/add');
                }else{
                    $data['pic_error'] = $this->upload->display_errors();
                }
            }
        }

        $this->template->load('admin/templates/admin_template', 'admin/carousels/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => "Ubah carousel | " . site_name(),
            'carousel' => $this->carousel->getCarousel($id)
        ];

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('carousel_title', 'Nama carousel', 'required');
            $this->form_validation->set_rules('carousel_link', 'Tautan', 'required');
            if ($this->form_validation->run()) {
                $config['upload_path']          = './uploads/images/carousels';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['file_name']            = 'sumber-rezeki-carousel-' . strtotime($data['carousel']['created_at']);
                $config['overwrite']            = true;
                $config['max_size']             = 2048; // 2MB
                // 		$config['max_width']            = 1080;
                // 		$config['max_height']           = 1080;

                $this->load->library('upload', $config);

                $carousel = [
                    'title' => $this->input->post('carousel_title'),
                    'link' => $this->input->post('carousel_link'),
                ];

                if ($this->upload->do_upload('carousel_image')) {
                    $pic = $this->upload->data();
                    $carousel['image'] = './uploads/images/carousels/' . $pic['file_name'];
                    
                    $source = './uploads/images/carousels/' . $pic['file_name'];
                    chmod($source, 0777);
                }

                if ($this->session->role_id == 2) {

                    $carousel['status'] = 'IN_REVIEW';

                    $this->db->update('carousels', $carousel, ['id' => $id]);

                    $approval = [
                        'user_id' => $this->session->user_id,
                        'refference_id' => $id,
                        'type' => 'carousel',
                        'action' => 'EDIT',
                        'title' => $this->session->full_name . ' ingin mengubah carousel "' . $data['carousel']['title'] . '"',
                    ];

                    $this->db->insert('approvals', $approval);
                } else {
                    $carousel['status'] = 'PUBLISHED';
                    $this->db->update('carousels', $carousel, ['id' => $id]);
                }

                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('/admin/carousel/edit/' . $id);
            }
        }

        $this->template->load('admin/templates/admin_template', 'admin/carousels/edit', $data);
    }

    public function delete()
    {
        $id = $this->input->post('carousel_id');

        if ($this->session->role_id == 1) {
            $this->db->delete('carousels', ['id' => $id]);
        } else {
            $carousel = $this->carousel->getCarousel($id);

            $approval = [
                'user_id' => $this->session->user_id,
                'refference_id' => $id,
                'type' => 'carousel',
                'action' => "DELETE",
                'title' => $this->session->full_name . ' ingin menghapus carousel "' . $carousel['title'] . '"',
            ];

            $this->db->insert('approvals', $approval);
        }


        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('/admin/carousel/');
    }
}

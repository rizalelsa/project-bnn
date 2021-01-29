<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Posting Berita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['berita'] = $this->db->get('berita')->result_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('berita/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'tanggal' => time()
            ];

            $upload_file = $_FILES['gambar']['name'];

            if ($upload_file) {
                $config['allowed_types'] = 'jpeg|jpg|png|gif';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/berita/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_file);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->insert('berita', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berita berhasil ditambahkan!</div>');
            redirect('berita/index');
        }
    }
}

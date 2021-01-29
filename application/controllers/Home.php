<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Home';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/home_topbar', $data);
        $this->load->view('index', $data, FALSE);
        $this->load->view('templates/footer');
    }

    public function berita()
    {
        $data['title'] = 'Berita';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/home_topbar', $data);
        $this->load->view('berita/berita', $data);
        $this->load->view('templates/footer');
    }

    public function about()
    {
        $data['title'] = 'About';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/home_topbar', $data);
        $this->load->view('about', $data);
        $this->load->view('templates/footer');
    }
}

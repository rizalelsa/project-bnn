<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pelayanan_model');
    }

    public function index()
    {
        $data['title'] = 'Permohonan Sosialisasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sosialisasi'] = $this->Pelayanan_model->persetujuanPermohonan('Disetujui');
        $data['name'] = $this->db->get('user')->result_array();
        // var_dump($data['']);
        // die;

        $this->form_validation->set_rules('no_hp', 'No. Hp', 'required');
        $this->form_validation->set_rules('nama_instansi', 'Nama Instansi', 'required');
        $this->form_validation->set_rules('alamat_instansi', 'Alamat Instansi', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Acara', 'required');
        $this->form_validation->set_rules('waktu1', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('waktu2', 'Waktu Selesai', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pelayanan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'user_id' => $this->input->post('user_id'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_instansi' => $this->input->post('nama_instansi'),
                'alamat_instansi' => $this->input->post('alamat_instansi'),
                'tanggal' => $this->input->post('tanggal'),
                'waktu' => $this->input->post('waktu1') . " sampai " . $this->input->post('waktu2'),
                'status' => $this->input->post('status'),
            ];

            $upload_file = $_FILES['berkas']['name'];

            if ($upload_file) {
                $config['allowed_types'] = 'pdf';
                $config['max_size']      = 0;
                $config['upload_path'] = './assets/berkas/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('berkas')) {
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('berkas', $new_file);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }
            $this->db->insert('permohonan_sosialisasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
            redirect('pelayanan/index');
        }
    }

    public function permohonanSosialisasi()
    {
        $data['title'] = 'Form Permohonan Sosialisasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('no_hp', 'No. Hp', 'required');
        $this->form_validation->set_rules('nama_instansi', 'Nama Instansi', 'required');
        $this->form_validation->set_rules('alamat_instansi', 'Alamat Instansi', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Acara', 'required');
        $this->form_validation->set_rules('waktu1', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('waktu2', 'Waktu Selesai', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('pelayanan/permohonansosialisasi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'user_id' => $this->input->post('user_id'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_instansi' => $this->input->post('nama_instansi'),
                'alamat_instansi' => $this->input->post('alamat_instansi'),
                'tanggal' => $this->input->post('tanggal'),
                'waktu' => $this->input->post('waktu1') . " sampai " . $this->input->post('waktu2'),
                'status' => 'Sedang diproses'
            ];

            $upload_file = $_FILES['berkas']['name'];

            if ($upload_file) {
                $config['allowed_types'] = 'pdf';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/berkas/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('berkas')) {
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('berkas', $new_file);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->insert('permohonan_sosialisasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
            redirect('pelayanan/permohonansosialisasi');
        }
    }

    public function detailSosialisasi()
    {
        $data['title'] = 'Detail Permohonan Sosialisasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sosialisasi'] = $this->db->get('permohonan_sosialisasi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelayanan/index', $data);
        $this->load->view('templates/footer');
    }

    public function editSosialisasi($id)
    {
        $data['title'] = 'Edit Sosialisasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sosialisasi'] = $this->Pelayanan_model->persetujuanPermohonan('Disetujui');

        $this->form_validation->set_rules('no_hp', 'No. Hp', 'required');
        $this->form_validation->set_rules('nama_instansi', 'Nama Instansi', 'required');
        $this->form_validation->set_rules('alamat_instansi', 'Alamat Instansi', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Acara', 'required');
        $this->form_validation->set_rules('waktu1', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('waktu2', 'Waktu Selesai', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pelayanan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $no_hp = $this->input->post('no_hp');
            $nama_instansi = $this->input->post('nama_instansi');
            $alamat_instansi = $this->input->post('alamat_instansi');
            $tanggal = $this->input->post('tanggal');
            $waktu = $this->input->post('waktu1') . " sampai " . $this->input->post('waktu2');
            $status = $this->input->post('status');

            $upload_file = $_FILES['berkas']['name'];

            if ($upload_file) {
                $config['allowed_types'] = 'pdf';
                $config['max_size']      = 0;
                $config['upload_path'] = './assets/berkas/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('berkas')) {
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('berkas', $new_file);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('no_hp', $no_hp);
            $this->db->set('nama_instansi', $nama_instansi);
            $this->db->set('alamat_instansi', $alamat_instansi);
            $this->db->set('tanggal', $tanggal);
            $this->db->set('waktu', $waktu);
            $this->db->set('status', $status);
            $this->db->where('id', $id);
            $this->db->update('permohonan_sosialisasi');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
            redirect('pelayanan');
        }
    }

    public function hapusPermohonan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sosialisasi'] = $this->Pelayanan_model->persetujuanPermohonan('Disetujui');

        $this->db->where('id', $this->input->post('id-data'));
        $this->db->delete('permohonan_sosialisasi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('pelayanan');
    }

    public function riwayat()
    {
        $data['title'] = 'Riwayat Permohonan Sosialisasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sosialisasi'] = $this->Pelayanan_model->getRiwayat($this->session->userdata('email'));
        $data['name'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('pelayanan/riwayat', $data);
        $this->load->view('templates/footer');
    }
}

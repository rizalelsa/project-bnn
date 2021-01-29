<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan_model extends CI_Model
{

    public function persetujuanPermohonan($status)
    {
        $this->db->select('persos.*,u.name');
        $this->db->from('permohonan_sosialisasi as persos');
        $this->db->join('user as u', 'persos.user_id = u.id', 'inner');
        $this->db->where('status', $status);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result_array();
    }
}

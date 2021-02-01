<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan_model extends CI_Model
{

    public function persetujuanPermohonan($status = null)
    {
        if ($status === null) {
            $this->db->select('persos.*,u.name as pemohon');
            $this->db->from('permohonan_sosialisasi as persos');
            $this->db->join('user as u', 'persos.user_id = u.id', 'inner');
            $this->db->where_not_in('status', 'Disetujui');
            $this->db->order_by('id', 'desc');
        } else {
            $this->db->select('persos.*,u.name as pemohon');
            $this->db->from('permohonan_sosialisasi as persos');
            $this->db->join('user as u', 'persos.user_id = u.id', 'inner');
            $this->db->where('status', $status);
            $this->db->order_by('id', 'desc');
        }
        return $this->db->get()->result_array();
    }

    public function getRiwayat($user)
    {
        $this->db->select('persos.*,u.name as pemohon');
        $this->db->from('permohonan_sosialisasi as persos');
        $this->db->join('user as u', 'persos.user_id = u.id', 'inner');
        $this->db->where('u.email', $user);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result_array();
    }

    public function getTotalData()
    {
        $this->db->select('COUNT(IF(MONTH(tanggal) = MONTH(CURRENT_DATE()), 1, NULL)) as monthly,
        COUNT(IF(YEAR(tanggal) = YEAR(CURRENT_DATE()) , 1, NULL)) as year ,
        COUNT(id) as total ');
        $this->db->from('permohonan_sosialisasi');
        return $this->db->get()->row_array();
    }
}

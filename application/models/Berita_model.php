<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    public function getBerita($id = null)
    {
        if ($id === null) {
            $this->db->select('*');
            $this->db->from('berita');
            $this->db->limit(6);
            $this->db->order_by('id', 'DESC');
        } else {
            $this->db->select('*');
            $this->db->from('berita');
            $this->db->where('id', $id);
        }
        return $this->db->get()->result_array();
    }
}

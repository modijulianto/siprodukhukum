<?php

class M_dashboard extends CI_Model
{
    // get tahun 
    public function getTahun()
    {
        $this->db->select('tahun');
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'DESC');
        return $this->db->get('tb_produk', 5)->result_array();
    }

    // menghitung jumlah produk hukum pertahun
    public function get_numRows_produk()
    {
        $this->db->where('tahun', date('Y'));
        $query = $this->db->get('tb_produk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}

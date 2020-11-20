<?php
class M_export extends CI_Model
{
    public function getProhum($tahun = null, $unit = null)
    {
        if ($tahun && $unit) {
            $this->db->where('tahun', $tahun);
            $this->db->where('id_unit', $unit);
        }
        if ($tahun && $unit == null) {
            $this->db->where('tahun', $tahun);
        }

        $this->db->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        $this->db->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.id_kategori');
        $this->db->order_by('tahun', 'DESC');
        return $this->db->get('tb_produk')->result_array();
    }
}

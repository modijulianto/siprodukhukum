<?php
class M_export extends CI_Model
{
    public function getProhum($tahun = null, $unit = null)
    {
        if ($tahun && $unit) {
            $units = $_POST['unit'];
            $this->db->where('tahun', $tahun);
            $this->db->where_in('tb_produk.id_unit', $units);
            $this->db->order_by('tb_produk.id_unit');
        } elseif ($tahun && $unit == null) {
            $this->db->where('tahun', $tahun);
        } elseif ($unit && $tahun == null) {
            $units = $_POST['unit'];
            $this->db->where_in('tb_produk.id_unit', $units);
            $this->db->order_by('tb_produk.id_unit');
        }

        $this->db->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        $this->db->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.id_kategori');
        $this->db->order_by('tahun', 'DESC');
        return $this->db->get('tb_produk')->result_array();
    }
}

<?php
class M_jdih extends CI_Model
{
    public function getProhumBaru()
    {
        $this->db->order_by('tahun', 'DESC');
        $this->db->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang');
        $this->db->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        return $this->db->get('tb_produk', 10)->result_array();
    }

    public function getProhumById($id)
    {
        $this->db->order_by('tahun', 'DESC');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.id_kategori');
        $this->db->join('tb_jenis_produk', 'tb_jenis_produk.id_jenis=tb_kategori.id_jenis');
        $this->db->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang');
        $this->db->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        $this->db->where('md5(id_produk)', $id);
        return $this->db->get('tb_produk')->row_array();
    }

    public function getUnit()
    {
        return $this->db->get('tb_unit')->result_array();
    }

    public function getTahun()
    {
        $this->db->select('tahun');
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('tb_produk')->result_array();
    }

    public function getStatus()
    {
        $this->db->select('status');
        $this->db->group_by('status');
        $this->db->order_by('status', 'ASC');
        return $this->db->get('tb_produk')->result_array();
    }

    public function getKategori()
    {
        return $this->db->get('tb_kategori')->result_array();
    }
}

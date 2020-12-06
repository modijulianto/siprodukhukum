<?php

class M_dashboard extends CI_Model
{
    public function getJmlProdukBerlaku($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->where('status', 'Berlaku');
        $query = $this->db->get('tb_produk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getJmlProdukTidakBerlaku($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->where('status', 'Tidak Berlaku');
        $query = $this->db->get('tb_produk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    // get statistik status produk hukum
    public function getStatus()
    {
        $this->db->select('status');
        $this->db->select('COUNT(status) AS jumlah');
        $this->db->group_by('status');
        $this->db->order_by('status', 'ASC');
        return $this->db->get('tb_produk')->result_array();
    }

    public function getJmlProduk_byStatus($status)
    {
        if ($this->session->userdata('id_unit') != 1) {
            $this->db->where('id_unit', $this->session->userdata('id_unit'));
        }

        $this->db->where('status', $status);
        $query = $this->db->get('tb_produk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    // get jumlah Admin
    public function getJmlAdmin()
    {
        $this->db->where('role_id', 1);
        $query = $this->db->get('tb_user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getJmlOperator()
    {
        $this->db->where('role_id', 2);
        $query = $this->db->get('tb_user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getJmlProhumBlmValid()
    {
        $this->db->where('validasi', 0);
        $query = $this->db->get('tb_produk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    //////////////////////// STATISTIK ////////////////////////

    // Statistik Per Jenis
    public function getJenis()
    {
        $this->db->join('tb_kategori', 'tb_produk.id_kategori=tb_kategori.id_kategori');
        $this->db->join('tb_jenis_produk', 'tb_jenis_produk.id_jenis=tb_kategori.id_jenis');
        $this->db->select('nama_jenis');
        $this->db->select('COUNT(IF(status="Berlaku",tb_produk.id_produk,NULL)) AS berlaku');
        $this->db->select('COUNT(IF(status="Tidak Berlaku",tb_produk.id_produk,NULL)) AS tidak_berlaku');
        $this->db->group_by('tb_kategori.id_jenis');
        $this->db->order_by('tb_kategori.id_jenis', 'ASC');
        return $this->db->get('tb_produk')->result_array();
    }

    // Statistik Per Kategori
    public function getKatProduk()
    {
        $this->db->join('tb_kategori', 'tb_produk.id_kategori=tb_kategori.id_kategori');
        $this->db->select('nama_kategori');
        $this->db->select('COUNT(IF(status="Berlaku",tb_produk.id_kategori,NULL)) AS berlaku');
        $this->db->select('COUNT(IF(status="Tidak Berlaku",tb_produk.id_kategori,NULL)) AS tidak_berlaku');
        $this->db->where('tb_produk.id_unit', $this->session->userdata('id_unit'));
        $this->db->group_by('tb_produk.id_kategori');
        $this->db->order_by('tb_produk.id_kategori', 'ASC');
        return $this->db->get('tb_produk')->result_array();
    }

    // Statistik Per Unit
    public function getUnit()
    {
        $this->db->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        $this->db->select('nama_unit');
        $this->db->select('COUNT(IF(status="Berlaku",tb_produk.id_unit,NULL)) AS berlaku');
        $this->db->select('COUNT(IF(status="Tidak Berlaku",tb_produk.id_unit,NULL)) AS tidak_berlaku');
        $this->db->group_by('tb_produk.id_unit');
        $this->db->order_by('tb_produk.id_unit', 'ASC');
        return $this->db->get('tb_produk')->result_array();
    }

    // Statistik per Tahun
    public function getTahun()
    {
        $this->db->select('tahun');
        $this->db->select('COUNT(IF(status="Berlaku", tahun, NULL)) AS berlaku');
        $this->db->select('COUNT(IF(status="Tidak Berlaku", tahun, NULL)) AS tidak_berlaku');
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('tb_produk')->result_array();
    }
    //////////////////////// END STATISTIK ////////////////////////
}

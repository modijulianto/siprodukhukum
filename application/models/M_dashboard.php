<?php

class M_dashboard extends CI_Model
{
    // get tahun 
    public function getJenisProduk()
    {
        $this->db->where('id_unit', $this->session->userdata('id_unit'));
        return $this->db->get('tb_jenis_produk')->result_array();
    }

    public function getJenis()
    {
        return $this->db->get('tb_jenis_produk')->result_array();
    }

    public function getKatProduk()
    {
        $this->db->where('id_unit', $this->session->userdata('id_unit'));
        return $this->db->get('tb_kategori')->result_array();
    }

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

    // get status produk hukum
    public function getStatus()
    {
        $this->db->select('status');
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

    public function getBerlakuByJenis($id_jenis)
    {
        $this->db->join('tb_kategori', 'tb_produk.id_kategori=tb_kategori.id_kategori');
        $this->db->join('tb_jenis_produk', 'tb_jenis_produk.id_jenis=tb_kategori.id_jenis');
        $this->db->where('tb_kategori.id_jenis', $id_jenis);
        $this->db->where('status', 'Berlaku');
        $query = $this->db->get('tb_produk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getTidakBerlakuByJenis($id_jenis)
    {
        $this->db->join('tb_kategori', 'tb_produk.id_kategori=tb_kategori.id_kategori');
        $this->db->join('tb_jenis_produk', 'tb_jenis_produk.id_jenis=tb_kategori.id_jenis');
        $this->db->where('tb_kategori.id_jenis', $id_jenis);
        $this->db->where('status', 'Tidak Berlaku');
        $query = $this->db->get('tb_produk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}

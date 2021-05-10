<?php
class M_jdih extends CI_Model
{
    public function cariProhum($limit, $start, $prohum = null, $no = null, $tahun = null, $id_unit = null, $id_kategori = null, $status = null)
    {
        if ($prohum) {
            $this->db->like('judul', $prohum);
        }
        if ($no) {
            $this->db->like('no', $no);
        }
        if ($tahun) {
            $this->db->like('tahun', $tahun);
        }
        if ($id_unit) {
            $this->db->like('tb_produk.id_unit', $id_unit);
        }
        if ($id_kategori) {
            $this->db->like('tb_produk.id_kategori', $id_kategori);
        }
        if ($status) {
            $this->db->like('status', $status);
        }

        $this->db->order_by('tahun', 'DESC');
        $this->db->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang');
        $this->db->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        return $this->db->get('tb_produk', $limit, $start)->result_array();
    }

    public function getProhumBaru()
    {
        $this->db->order_by('tahun', 'DESC');
        $this->db->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang');
        $this->db->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        return $this->db->get('tb_produk', 5)->result_array();
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

    public function getProhumByIdUnit($id, $limit, $start)
    {
        $this->db->order_by('tahun', 'DESC');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.id_kategori');
        $this->db->join('tb_jenis_produk', 'tb_jenis_produk.id_jenis=tb_kategori.id_jenis');
        $this->db->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang');
        $this->db->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        $this->db->where('md5(tb_produk.id_unit)', $id);
        return $this->db->get('tb_produk', $limit, $start)->result_array();
    }

    public function countProdukUnit($id)
    {
        $this->db->where('md5(tb_produk.id_unit)', $id);
        return $this->db->get('tb_produk')->num_rows();
    }

    public function getProhumByIdKategori($id)
    {
        $this->db->order_by('tahun', 'DESC');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.id_kategori');
        $this->db->join('tb_jenis_produk', 'tb_jenis_produk.id_jenis=tb_kategori.id_jenis');
        $this->db->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang');
        $this->db->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        $this->db->where('md5(tb_produk.id_kategori)', $id);
        return $this->db->get('tb_produk')->result_array();
    }

    public function getKatProhumByIdUnit($id)
    {
        // $this->db->where('id_unit', 1);
        // $this->db->or_where('md5(id_unit)', $id);
        return $this->db->get('tb_kategori')->result_array();
    }

    public function getUnit()
    {
        return $this->db->get('tb_unit')->result_array();
    }

    public function getUnitById($id)
    {
        return $this->db->get_where('tb_unit', ['md5(id_unit)' => $id])->row_array();
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

    public function getKategoriById($id)
    {
        return $this->db->get_where('tb_kategori', ['md5(id_kategori)' => $id])->row_array();
    }

    public function getJmlProdukByUnit($id)
    {
        $this->db->where('id_unit', $id);
        $query = $this->db->get('tb_produk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getJmlProdukByKat($id)
    {
        $this->db->where('id_kategori', $id);
        $query = $this->db->get('tb_produk');
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

    public function getBerlakuByTahun($tahun)
    {
        $this->db->where('tahun', $tahun);
        $this->db->where('status', 'Berlaku');
        $query = $this->db->get('tb_produk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getTidakBerlakuByTahun($tahun)
    {
        $this->db->where('tahun', $tahun);
        $this->db->where('status', 'Tidak Berlaku');
        $query = $this->db->get('tb_produk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getProdukByTahun()
    {
        $this->db->select('tahun');
        $this->db->select('COUNT(tahun) AS jml');
        $this->db->select('status');
        $this->db->group_by('status');
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'ASC');
        // $this->db->where('status', 'Berlaku');
        return $this->db->get('tb_produk')->result_array();
    }


    ////////////////////// STATISTIK //////////////////////
    // Statistik per Tahun
    public function statistikTahun()
    {
        $this->db->select('tahun');
        $this->db->select('COUNT(IF(status="Berlaku", tahun, NULL)) AS berlaku');
        $this->db->select('COUNT(IF(status="Tidak Berlaku", tahun, NULL)) AS tidak_berlaku');
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('tb_produk')->result_array();
    }

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
    ////////////////////// END STATISTIK //////////////////////
}

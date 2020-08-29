<?php
class M_admin extends CI_Model
{

    ///////////////////////////////////// PRODUK HUKUM /////////////////////////////////////
    public function get_produkHukum()
    {
        // Menampilkan data produk hukum yang sesuai dengan unit yang membuatnya 
        $this->db->where('tb_produk.id_unit', $this->session->userdata('id_unit'));

        $this->db->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        $this->db->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.id_kategori');
        $this->db->order_by('id_produk', 'DESC');
        return $this->db->get('tb_produk')->result_array();
    }
    ///////////////////////////////////// PRODUK HUKUM /////////////////////////////////////

    ///////////////////////////////////// ADMINISTRATOR /////////////////////////////////////
    public function get_admin()
    {
        $this->db->join('tb_unit', 'tb_unit.id_unit=tb_user.id_unit');
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('tb_user', ['role_id' => 1])->result_array();
    }

    //Menampilkan data admin ke form untuk update data admin
    function get_admin_wh($id)
    {
        $this->db->where('id=', $id);
        $admin = $this->db->get('tb_user')->row_array();
        return $admin;
    }

    public function save_admin()
    {
        $konfigurasi = array(
            'allowed_types' => 'JPG|jpg|jpeg|png|gif|ico',
            'upload_path' => realpath('./upload')
        );
        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload('admin');

        if ($_FILES['admin']['name'] == '') {
            $data = $this->db->set('image', "default.jpeg");
        } else {
            $data = $this->db->set('image', $_FILES['admin']['name']);
        }

        $data = array(
            'name' => $_POST['nama'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'role_id' => 1,
            'id_unit' => 1,
            'is_active' => 1,
            'date_created' => time(),
        );
        $this->db->insert('tb_user', $data);
    }

    public function update_admin()
    {
        $this->db->set('name', $_POST['nama']);
        $this->db->where('id', $_POST['id']);
        $this->db->update('tb_user');
    }
    ///////////////////////////////////// END ADMINISTRATOR /////////////////////////////////////


    ///////////////////////////////////// OPERATOR /////////////////////////////////////
    public function get_operator()
    {
        $this->db->join('tb_unit', 'tb_unit.id_unit=tb_user.id_unit');
        return $this->db->get_where('tb_user', ['role_id' => 2])->result_array();
    }

    //Menampilkan data operator ke form untuk update data operator
    function get_operator_wh($id)
    {
        $this->db->where('id=', $id);
        $operator = $this->db->get('tb_user')->row_array();
        return $operator;
    }

    public function save_operator()
    {
        $konfigurasi = array(
            'allowed_types' => 'JPG|jpg|jpeg|png|gif|ico',
            'upload_path' => realpath('./upload')
        );
        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload('operator');

        if ($_FILES['operator']['name'] == '') {
            $data = $this->db->set('image', "default.jpeg");
        } else {
            $data = $this->db->set('image', $_FILES['operator']['name']);
        }

        $data = array(
            'name' => $_POST['nama'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'role_id' => 2,
            'id_unit' => $_POST['id_unit'],
            'is_active' => 1,
            'date_created' => time(),
        );
        $this->db->insert('tb_user', $data);
    }

    public function update_operator()
    {
        $data = array(
            'name' => $_POST['nama'],
            'id_unit' => $_POST['id_unit']
        );

        $this->db->where('id', $_POST['id']);
        $this->db->update('tb_user', $data);
    }
    ///////////////////////////////////// END OPERATOR /////////////////////////////////////


    ///////////////////////////////////// UNIT /////////////////////////////////////
    public function get_unit()
    {
        $this->db->order_by('id_unit', 'DESC');
        return $this->db->get('tb_unit')->result_array();
    }

    //Menampilkan data unit ke form untuk update data unit
    function get_unit_wh($id)
    {
        $this->db->where('id_unit=', $id);
        $unit = $this->db->get('tb_unit')->row_array();
        return $unit;
    }

    function save_unit()
    {
        $unit = $this->input->post('unit');
        $this->db->set('nama_unit', $unit);
        $this->db->insert('tb_unit');
    }

    function update_unit()
    {
        $id = $this->input->post('id');
        $unit = $this->input->post('unit');
        $this->db->set('nama_unit', $unit);
        $this->db->where('id_unit', $id);
        $this->db->update('tb_unit');
    }
    ///////////////////////////////////// END UNIT /////////////////////////////////////


    ///////////////////////////////////// JENIS PRODUK /////////////////////////////////////
    public function get_jenis()
    {
        // Menampilkan data jenis produk dengan id_unit 1 dan jenis produk yang sesuai dengan unit yang membuatnya 
        $this->db->where('id_unit', 1);
        $this->db->or_where('id_unit', $this->session->userdata('id_unit'));

        $this->db->order_by('id_jenis', 'DESC');
        return $this->db->get('tb_jenis_produk')->result_array();
    }

    //Menampilkan data jenis produk ke form untuk update data jenis produk
    function get_jenis_wh($id)
    {
        $this->db->where('id_jenis', $id);
        $jenis = $this->db->get('tb_jenis_produk')->row_array();
        return $jenis;
    }

    public function save_jenis()
    {
        $this->db->set('id_unit', $this->session->userdata('id_unit'));
        $this->db->set('nama_jenis', $_POST['jenis']);
        $this->db->insert('tb_jenis_produk');
    }

    public function update_jenis()
    {
        $this->db->set('nama_jenis', $_POST['jenis']);
        $this->db->where('id_jenis', $_POST['id']);
        $this->db->update('tb_jenis_produk');
    }
    ///////////////////////////////////// END JENIS PRODUK /////////////////////////////////////

    ///////////////////////////////////// KATEGORI /////////////////////////////////////
    public function get_kategori()
    {
        // Menampilkan data kategori dengan id_unit 1 dan kategori yang sesuai dengan unit yang membuatnya 
        $this->db->where('id_unit', 1);
        $this->db->or_where('id_unit', $this->session->userdata('id_unit'));

        $this->db->join('tb_jenis_produk', 'tb_jenis_produk.id_jenis=tb_kategori.id_jenis');
        $this->db->order_by('id_kategori', 'DESC');
        return $this->db->get('tb_kategori')->result_array();
    }

    //Menampilkan data kategori produk ke form untuk update data kategori produk
    function get_kategori_wh($id)
    {
        $this->db->where('id_kategori', $id);
        $kategori = $this->db->get('tb_kategori')->row_array();
        return $kategori;
    }

    public function save_kategori()
    {
        $data = array(
            'id_unit' => $this->session->userdata('id_unit'),
            'id_jenis' => $_POST['id_jenis'],
            'nama_kategori' => $_POST['kategori']
        );
        $this->db->insert('tb_kategori', $data);
    }

    public function update_kategori()
    {
        $data = array(
            'id_jenis' => $_POST['id_jenis'],
            'nama_kategori' => $_POST['kategori']
        );
        $this->db->where('id_kategori', $_POST['id']);
        $this->db->update('tb_kategori', $data);
    }
    ///////////////////////////////////// END KATEGORI /////////////////////////////////////

    ///////////////////////////////////// TENTANG /////////////////////////////////////
    public function get_tentang()
    {
        // Menampilkan tentang sesuai dengan unitnya dan data tentang dengan id_unit 1
        $this->db->where('id_unit', 1);
        $this->db->or_where('id_unit', $this->session->userdata('id_unit'));

        $this->db->order_by('id_tentang', 'DESC');
        return $this->db->get('tb_tentang')->result_array();
    }

    //Menampilkan data tentang ke form untuk update data tentang
    function get_tentang_wh($id)
    {
        $this->db->where('id_tentang', $id);
        $tentang = $this->db->get('tb_tentang')->row_array();
        return $tentang;
    }

    public function save_tentang()
    {
        $data = array(
            'nama_tentang' => $_POST['tentang'],
            'id_unit' => $this->session->userdata('id_unit')
        );
        $this->db->insert('tb_tentang', $data);
    }

    public function update_tentang()
    {
        $data = array(
            'nama_tentang' => $_POST['tentang']
        );
        $this->db->where('id_tentang', $_POST['id']);
        $this->db->update('tb_tentang', $data);
    }
    ///////////////////////////////////// END KATEGORI /////////////////////////////////////


    ///////////////////////////////////// DELETE DATA /////////////////////////////////////
    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    ///////////////////////////////////// END DELETE DATA /////////////////////////////////////
}

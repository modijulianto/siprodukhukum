<?php
class M_admin extends CI_Model
{

    ///////////////////////////////////// OPERATOR /////////////////////////////////////
    public function get_operator()
    {
        $this->db->join('tb_unit', 'tb_unit.id_unit=tb_user.id_unit');
        return $this->db->get_where('tb_user', ['role_id' => 2])->result_array();
    }

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
        $this->db->order_by('id_jenis', 'DESC');
        return $this->db->get('tb_jenis_produk')->result_array();
    }

    function get_jenis_wh($id)
    {
        $this->db->where('id_jenis', $id);
        $jenis = $this->db->get('tb_jenis_produk')->row_array();
        return $jenis;
    }

    public function save_jenis()
    {
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


    ///////////////////////////////////// DELETE DATA /////////////////////////////////////
    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    ///////////////////////////////////// END DELETE DATA /////////////////////////////////////
}

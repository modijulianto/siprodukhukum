<?php
defined('BASEPATH') or exit('No direct script acess allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_admin');
        is_logged_in();
    }

    ////////////////////////////////////// OPERATOR //////////////////////////////////////
    public function data_operator()
    {
        $data['akun'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Data Operator";
        $data['opr'] = $this->M_admin->get_operator();
        $data['unit'] = $this->db->get('tb_unit')->result_array();
        $data['content'] = "data_table/data_operator";

        $this->form_validation->set_rules('nama', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'This email is already registered!'
        ]);
        $this->form_validation->set_rules('password', '', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/template_admin', $data);
            $this->load->view('templates/admin_footer', $data);
        } else {
            $this->M_admin->save_operator($_POST);
            $this->session->set_flashdata('operator', 'Added');
            redirect('Admin/data_operator');
        }
    }

    public function update_operator()
    {
        echo json_encode($this->M_admin->get_operator_wh($_POST['id']));
    }

    function saveUpdate_operator()
    {
        $result['error'] = TRUE;
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', array('required' => '<p style="color: red">Nama owner harus diisi.</p>'));
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        // $this->form_validation->set_rules('password', '', 'required', array('required' => '<p style="color: red">Password harus diisi.</p>'));
        if ($this->form_validation->run() == FALSE) {
            $this->data_operator();
        } else {
            $upload_image = $_FILES['operator']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'JPG|JPEG|jpg|jpeg|png|gif|ico';
                // $config['max_size'] = '2048';
                $config['upload_path'] = './upload';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('operator')) {
                    $old_image = $_POST['old_image'];
                    // print_r($old_image);
                    // die;
                    if ($old_image != 'default.jpeg') {
                        unlink(FCPATH . 'upload/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            //mengirim post ke model
            $this->M_admin->update_operator($_POST);
            $this->session->set_flashdata('operator', 'Updated');
            redirect('Admin/data_operator');
        }
    }

    public function delete_operator($id)
    {
        $this->db->where('md5(id)', $id);
        $data['user'] = $this->db->get('tb_user')->row_array();

        $foto = $data['user']['image'];
        if ($foto != 'default.jpeg') {
            unlink(FCPATH . 'upload/' . $foto);
        }

        $where = array('md5(id)' => $id);
        $this->M_admin->delete_data($where, 'tb_user');
        $this->session->set_flashdata('operator', 'Deleted');
        redirect('Admin/data_operator');
    }
    ////////////////////////////////////// END OPERATOR //////////////////////////////////////


    ////////////////////////////////////// UNIT //////////////////////////////////////
    public function data_unit()
    {
        $data['akun'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Data Unit";
        $data['unit'] = $this->M_admin->get_unit();
        $data['content'] = "data_table/data_unit";

        $this->form_validation->set_rules('unit', 'Unit', 'required|trim|is_unique[tb_unit.nama_unit]', [
            'is_unique' => 'This unit is already registered!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/template_admin', $data);
            $this->load->view('templates/admin_footer', $data);
        } else {
            $this->M_admin->save_unit($_POST);
            $this->session->set_flashdata('unit', 'Added');
            redirect('Admin/data_unit');
        }
    }

    public function update_unit()
    {
        echo json_encode($this->M_admin->get_unit_wh($_POST['id']));
    }

    function saveUpdate_unit()
    {
        $result['error'] = TRUE;
        $this->form_validation->set_rules('unit', 'Unit', 'required|trim|is_unique[tb_unit.nama_unit]', [
            'is_unique' => 'This unit is already registered!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->data_unit();
        } else {
            //mengirim post ke model
            $this->M_admin->update_unit($_POST);
            $this->session->set_flashdata('unit', 'Updated');
            redirect('Admin/data_unit');
        }
    }

    public function delete_unit($id)
    {
        $where = array('md5(id_unit)' => $id);
        $this->M_admin->delete_data($where, 'tb_unit');
        $this->session->set_flashdata('unit', 'Deleted');
        redirect('Admin/data_unit');
    }
    ////////////////////////////////////// END UNIT //////////////////////////////////////


    ////////////////////////////////////// JENIS PRODUK //////////////////////////////////////
    public function data_jenisProduk()
    {
        $data['akun'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Data Jenis Produk";
        $data['jenis'] = $this->M_admin->get_jenis();
        $data['content'] = "data_table/data_jenisProduk";

        $jenis = $this->input->post('jenis');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim|is_unique[tb_jenis_produk.nama_jenis]', [
            'is_unique' => $jenis . ' is already registered!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/template_admin', $data);
            $this->load->view('templates/admin_footer', $data);
        } else {
            $this->M_admin->save_jenis($_POST);
            $this->session->set_flashdata('jenis', 'Added');
            redirect('Admin/data_jenisProduk');
        }
    }

    public function update_jenis()
    {
        echo json_encode($this->M_admin->get_jenis_wh($_POST['id']));
    }

    function saveUpdate_jenis()
    {
        $result['error'] = TRUE;
        $jenis = $this->input->post('jenis');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim|is_unique[tb_jenis_produk.nama_jenis]', [
            'is_unique' => $jenis . ' is already registered!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->data_jenisProduk();
        } else {
            $this->M_admin->update_jenis($_POST);
            $this->session->set_flashdata('jenis', 'Updated');
            redirect('Admin/data_jenisProduk');
        }
    }

    public function delete_jenis($id)
    {
        $where = array('md5(id_jenis)' => $id);
        $this->M_admin->delete_data($where, 'tb_jenis_produk');
        $this->session->set_flashdata('jenis', 'Deleted');
        redirect('Admin/data_jenisProduk');
    }
    ////////////////////////////////////// END JENIS PRODUK //////////////////////////////////////
}

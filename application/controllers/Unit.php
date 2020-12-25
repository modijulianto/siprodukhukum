<?php
defined('BASEPATH') or exit('No direct script acess allowed');
class Unit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_admin');
        $this->load->model('M_jdih');
        is_logged_in();
        is_admin();
    }

    ////////////////////////////////////// UNIT //////////////////////////////////////
    public function index()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Unit";
        $data['unit'] = $this->M_admin->get_unit();
        $data['content'] = "data_table/data_unit";

        $this->form_validation->set_rules('unit', 'Unit', 'required|trim|is_unique[tb_unit.nama_unit]', [
            'is_unique' => 'This unit is already registered!'
        ]);
        $this->form_validation->set_rules('singkatan', 'singkatan', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/template_admin', $data);
            $this->load->view('templates/admin_footer', $data);
        } else {
            $this->M_admin->save_unit($_POST);
            $this->session->set_flashdata('unit', 'Added');
            redirect('Unit');
        }
    }

    public function update_unit()
    {
        echo json_encode($this->M_admin->get_unit_wh($_POST['id']));
    }

    function saveUpdate_unit()
    {
        $result['error'] = TRUE;
        $this->form_validation->set_rules('unit', 'Unit', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            //mengirim post ke model
            $this->M_admin->update_unit($_POST);
            $this->session->set_flashdata('unit', 'Updated');
            redirect('Unit');
        }
    }

    public function delete_unit($id)
    {
        $where = array('md5(id_unit)' => $id);
        $this->M_admin->delete_data($where, 'tb_unit');
        $this->session->set_flashdata('unit', 'Deleted');
        redirect('Unit');
    }
    ////////////////////////////////////// END UNIT //////////////////////////////////////
}

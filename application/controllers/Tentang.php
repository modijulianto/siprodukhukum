<?php
defined('BASEPATH') or exit('No direct script acess allowed');
class Tentang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_admin');
        $this->load->model('M_jdih');
        is_logged_in();
    }

    ////////////////////////////////////// TENTANG //////////////////////////////////////
    public function index()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Tentang";
        $data['tentang'] = $this->M_admin->get_tentang();
        $data['unit'] = $this->M_admin->get_unit();
        $data['content'] = "data_table/data_tentang";

        $this->form_validation->set_rules('tentang', 'Tentang', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/template_admin', $data);
            $this->load->view('templates/admin_footer', $data);
        } else {
            $this->M_admin->save_tentang($_POST);
            $this->session->set_flashdata('tentang', 'Added');
            redirect('Tentang');
        }
    }

    public function update_tentang()
    {
        echo json_encode($this->M_admin->get_tentang_wh($_POST['id']));
    }

    function saveUpdate_tentang()
    {
        $result['error'] = TRUE;
        $this->form_validation->set_rules('tentang', 'tentang', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $this->M_admin->update_tentang($_POST);
            $this->session->set_flashdata('tentang', 'Updated');
            redirect('Tentang');
        }
    }

    public function delete_tentang($id)
    {
        $where = array('md5(id_tentang)' => $id);
        $this->M_admin->delete_data($where, 'tb_tentang');
        $this->session->set_flashdata('tentang', 'Deleted');
        redirect('Tentang');
    }
    ////////////////////////////////////// END TENTANG //////////////////////////////////////
}

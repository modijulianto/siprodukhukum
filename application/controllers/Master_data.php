<?php
defined('BASEPATH') or exit('No direct script acess allowed');
class Master_data extends CI_Controller
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

    ////////////////////////////////////// JENIS PRODUK //////////////////////////////////////
    public function index()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Jenis Produk";
        $data['jenis'] = $this->M_admin->get_jenis();
        $data['unit'] = $this->M_admin->get_unit();
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
            redirect('Master_data');
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
            $this->index();
        } else {
            $this->M_admin->update_jenis($_POST);
            $this->session->set_flashdata('jenis', 'Updated');
            redirect('Master_data');
        }
    }

    public function delete_jenis($id)
    {
        $where = array('md5(id_jenis)' => $id);
        $this->M_admin->delete_data($where, 'tb_jenis_produk');
        $this->session->set_flashdata('jenis', 'Deleted');
        redirect('Master_data');
    }
    ////////////////////////////////////// END JENIS PRODUK //////////////////////////////////////

    ////////////////////////////////////// KATEGORI //////////////////////////////////////
    public function data_kategori()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Kategori";
        $data['kat'] = $this->M_admin->get_kategori();
        $data['jenis'] = $this->M_admin->get_jenis();
        $data['unit'] = $this->M_admin->get_unit();
        $data['content'] = "data_table/data_kategori";

        $kategori = $this->input->post('kategori');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim|is_unique[tb_kategori.nama_kategori]', [
            'is_unique' => $kategori . ' is already registered!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/template_admin', $data);
            $this->load->view('templates/admin_footer', $data);
        } else {
            $this->M_admin->save_kategori($_POST);
            $this->session->set_flashdata('kategori', 'Added');
            redirect('Master_data/data_kategori');
        }
    }

    public function update_kategori()
    {
        echo json_encode($this->M_admin->get_kategori_wh($_POST['id']));
    }

    function saveUpdate_kategori()
    {
        $result['error'] = TRUE;
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->data_kategori();
        } else {
            $this->M_admin->update_kategori($_POST);
            $this->session->set_flashdata('kategori', 'Updated');
            redirect('Master_data/data_kategori');
        }
    }

    public function delete_kategori($id)
    {
        $where = array('md5(id_kategori)' => $id);
        $this->M_admin->delete_data($where, 'tb_kategori');
        $this->session->set_flashdata('kategori', 'Deleted');
        redirect('Master_data/data_kategori');
    }
    ////////////////////////////////////// END KATEGORI //////////////////////////////////////
}

<?php
defined('BASEPATH') or exit('No direct script acess allowed');
class Export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->library('pdf');
        $this->load->model('M_admin');
        is_logged_in();
    }

    public function excel_admin()
    {
        $data['title'] = 'Laporan Data Admin';
        $data['admin'] = $this->M_admin->get_admin();
        $data['tot_admin'] = $this->M_admin->get_numRows_admin();
        $this->load->view('export/excel/admin', $data);
    }

    public function excel_operator()
    {
        $data['title'] = 'Laporan Data Operator';
        $data['opr'] = $this->M_admin->get_operator();
        $data['tot_opr'] = $this->M_admin->get_numRows_operator();
        $this->load->view('export/excel/operator', $data);
    }

    public function excel_prohum()
    {
        $data['title'] = 'Laporan Data Produk Hukum';
        $data['opr'] = $this->M_admin->get_operator();
        $data['tot_opr'] = $this->M_admin->get_numRows_operator();
        $this->load->view('export/excel/operator', $data);
    }
}

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
        $this->load->model('M_export');
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
        $filter = $this->input->post('filter');
        $filterUnit = $this->input->post('filterUnit');
        $tahun = $this->input->post('tahun');
        $unit = [
            'unit' => $this->input->post('unit')
        ];



        if ($filter != '' && $tahun != '') {
            $data['title'] = 'Laporan Data Produk Hukum Tahun ' . $tahun;
            $data['prohum'] = $this->M_export->getProhum($tahun);
        } elseif ($filterUnit == 2 && $unit != '' && $tahun != '') {
            $data['title'] = 'Laporan Data Produk Hukum';
            $data['prohum'] = $this->M_export->getProhum_withUnit($tahun, $unit);
        } else {
            $data['title'] = 'Laporan Data Produk Hukum';
            $data['tahun'] = true;
            $data['prohum'] = $this->M_export->getProhum();
        }
        $this->load->view('export/excel/produk_hukum', $data);
    }
}

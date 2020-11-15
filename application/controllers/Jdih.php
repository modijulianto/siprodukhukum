<?php
defined('BASEPATH') or exit('No direct script acess allowed');
class Jdih extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_jdih');
    }

    public function index()
    {
        $data['title'] = "Beranda";
        $data['content'] = "frontend/beranda";
        $data['baru'] = $this->M_jdih->getProhumBaru();
        $data['unit'] = $this->M_jdih->getUnit();
        $data['tahun'] = $this->M_jdih->getTahun();
        $data['status'] = $this->M_jdih->getStatus();
        $data['kategori'] = $this->M_jdih->getKategori();
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/footer');
    }

    public function produk($id)
    {
        $data['title'] = "Detail Produk Hukum";
        $data['content'] = "frontend/detail";
        $data['prohum'] = $this->M_jdih->getProhumById($id);
        $data['baru'] = $this->M_jdih->getProhumBaru();
        $data['unit'] = $this->M_jdih->getUnit();
        $data['tahun'] = $this->M_jdih->getTahun();
        $data['status'] = $this->M_jdih->getStatus();
        $data['kategori'] = $this->M_jdih->getKategori();
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/footer');
    }
}

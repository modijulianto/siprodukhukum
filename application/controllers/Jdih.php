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
        $data['unit'] = $this->M_jdih->getUnit();
        $data['tahun'] = $this->M_jdih->getTahun();
        $data['status'] = $this->M_jdih->getStatus();
        $data['kategori'] = $this->M_jdih->getKategori();
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/footer');
    }

    public function unit($id)
    {
        $data['nama_unit'] = $this->M_jdih->getUnitById($id);
        $data['title'] = "Produk Hukum " . $data['nama_unit']['nama_unit'];
        $data['content'] = "frontend/unit";
        $data['prohum'] = $this->M_jdih->getProhumByIdUnit($id);
        $data['katProduk'] = $this->M_jdih->getKatProhumByIdUnit($id);
        $data['unit'] = $this->M_jdih->getUnit();
        $data['tahun'] = $this->M_jdih->getTahun();
        $data['status'] = $this->M_jdih->getStatus();
        $data['kategori'] = $this->M_jdih->getKategori();
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/footer');
    }

    public function kategori($id)
    {
        $data['nama_kategori'] = $this->M_jdih->getKategoriById($id);
        $data['title'] = "Produk Hukum | Kategori " . $data['nama_kategori']['nama_kategori'];
        $data['content'] = "frontend/kategori";
        $data['prohum'] = $this->M_jdih->getProhumByIdKategori($id);
        $data['unit'] = $this->M_jdih->getUnit();
        $data['tahun'] = $this->M_jdih->getTahun();
        $data['status'] = $this->M_jdih->getStatus();
        $data['kategori'] = $this->M_jdih->getKategori();
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/footer');
    }
}

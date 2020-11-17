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

        // Config Pagination
        $config['base_url'] = 'http://localhost/siprohum/Jdih/unit/' . $id;
        $config['total_rows'] = $this->M_jdih->countProdukUnit($id);
        $config['per_pages'] = 10;

        // initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(4);
        $data['prohum'] = $this->M_jdih->getProhumByIdUnit($id, $config['per_pages'], $data['start']);
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

    public function cari()
    {
        $data['title'] = "Produk Hukum";
        $data['content'] = "frontend/hasil_cari";
        $data['unit'] = $this->M_jdih->getUnit();
        $data['tahun'] = $this->M_jdih->getTahun();
        $data['status'] = $this->M_jdih->getStatus();
        $data['kategori'] = $this->M_jdih->getKategori();

        if ($this->input->post('submit')) {
            $data['prohum'] = $this->input->post('prohum');
            $this->session->set_userdata('prohum', $data['prohum']);
        } else {
            $data['prohum'] = $this->session->userdata('prohum');
        }

        // Config Pagination
        $this->db->like('judul', $data['prohum']);
        $this->db->from('tb_produk');

        $config['base_url'] = 'http://localhost/siprohum/Jdih/cari';
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_pages'] = 10;

        // initialize
        $this->pagination->initialize($config);

        $data['total_rows'] = $config['total_rows'];
        $data['start'] = $this->uri->segment(3);
        $data['hasil'] = $this->M_jdih->cariProhum($config['per_pages'], $data['start'], $data['prohum']);
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/footer');
    }
}

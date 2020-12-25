<?php
defined('BASEPATH') or exit('No direct script acess allowed');
class Produk_hukum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_admin');
        $this->load->model('M_jdih');
        is_logged_in();
    }

    ////////////////////////////////////// PRODUK HUKUM //////////////////////////////////////
    public function data_produkHukum1()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Produk Hukum";
        $data['prohum'] = $this->M_admin->get_produkHukum();
        $data['unit'] = $this->M_admin->get_unit();
        $data['opt_tahun'] = $this->M_jdih->getTahun();
        $data['content'] = "data_table/data_produkHukum";
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/template_admin', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function data_produkHukum()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Produk Hukum";
        $data['prohum'] = $this->M_admin->get_produkHukum();
        $data['prohum_blmValid'] = $this->M_admin->get_produkHukumBlmTervalidasi();
        $data['unit'] = $this->M_admin->get_unit();
        $data['opt_tahun'] = $this->M_jdih->getTahun();
        $data['content'] = "data_table/data_produkHukum";

        $this->form_validation->set_rules('id[]', '', 'required', array(
            'required' =>   '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                Pilih produk hukum yang akan di validasi.
                            </div>'
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/template_admin', $data);
            $this->load->view('templates/admin_footer', $data);
        } else {
            //mengirim post ke model
            $this->M_admin->validasi_prohum();
            $this->session->set_flashdata('prohum', 'Tervalidasi');
            redirect('Produk_hukum/data_produkHukum');
        }
    }
    public function data_prohum($id_unit)
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Produk Hukum";
        $data['prohum'] = $this->M_admin->get_prohum($id_unit);
        $data['prohum_blmValid'] = $this->M_admin->get_prohumBlmTervalidasi($id_unit);
        $data['unit'] = $this->M_admin->get_unit();
        $data['opt_tahun'] = $this->M_jdih->getTahun();
        $data['content'] = "data_table/data_produkHukum";

        $this->form_validation->set_rules('id[]', '', 'required', array(
            'required' =>   '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                Pilih produk hukum yang akan di validasi.
                            </div>'
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/template_admin', $data);
            $this->load->view('templates/admin_footer', $data);
        } else {
            //mengirim post ke model
            $this->M_admin->validasi_prohum();
            $this->session->set_flashdata('prohum', 'Tervalidasi');
            redirect('Produk_hukum/data_prohum/' . $id_unit);
        }
    }

    public function input_produkHukum()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Input Data Produk Hukum";
        $data['kat'] = $this->M_admin->get_kategori();
        $data['unit'] = $this->M_admin->get_unit();
        $data['content'] = "data_input/input_prohum";

        $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|numeric');
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('tentang', 'Tentang', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/template_admin', $data);
            $this->load->view('templates/admin_footer', $data);
        } else {
            $this->M_admin->save_prohum($_POST);
            $this->session->set_flashdata('prohum', 'Added');
            redirect('Produk_hukum/data_produkHukum');
        }
    }

    public function update_produkHukum($id)
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Input Data Produk Hukum";
        $data['prohum'] = $this->M_admin->get_produkHukumById($id);
        $data['unit'] = $this->M_admin->get_unit();
        $data['kat'] = $this->M_admin->get_kategori();
        $data['content'] = "data_input/update_prohum";

        $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|numeric');
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/template_admin', $data);
            $this->load->view('templates/admin_footer', $data);
        } else {
            $upload_file = $_FILES['produk']['name'];
            // print_r($_FILES);
            // die;

            if ($upload_file) {
                $konfigurasi = array(
                    'allowed_types' => 'pdf|doc|docx',
                    'upload_path' => realpath('./upload/produk'),
                    'remove_spaces' => true,
                    'mod_mime_fix' => true,
                );
                $this->load->library('upload', $konfigurasi);
                $this->upload->do_upload('produk');

                $old_file = $_POST['old_produk'];
                unlink(FCPATH . 'upload/produk/' . $old_file);

                $fileName = str_replace(" ", "_", $_FILES['produk']['name']);
                $this->db->set('file', $fileName);
                $this->db->where('id_produk', $_POST['id']);
                $this->db->update('tb_produk');
            }

            $this->M_admin->update_prohum($_POST);
            $this->session->set_flashdata('prohum', 'Updated');
            redirect('Produk_hukum/data_produkHukum');
        }
    }

    public function find_tentang()
    {
        $q = $this->input->post("tentang");
        $sql = "select id_tentang as id,nama_tentang as text from tb_tentang where nama_tentang like '%" . $q . "%' order by id_tentang asc";
        //die($sql);
        $data_tindakan = $this->db->query($sql)->result_array();

        echo json_encode($data_tindakan);
    }

    public function add_tentangBaru()
    {
        $this->form_validation->set_rules('tentangBaru', 'Tentang baru', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->input_produkHukum();
        } else {
            $tentangBaru = $this->input->post('tentangBaru');
            $id_unit = $this->session->userdata('id_unit');
            $data = $this->M_admin->addTentangBaru($tentangBaru, $id_unit);
            echo json_encode($data);
        }
    }

    public function detail_produkHukum($id)
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Detail Produk Hukum";
        $data['prohum'] = $this->M_admin->get_produkHukumById($id);
        $data['unit'] = $this->M_admin->get_unit();
        $data['content'] = "detail/detail_produkHukum";
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/template_admin');
        $this->load->view('templates/admin_footer');
    }

    public function delete_produkHukum($id)
    {
        $where = array('md5(id_produk)' => $id);
        $this->M_admin->delete_data($where, 'tb_produk');
        $this->session->set_flashdata('prohum', 'Deleted');
        redirect('Produk_hukum/data_produkHukum');
    }
    ////////////////////////////////////// PRODUK HUKUM //////////////////////////////////////
}

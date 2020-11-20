<?php
defined('BASEPATH') or exit('No direct script acess allowed');
class Admin extends CI_Controller
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
    public function data_produkHukum()
    {
        $data['akun'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Data Produk Hukum";
        $data['prohum'] = $this->M_admin->get_produkHukum();
        $data['unit'] = $this->M_admin->get_unit();
        $data['opt_tahun'] = $this->M_jdih->getTahun();
        $data['content'] = "data_table/data_produkHukum";
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/template_admin', $data);
        $this->load->view('templates/admin_footer', $data);
    }
    public function input_produkHukum()
    {
        $data['akun'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Input Data Produk Hukum";
        $data['kat'] = $this->M_admin->get_kategori();
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
            redirect('Admin/data_produkHukum');
        }
    }

    public function update_produkHukum($id)
    {
        $data['akun'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Input Data Produk Hukum";
        $data['prohum'] = $this->M_admin->get_produkHukumById($id);
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
            } else {
                echo $this->upload->display_errors();
            }

            $this->M_admin->update_prohum($_POST);
            $this->session->set_flashdata('prohum', 'Updated');
            redirect('Admin/data_produkHukum');
        }
    }

    public function save_produkHukum()
    {
        print_r($_POST);
        die;
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
    ////////////////////////////////////// PRODUK HUKUM //////////////////////////////////////

    ////////////////////////////////////// ADMINISTRATOR //////////////////////////////////////
    public function data_admin()
    {
        is_admin();
        $data['akun'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Data Administrator";
        $data['adm'] = $this->M_admin->get_admin();
        $data['content'] = "data_table/data_admin";

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
            $this->M_admin->save_admin($_POST);
            $this->session->set_flashdata('admin', 'Added');
            redirect('Admin/data_admin');
        }
    }

    public function update_admin()
    {
        echo json_encode($this->M_admin->get_admin_wh($_POST['id']));
    }

    function saveUpdate_admin()
    {
        is_admin();
        $result['error'] = TRUE;
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', array('required' => '<p style="color: red">Nama owner harus diisi.</p>'));
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        // $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '<p style="color: red">Password harus diisi.</p>'));
        if ($this->form_validation->run() == FALSE) {
            $this->data_admin();
        } else {
            $upload_image = $_FILES['admin']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'JPG|JPEG|jpg|jpeg|png|gif|ico';
                // $config['max_size'] = '2048';
                $config['upload_path'] = './upload';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('admin')) {
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
            $this->M_admin->update_admin($_POST);
            $this->session->set_flashdata('admin', 'Updated');
            redirect('Admin/data_admin');
        }
    }

    public function delete_admin($id)
    {
        is_admin();
        $data['akun'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        if (md5($data['akun']['id']) != $id) {
            $this->db->where('md5(id)', $id);
            $data['user'] = $this->db->get('tb_user')->row_array();

            $foto = $data['user']['image'];
            if ($foto != 'default.jpeg') {
                unlink(FCPATH . 'upload/' . $foto);
            }

            $where = array('md5(id)' => $id);
            $this->M_admin->delete_data($where, 'tb_user');
            $this->session->set_flashdata('admin', 'Deleted');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Oops!</b> you can\'t delete your own account!</div>');
        }
        redirect('Admin/data_admin');
    }
    ////////////////////////////////////// END ADMINISTRATOR //////////////////////////////////////


    ////////////////////////////////////// OPERATOR //////////////////////////////////////
    public function data_operator()
    {
        is_admin();
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
        is_admin();
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
        is_admin();
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
        is_admin();
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
        is_admin();
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
        is_admin();
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

    ////////////////////////////////////// KATEGORI //////////////////////////////////////
    public function data_kategori()
    {
        $data['akun'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Data Kategori";
        $data['kat'] = $this->M_admin->get_kategori();
        $data['jenis'] = $this->M_admin->get_jenis();
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
            redirect('Admin/data_kategori');
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
            redirect('Admin/data_kategori');
        }
    }

    public function delete_kategori($id)
    {
        $where = array('md5(id_kategori)' => $id);
        $this->M_admin->delete_data($where, 'tb_kategori');
        $this->session->set_flashdata('kategori', 'Deleted');
        redirect('Admin/data_kategori');
    }
    ////////////////////////////////////// END KATEGORI //////////////////////////////////////


    ////////////////////////////////////// TENTANG //////////////////////////////////////
    public function data_tentang()
    {
        $data['akun'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Data Tentang";
        $data['tentang'] = $this->M_admin->get_tentang();
        $data['content'] = "data_table/data_tentang";

        $this->form_validation->set_rules('tentang', 'Tentang', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/template_admin', $data);
            $this->load->view('templates/admin_footer', $data);
        } else {
            $this->M_admin->save_tentang($_POST);
            $this->session->set_flashdata('tentang', 'Added');
            redirect('Admin/data_tentang');
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
            $this->data_tentang();
        } else {
            $this->M_admin->update_tentang($_POST);
            $this->session->set_flashdata('tentang', 'Updated');
            redirect('Admin/data_tentang');
        }
    }

    public function delete_tentang($id)
    {
        $where = array('md5(id_tentang)' => $id);
        $this->M_admin->delete_data($where, 'tb_tentang');
        $this->session->set_flashdata('tentang', 'Deleted');
        redirect('Admin/data_tentang');
    }
    ////////////////////////////////////// END TENTANG //////////////////////////////////////
}

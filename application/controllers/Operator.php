<?php
defined('BASEPATH') or exit('No direct script acess allowed');
class Operator extends CI_Controller
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

    ////////////////////////////////////// OPERATOR //////////////////////////////////////
    public function index()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Operator";
        $data['opr'] = $this->M_admin->get_operator();
        $data['unit'] = $this->M_admin->get_unit();
        $data['content'] = "data_table/data_operator";

        $this->form_validation->set_rules('nama', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'This email is already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[retypePassword]');
        $this->form_validation->set_rules('retypePassword', 'Retype Password', 'required|min_length[6]|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/template_admin', $data);
            $this->load->view('templates/admin_footer', $data);
        } else {
            $this->M_admin->save_operator($_POST);
            $this->session->set_flashdata('operator', 'Added');
            redirect('Operator');
        }
    }

    public function activate()
    {
        $data['active'] = $this->db->get_where('tb_user', ['id' => $_POST['id']])->row_array();
        $is_active = $data['active']['is_active'];

        if ($is_active == 1) {
            $this->db->set('is_active', 0);
        } else {
            $this->db->set('is_active', 1);
        }


        $this->db->where('id', $_POST['id']);
        $this->db->update('tb_user');
    }

    public function update_operator()
    {
        echo json_encode($this->M_admin->get_operator_wh($_POST['id']));
    }

    function saveUpdate_operator()
    {
        $result['error'] = TRUE;
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', array('required' => '<p style="color: red">Nama owner harus diisi.</p>'));
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
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
            redirect('Operator');
        }
    }

    public function delete_operator($id)
    {
        $this->db->where('md5(id)', $id);
        $data['user'] = $this->db->get('tb_user')->row_array();

        $foto = $data['user']['image'];
        if ($foto != 'default.jpeg') {
            unlink(FCPATH . 'upload/' . $foto);
        }

        $where = array('md5(id)' => $id);
        $this->M_admin->delete_data($where, 'tb_user');
        $this->session->set_flashdata('operator', 'Deleted');
        redirect('Operator');
    }
    ////////////////////////////////////// END OPERATOR //////////////////////////////////////
}

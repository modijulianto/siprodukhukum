<?php
defined('BASEPATH') or exit('No direct script acess allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['akun'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Dasboard";
        $data['meta'] = "Dasboard";
        $data['content'] = "user/dashboard";
        $data['chart'] = TRUE;
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/template_admin', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function my_profile()
    {
        $data['title'] = "My Profile";
        $this->db->join('user_role', 'user_role.id=tb_user.role_id');
        $data['akun'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['content'] = 'user/my_profile';

        $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/template_admin', $data);
            $this->load->view('templates/admin_footer', $data);
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupdate
            $upload_image = $_FILES['foto']['name'];
            // var_dump($upload_image);
            // die;

            if ($upload_image) {
                $config['allowed_types'] = 'JPG|JPEG|jpg|jpeg|png|gif|ico';
                // $config['max_size'] = '2048';
                $config['upload_path'] = './upload';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_image = $data['akun']['image'];
                    if ($old_image != 'default.jpeg') {
                        unlink(FCPATH . 'upload/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                    $this->db->where('email', $email);
                    $this->db->update('tb_user');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $nama);
            $this->db->where('email', $email);
            $this->db->update('tb_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><b>Congratulation!</b> your profile has been updated!</div>');
            redirect('user/my_profile');
        }
    }

    function deletePhoto()
    {
        $data['akun'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $old_image = $data['akun']['image'];
        if ($old_image != 'default.jpeg') {
            unlink(FCPATH . 'upload/' . $old_image);
        }

        $this->db->set('image', 'default.jpeg');
        $this->db->where('email', $data['akun']['email']);
        $this->db->update('tb_user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><b>Congratulation!</b> your photo profile has been deleted!</div>');
        redirect('User/my_profile');
    }

    function changePassword()
    {
        $data['title'] = "Change Password";
        $data['meta'] = "Dashboard Akamana Coffee";
        $data['akun'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['content'] = 'user/change_password';

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/template_admin', $data);
            $this->load->view('templates/admin_footer', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['akun']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" style="color:black;"><b>Opss!</b> wrong current password!</div>');
                redirect('User/changePassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="color:black;"><b>Opss!</b> new password cannot be the same as current password!</div>');
                    redirect('User/changePassword');
                } else {
                    // jika password sudah benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tb_user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><b>Congrats!</b> password changed!</div>');
                    redirect('User/changePassword');
                }
            }
        }
    }
}

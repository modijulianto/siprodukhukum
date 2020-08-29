<?php
defined('BASEPATH') or exit('No direct script acess allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index()
    {
        if ($this->session->userdata('email')) {
            redirect('User');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Login";
            $data['meta'] = "Ini Tampilan Login";
            $this->load->view('auth/templates/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('auth/templates/auth_footer', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $akun = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        // jia user ada
        if ($akun) {
            // jika user aktif
            if ($akun['is_active'] == 1) {
                if (password_verify($password, $akun['password'])) {
                    $data = [
                        'id' => $akun['id'],
                        'nama' => $akun['nama'],
                        'email' => $akun['email'],
                        'image' => $akun['image'],
                        'role_id' => $akun['role_id'],
                        'id_unit' => $akun['id_unit']
                    ];

                    $this->session->set_userdata($data);
                    redirect('User');
                } else {
                    $this->session->set_flashdata('registered', '<div class="alert alert-warning" role="alert"><b>Failed!</b> wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('registered', '<div class="alert alert-warning" role="alert"><b>Failed!</b> your email is not activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('registered', '<div class="alert alert-warning" role="alert"><b>Failed!</b> your email is not registered!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('User');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'This email is already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password not match!',
            'min_length' => 'Password at least 6 character!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Registration";
            $data['meta'] = "Ini Tampilan Registrasi";
            $this->load->view('auth/templates/auth_header', $data);
            $this->load->view('auth/registration', $data);
            $this->load->view('auth/templates/auth_footer', $data);
        } else {

            $email = $this->input->post('email', true);

            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' =>  'default.jpeg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            // siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('tb_user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('registered', '<div class="alert alert-success" role="alert"><b>Congratulation!</b> your account has been created. Please activate your account!</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'siprohum@gmail.com',
            'smtp_pass' => 'siprohum102938',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('siprohum@gmail.com', 'SI Produk Hukum Undiksha');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tb_user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('registered', '<div class="alert alert-success" role="alert"><b>Success!</b> ' . $email . ' has been activated! Please login.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('tb_user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('registered', '<div class="alert alert-danger" role="alert"><b>Oops!</b> Account activation failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('registered', '<div class="alert alert-danger" role="alert"><b>Oops!</b> Account activation failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('registered', '<div class="alert alert-danger" role="alert"><b>Oops!</b> Account activation failed! Wrong email.</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('registered', '<div class="alert alert-success" role="alert"><b>Success!</b> you have been logout!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Forgot Password";
            $data['meta'] = "Ini Tampilan forgot password";
            $this->load->view('auth/templates/auth_header', $data);
            $this->load->view('auth/forgot_password', $data);
            $this->load->view('auth/templates/auth_footer', $data);
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('tb_user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('registered', '<div class="alert alert-success" role="alert"><b>Success!</b> Please check your email to reset your password!</div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('registered', '<div class="alert alert-danger" role="alert"><b>Oops!</b> The email has not been registered or has not been activated!</div>');
                redirect('auth/forgotPassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->session->set_userdata('reset_email', $email);
                    $this->changePassword();

                    redirect('auth/changePassword');
                } else {
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('registered', '<div class="alert alert-danger" role="alert"><b>Oops!</b> Reset password failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('registered', '<div class="alert alert-danger" role="alert"><b>Oops!</b> Reset password failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('registered', '<div class="alert alert-danger" role="alert"><b>Oops!</b> Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('Auth');
        }
        $this->form_validation->set_rules('password1', 'New Password', 'required|trim|min_length[6]|matches[password2]', ['matches' => 'The new password field does not match with repeat password']);
        $this->form_validation->set_rules('password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Change Password";
            $data['meta'] = "Ini Tampilan change password";
            $this->load->view('auth/templates/auth_header', $data);
            $this->load->view('auth/change_password', $data);
            $this->load->view('auth/templates/auth_footer', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('tb_user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('registered', '<div class="alert alert-success" role="alert"><b>Congratulation!</b> Password has been changed! Please login.</div>');
            redirect('auth');
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script acess allowed');
class Jdih extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Beranda";
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/footer');
    }
}

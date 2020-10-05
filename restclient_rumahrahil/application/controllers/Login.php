<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $data['user'] = $this->user->getAllUser();
        $data['title'] = "Login Siswa/Guru";
        $this->load->view('login/index', $data);
    }

    public function registrasi()
    {
        $data['user'] = $this->user->getAllUser();
        $data['title'] = "Daftar Siswa/Guru baru";
        $this->load->view('login/registrasi', $data);
    }
}

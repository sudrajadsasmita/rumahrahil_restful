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
        if ($this->input->post('email') === null) {
            $this->load->view('login/index', $data);
        } else {
            $this->_login();
        }
    }

    public function registrasi()
    {
        $data['user'] = $this->user->getAllUser();
        $data['title'] = "Daftar Siswa/Guru baru";
        $this->load->view('login/registrasi', $data);
    }
    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email'));
        $password = $this->input->post('password');
        $user = $this->user->getAllUser();
        if ($user) {
            if ($password == $user['password']) {
                if ($user['role_id'] == 1) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    echo "halaman siswa/guru (masih tahap pengambangan)";
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password anda salah</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email anda belum terdaftar</div>');
            redirect('login');
        }
    }
}

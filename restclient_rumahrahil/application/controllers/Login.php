<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logout();
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
        $password = $this->input->post('pass');
        $user = $this->user->getUserWhereEmail($email);
        if ($user) {
            if ($password == $user['password']) {
                if ($user['role_id'] >= 2) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    echo "Harusnya anda tidak masuk sini min !!!";
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
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil Logout</div>');
        redirect('login');
    }
}

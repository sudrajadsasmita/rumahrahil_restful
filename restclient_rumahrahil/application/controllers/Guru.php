<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['title'] = 'Dashboard';
        // $data['paket'] = $this->paket->getPaket();
        $this->load->view('templates/header_guru', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tampil()
    {
        $email = $this->session->userdata('email');
        $user = $this->user->getUserWhereEmail($email);
        if ($user['role_id'] == 3) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('guru/tampil_siswa');
                }
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['title'] = 'Nilai';
        // $data['paket'] = $this->paket->getPaket();
        $this->load->view('templates/header_guru', $data);
        $this->load->view('guru/tampil_siswa', $data);
        $this->load->view('templates/footer', $data);
    }
}
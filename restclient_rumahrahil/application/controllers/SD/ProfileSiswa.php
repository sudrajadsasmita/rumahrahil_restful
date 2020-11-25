<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileSiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('User_model', 'user');
        $this->load->model('Menu_model', 'menu');
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $role = $this->session->userdata('role_id') + 1;
        $data['user'] = $this->user->getUserWhereEmail($email);
        $jenjang = $data['user']['jenjang_id'];
        $kelas = $data['user']['kelas_id'];
        $data['data_siswa'] = $this->user->getUserWhereJenjangAndKelas($role, $jenjang, $kelas);
        var_dump($data['data_siswa']);
        die;
    }
}

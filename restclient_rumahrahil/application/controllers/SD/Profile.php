<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Menu_model', 'menu');
        $this->load->model('Profile_model', 'user');
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $roleId = $this->session->userdata('role_id');
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['title'] = 'Profile';
        $data['roleId'] = $roleId;
        $data['menu'] = $this->menu->getMenuWhereRoleId($roleId);
        $this->load->view('templates/header', $data);
        $this->load->view('profil/index', $data);
        $this->load->view('templates/footer', $data);
    }
}

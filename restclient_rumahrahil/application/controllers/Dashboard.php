<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('User_model', 'user');
        $this->load->model('Menu_model', 'menu');
        $this->load->model('SD_model/Paket_model', 'paket');
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $roleId = $this->session->userdata('role_id');
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['title'] = 'Dashboard';
        $data['paket'] = $this->paket->getPaket();
        $data['roleId'] = $roleId;
        $data['menu'] = $this->menu->getMenuWhereRoleId($roleId);
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer', $data);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('User_model', 'user');
        $this->load->model('SD_model/Soal_model');
    }

    public function index($id)
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['title'] = 'Tes Online';
        $data['soal'] = $this->Soal_model->getSoal($id);
        // var_dump($data['soal']);
        // die;
        // $this->load->view('templates/header_soal', $data);
        // $this->load->view('templates/sidebar_soal', $data);
        $this->load->view('soal/index', $data);
        // $this->load->view('templates/footer_soal', $data);
    }
}

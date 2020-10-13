<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SMP_model/Soal_model');
    }

    public function index() 
    {
        $data['soal'] = $this->Soal_model->getSoal();
        $data['judul'] = 'Soal SMP';
        $this->load->view('templates/header', $data);
        $this->load->view('soal/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data';
        $this->load->view('templates/header');
        $this->load->view('soal/tambah');
        $this->load->view('templates/footer');
    }
}
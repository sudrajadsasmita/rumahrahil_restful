<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tema extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Admin_api_model/User_model_api', 'user');
        $this->load->model('Admin_api_model/Kelas_model_api', 'kelas');
        $this->load->model('Admin_api_model/Tema_model_api', 'tema');
        $this->load->model('Jawaban_api_model/jawaban_sd_model_api', 'jawaban');
        $this->load->model('Soal_api_model/Soal_sd_model_api', 'soal');
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['kelas'] = $this->kelas->getKelasSD();
        $data['title'] = 'Tema';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('SD/tema/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function readTheme()
    {
        $data = $this->tema->getTemaJoinKelas();
        echo json_encode($data);
    }

    public function insertTheme()
    {
        $data = [
            'kelas_id' => $this->input->post('kelas'),
            'nama_tema' => $this->input->post('tema')
        ];
        $value = $this->tema->createTema($data);
        echo json_encode($value);
    }

    public function getIdTheme()
    {
        $id = $this->input->get('id');
        $data = $this->tema->getTema($id);
        echo json_encode($data);
    }

    public function updateTheme()
    {
        $id = $this->input->post('id');
        $data = [
            'kelas_id' => $this->input->post('kelas'),
            'nama_tema' => $this->input->post('tema')
        ];
        $value = $this->tema->updateTema($data, $id);
        echo json_encode($value);
    }

    public function deleteTheme()
    {
        $id = $this->input->post('id');
        $data = $this->tema->deleteTema($id);
        echo json_encode($data);
    }
}

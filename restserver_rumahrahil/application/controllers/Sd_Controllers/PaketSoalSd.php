<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaketSoalSd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Admin_api_model/User_model_api', 'user');
        $this->load->model('Admin_api_model/Subtema_model_api', 'Subtema');
        $this->load->model('Paket_api_model/Paket_sd_model_api', 'paket');
        $this->load->model('Jawaban_api_model/jawaban_sd_model_api', 'jawaban');
        $this->load->model('Soal_api_model/Soal_sd_model_api', 'soal');
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['subtema'] = $this->Subtema->getSubtema();
        $data['title'] = 'Paket Soal SD';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('SD/paket/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function readPaketSD()
    {
        $data = $this->paket->getPaketSD();
        echo json_encode($data);
    }

    public function readPaketSDWhereId()
    {
        $id = $this->input->get('id');
        $data = $this->paket->getPaketSD($id);
        echo json_encode($data);
    }

    public function insertPaketSD()
    {
        $data = [
            'subtema_sd_id' => $this->input->post('subtema'),
            'nama_paket_sd' => $this->input->post('paket')
        ];
        $value = $this->paket->createPaketsd($data);
        echo json_encode($value);
    }
    public function updatePaketsd()
    {
        $id = $this->input->post('id');
        $data = [
            'subtema_sd_id' => $this->input->post('subtema'),
            'nama_paket_sd' => $this->input->post('paket')
        ];
        $value = $this->paket->updatePaketsd($data, $id);
        echo json_encode($value);
    }
    function deletePaketsd()
    {
        $id = $this->input->post('id');
        $data = $this->paket->deletePaketsd($id);
        echo json_encode($data);
    }
}

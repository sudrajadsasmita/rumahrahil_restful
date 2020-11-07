<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subtema extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Admin_api_model/User_model_api', 'user');
        $this->load->model('Admin_api_model/Tema_model_api', 'tema');
        $this->load->model('Admin_api_model/Subtema_model_api', 'Subtema');
        $this->load->model('Jawaban_api_model/jawaban_sd_model_api', 'jawaban');
        $this->load->model('Soal_api_model/Soal_sd_model_api', 'soal');
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['tema'] = $this->tema->getTema();
        $data['title'] = 'Subtema';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('SD/subtema/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function insertSubtema()
    {
        $data = [
            'tema_sd_id' => $this->input->post('tema'),
            'nama_subtema' => $this->input->post('subtema')
        ];
        $value = $this->Subtema->createSubtema($data);
        echo json_encode($value);
    }
    public function readSubtema()
    {
        $data = $this->Subtema->getSubtema();
        echo json_encode($data);
    }

    public function getIdSubtema()
    {
        $id = $this->input->get('id');
        $data = $this->Subtema->getSubtema($id);
        echo json_encode($data);
    }

    public function updateSubtema()
    {
        $id = $this->input->post('id');
        $data = [
            'tema_sd_id' => $this->input->post('tema'),
            'nama_subtema' => $this->input->post('subtema')
        ];
        $value = $this->Subtema->updateSubtema($data, $id);
        echo json_encode($value);
    }
    public function deleteSubtema()
    {
        $id = $this->input->post('id');
        $data = $this->Subtema->deleteSubtema($id);
        echo json_encode($data);
    }
}

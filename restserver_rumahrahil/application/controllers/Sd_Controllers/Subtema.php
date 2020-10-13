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
        $data['soal'] = $this->soal->getSoalSdJoinWithAllItem();
        $data['jawaban'] = $this->jawaban->getJawabanSdJoinWithAllItems();
        $data['subtema']['subtema'] = $this->Subtema->getSubtemaJoinWithTema();
        $data['title'] = 'Subtema';
        if ($this->input->post('nama_tema') == null) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('SD/subtema/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'tema_sd_id' => $this->input->post('nama_tema'),
                'nama_subtema' => $this->input->post('nama_subtema')
            ];
            $this->Subtema->createSubtema($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah data Berhasil</div>');
            redirect('Sd_Controllers/Subtema');
        }
    }
    public function updateSubtema($id)
    {
        $data = [
            'tema_sd_id' => $this->input->post('nama_tema'),
            'nama_subtema' => $this->input->post('nama_subtema')
        ];
        $this->Subtema->updateSubtema($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit data Berhasil</div>');
        redirect('Sd_Controllers/Subtema');
    }
    public function deleteSubtema($id)
    {
        $this->Subtema->deleteSubtema($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus data Berhasil</div>');
        redirect('Sd_Controllers/Subtema');
    }
    public function tableSubtema($val)
    {
        if ($val == 'all') {
            $data['subtema'] = $this->Subtema->getSubtemaJoinWithTema();
        } else {
            $data['subtema'] = $this->Subtema->getSubtemaJoinWithTema($val);
        }
        $this->load->view('SD/subtema/table-subtema', $data);
    }
}

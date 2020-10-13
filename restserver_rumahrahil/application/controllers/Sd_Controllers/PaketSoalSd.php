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
        $data['soal'] = $this->soal->getSoalSdJoinWithAllItem();
        $data['jawaban'] = $this->jawaban->getJawabanSdJoinWithAllItems();
        $data['paket']['paket'] = $this->paket->getPaketsdJoinSubtema();
        $data['title'] = 'Paket Soal SD';
        if ($this->input->post('nama_subtema') == null) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('SD/paket/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'subtema_sd_id' => $this->input->post('nama_subtema'),
                'nama_paket_sd' => $this->input->post('paket_soal')
            ];
            $this->paket->createPaketsd($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah data Berhasil</div>');
            redirect('Sd_Controllers/PaketSoalSd');
        }
    }
    public function updatePaketsd($id)
    {
        $data = [
            'subtema_sd_id' => $this->input->post('nama_subtema'),
            'nama_paket_sd' => $this->input->post('paket_soal')
        ];
        $this->paket->updatePaketsd($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit data Berhasil</div>');
        redirect('Sd_Controllers/PaketSoalSd');
    }
    function deletePaketsd($id)
    {
        $this->paket->deletePaketsd($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus data Berhasil</div>');
        redirect('Sd_Controllers/PaketSoalSd');
    }
    public function tablePaketsd($val)
    {
        if ($val == 'all') {
            $data['paket'] = $this->paket->getPaketsdJoinSubtema();
        } else {
            $data['paket'] = $this->paket->getPaketsdJoinSubtema($val);
        }
        $this->load->view('SD/paket/table-paket', $data);
    }
}

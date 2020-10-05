<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SoalSMP extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_api_model/User_model_api', 'user');
        $this->load->model('Paket_api_model/Paket_latihan_model_api', 'paket');
        $this->load->model('Kunci_api_model/Kunci_latihan_model_api', 'kunci');
        $this->load->model('Soal_api_model/Soal_latihan_model_api', 'soal');
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['paket'] = $this->paket->getPaketSMP();
        $data['kunci'] = $this->kunci->getKunciSMP();
        $data['soal']['soal'] = $this->soal->getSoalJoinKelas();
        $data['title'] = 'Soal';
        if ($this->input->post('kunci') == null) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('SMP/soal/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'paket_latihan_id' => $this->input->post('paket_latihan_id'),
                'kunci_jawaban_latihan_id' => $this->input->post('kunci_jawaban_latihan_id'),
                'soal_text' => $this->input->post('soal_text'),
                'soal_gambar' => $this->input->post('soal_gambar'),
                'soal_suara' => $this->input->post('soal_suara')
                
            ];
            $this->soal->createSoal($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah data Berhasil</div>');
            redirect('SMP/SoalSMP/');
        }
    }

    public function updateSoal($id)
    {
        $data = [
            'paket_latihan_id' => $this->input->post('paket_latihan_id'),
                'kunci_jawaban_latihan_id' => $this->input->post('kunci_jawaban_latihan_id'),
                'soal_text' => $this->input->post('soal_text'),
                'soal_gambar' => $this->input->post('soal_gambar'),
                'soal_suara' => $this->input->post('soal_suara')
        ];
        $this->soal->updateSoal($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update data Berhasil</div>');
        redirect('SMP/SoalSMP/');
    }

    public function tableSoal($val)
    {
        if ($val == 'all') {
            $data['soal'] = $this->soal->getSoalJoinKelas();
        } else {
            $data['soal'] = $this->soal->getSoalJoinKelas($val);
        }
        $this->load->view('SMP/soal/table-soal', $data);
    }
    public function deleteSoal($id)
    {
        $this->soal->deleteSoal($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus data Berhasil</div>');
        redirect('SMP/SoalSMP/');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JawabanSMP extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_api_model/User_model_api', 'user');
        $this->load->model('Soal_api_model/Soal_latihan_model_api', 'soal');
        $this->load->model('Jawaban_api_model/Jawaban_latihan_model_api', 'jawaban');
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['soal'] = $this->soal->getSoalSMP();
        $data['jawaban']['jawaban'] = $this->jawaban->getJawabanJoinKelas();
        $data['title'] = 'Jawaban';
        if ($this->input->post('soal') == null) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('SMP/jawaban/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'soal_latihan_id' => $this->input->post('soal'),
                'option_a' => $this->input->post('option_a'),
                'option_b' => $this->input->post('option_b'),
                'option_c' => $this->input->post('option_c'),
                'option_d' => $this->input->post('option_d')
            ];
            $this->jawaban->createJawabanlatihan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah data Berhasil</div>');
            redirect('SMP/JawabanSMP/');
        }
    }

    public function updateJawabanlatihan($id)
    {
        $data = [
                'soal_latihan_id' => $this->input->post('soal'),
                'option_a' => $this->input->post('option_a'),
                'option_b' => $this->input->post('option_b'),
                'option_c' => $this->input->post('option_c'),
                'option_d' => $this->input->post('option_d')
        ];
        $this->jawaban->updateJawabanlatihan($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update data Berhasil</div>');
        redirect('SMP/JawabanSMP/');
    }

    public function tableJawaban($val)
    {
        if ($val == 'all') {
            $data['jawaban'] = $this->jawaban->getJawabanJoinKelas();
        } else {
            $data['jawaban'] = $this->jawaban->getJawabanJoinKelas($val);
        }
        $this->load->view('SMP/jawaban/table-jawaban', $data);
    }
    public function deleteJawabanlatihan($id)
    {
        $this->jawaban->deleteJawabanlatihan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus data Berhasil</div>');
        redirect('SMP/JawabanSMP/');
    }
}

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
        $data['id'] = $id;
        $data['soal'] = $this->Soal_model->getSoal($id);
        $this->load->view('templates/header_soal', $data);
        $this->load->view('templates/sidebar_soal', $data);
        $this->load->view('soal/index', $data);
        $this->load->view('templates/footer_soal', $data);
    }
    public function processAnswer($id)
    {

        //buat array kosongan untuk kunci jawaban dan jawaban siswa
        $jawabanSiswa = [];

        $jawabanKunci = [];
        $counter = 0;

        //ambil kunci jawaban yang ada di database dan masukkan ke array
        $soal = $this->Soal_model->getSoal($id);
        $i = 0;
        foreach ($soal as $s) {
            $jawabanKunci[$i] = $s['jawaban_benar'];
            $i++;
        }

        //ambil jawaban yang sudah di inputkan siswa 
        for ($a = 0; $a < count($_POST); $a++) {
            $jawabanSiswa[$a] = $this->input->post("customRadio" . $a);
        }
        for ($b = 0; $b < count($jawabanKunci); $b++) {
            if ($jawabanSiswa[$b] === $jawabanKunci[$b]) {
                $counter++;
            }
        }

        //beri penilaian
        $point = 100 / count($jawabanKunci);
        $nilai = $counter * $point;
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['title'] = 'Tampil Nilai';
        $data['id'] = $id;
        $data['soal'] = $this->Soal_model->getSoal($id);
        $this->load->view('tampil_nilai/tampil_nilai', $data);
    }
}

<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class JawabanSd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Jawaban_api_model/jawaban_sd_model_api', 'jawaban');
        $this->load->model('Paket_api_model/paket_sd_model_api', 'paket');
        $this->load->model('Soal_api_model/soal_sd_model_api', 'soal');
        $this->load->model('Admin_api_model/User_model_api', 'user');
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['paket'] = $this->paket->getPaketsdJoinSubtema();
        $data['soal'] = $this->soal->getSoalSdJoinWithAllItem();
        $data['jawaban'] = $this->jawaban->getJawabanSdJoinWithAllItems();
        $data['no_soal'] = $this->db->get('tb_no_soal')->result_array();
        $data['title'] = 'Option Jawaban Soal SD';
        if ($this->input->post('nama_paket_sd') === null) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('SD/jawaban/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'soal_latihan_sd_id' => $this->input->post('soal_text'),
                'option_a' => $this->input->post('option_a'),
                'option_b' => $this->input->post('option_b'),
                'option_c' => $this->input->post('option_c'),
                'option_d' => $this->input->post('option_d'),
            ];
            $this->jawaban->createJawabansd($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah data Berhasil</div>');
            redirect('Sd_Controllers/JawabanSd');
        }
    }

    public function updateJawaban($id)
    {
        $data = [
            'soal_latihan_sd_id' => $this->input->post('soal_text'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
        ];
        $this->jawaban->updateJawabansd($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit data Berhasil</div>');
        redirect('Sd_Controllers/JawabanSd');
    }

    public function deleteJawaban($id)
    {
        $this->jawaban->deleteJawabansd($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus data Berhasil</div>');
        redirect('Sd_Controllers/JawabanSd');
    }

    public function selectNoSoal($id)
    {
        $data = $this->soal->getSoalSdJoinWithAllItem($id);
        echo "<option selected >Pilih..</option>\n";
        foreach ($data as $d) {
            echo "<option value=" . $d['no_soal_id'] . ">" . $d['no_soal'] . "</option>";
        }
    }
    public function selectSoal()
    {
        $id = $this->uri->segment(4);
        $id2 = $this->uri->segment(5);
        $data = $this->soal->getSoalWithNumber($id, $id2);
        echo '<label for="jawaban_benar">Soal Text</label>';
        foreach ($data as $d) {
            echo '<input type="text" class="form-control" value="' . $d['soal_text'] . '" readonly>
            <input type="hidden" name="soal_text" class="form-control" value="' . $d['id_soal_latihan_sd'] . '">';
        }
    }

    public function selectSoalGambar()
    {
        $id = $this->uri->segment(4);
        $id2 = $this->uri->segment(5);
        $data = $this->soal->getSoalWithNumber($id, $id2);
        echo '<label for="jawaban_benar">Soal gambar</label>';
        foreach ($data as $d) {
            echo '<img src="' . base_url('assets/img/') . $d['soal_gambar'] . '' . '" alt="..." class="img-thumbnail">';
        }
    }
    public function tableJawabansd($id = null)
    {
        if ($id === null) {
            $data = $this->jawaban->getJawabanSdJoinWithAllItems();
        } else {
            $data = $this->jawaban->getJawabanSdJoinWithAllItems($id);
        }
        $i = 1;
        foreach ($data as $d) {
            echo '<tr>
                    <th scope="row">' . $i . '</th>
                    <td>' . $d['nama_paket_sd'] . ' : ' . $d['nama_subtema'] . '</td>
                    <td>' . $d['no_soal'] . '</td>
                    <td>' . $d['soal_text'] . '</td>
                    <td>' . $d['soal_gambar'] . '</td>
                    <td>' . $d['option_a'] . '</td>
                    <td>' . $d['option_b'] . '</td>
                    <td>' . $d['option_c'] . '</td>
                    <td>' . $d['option_d'] . '</td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#updateModal' . $d['id_jawaban_latihan_sd'] . '" class="btn btn-warning px-3"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
                        <a href="" data-toggle="modal" data-target="#deleteModal' . $d['id_jawaban_latihan_sd'] . '" class="btn btn-danger px-3"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
                    </td>
                </tr>';
            $i++;
        }
    }
}

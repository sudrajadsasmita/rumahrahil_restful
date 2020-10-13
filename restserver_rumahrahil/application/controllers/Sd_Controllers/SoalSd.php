<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SoalSd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Admin_api_model/User_model_api', 'user');
        $this->load->model('Paket_api_model/Paket_sd_model_api', 'paket');
        $this->load->model('Kunci_api_model/Kunci_sd_model_api', 'kunci');
        $this->load->model('Jawaban_api_model/jawaban_sd_model_api', 'jawaban');
        $this->load->model('Soal_api_model/Soal_sd_model_api', 'soal');
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['paket'] = $this->paket->getPaketsdJoinSubtema();
        $data['kunci'] = $this->kunci->getKunciSdJoinPaketAndNoSoal();
        $data['soal'] = $this->soal->getSoalSdJoinWithAllItem();
        $data['jawaban'] = $this->jawaban->getJawabanSdJoinWithAllItems();
        $data['no_soal'] = $this->db->get('tb_no_soal')->result_array();
        $data['title'] = 'Soal Jawaban Soal SD';
        if ($this->input->post('nama_paket_sd') === null) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('SD/soal/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $upload_images = $_FILES['image'];
            if ($upload_images) {
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2000';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $newImage = $this->upload->data('file_name');
                } else {
                    $newImage = 'default.png';
                }
            }
            $data = [
                'paket_latihan_sd_id' => $this->input->post('nama_paket_sd'),
                'kunci_jawaban_sd_id' => $this->input->post('jawaban_benar_sd'),
                'no_soal_id' => $this->input->post('no_soal_sd'),
                'soal_text' => $this->input->post('soal_text'),
                'soal_gambar' => $newImage
            ];
            $this->soal->createSoalsd($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah data Berhasil</div>');
            redirect('Sd_Controllers/SoalSd');
        }
    }

    public function updateSoal($id)
    {
        $data = $this->soal->getSoalSdWhereIdSoal($id);

        $upload_images = $_FILES['updateImage'];
        if ($upload_images['name'] == "") {
            $newImage = $this->input->post('gambar');
        } else {
            if ($upload_images) {
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2000';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('updateImage')) {
                    $old_image = $data['soal_gambar'];
                    $newImage = $this->upload->data('file_name');
                    unlink(FCPATH . 'assets/img/' . $old_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('soal');
                }
            }
        }
        $data = [
            'paket_latihan_sd_id' => $this->input->post('nama_paket_sd'),
            'kunci_jawaban_sd_id' => $this->input->post('jawaban_benar_sd'),
            'no_soal_id' => $this->input->post('no_soal_sd'),
            'soal_text' => $this->input->post('soal_text'),
            'soal_gambar' => $newImage
        ];
        $this->soal->updateSoalsd($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit data Berhasil</div>');
        redirect('Sd_Controllers/SoalSd');
    }

    public function deleteSoal($id)
    {
        $this->soal->deleteSoalsd($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus data Berhasil</div>');
        redirect('Sd_Controllers/SoalSd');
    }

    public function selectNoSoal($id)
    {
        $data = $this->kunci->getKunciSdJoinPaketAndNoSoal($id);
        echo "<option selected >Pilih..</option>\n";
        foreach ($data as $d) {
            echo "<option value=" . $d['no_soal_id'] . ">" . $d['no_soal'] . "</option>";
        }
    }
    public function selectJawabanBenar()
    {
        $id = $this->uri->segment(4);
        $id2 = $this->uri->segment(5);
        $data = $this->kunci->getNumberSoal($id, $id2);
        echo '<label for="jawaban_benar">Jawaban Benar</label>';
        foreach ($data as $d) {
            echo '<input type="text" class="form-control" value="' . $d['jawaban_benar'] . '" readonly>
            <input type="hidden" name="jawaban_benar_sd" class="form-control" value="' . $d['id_kunci_jawaban_sd'] . '">';
        }
    }

    public function tableSoalsd($id = null)
    {
        if ($id === null) {
            $data = $this->soal->getSoalSdJoinWithAllItem();
        } else {
            $data = $this->soal->getSoalSdJoinWithAllItem($id);
        }
        $i = 1;
        foreach ($data as $d) {
            echo '<tr>
            <th scope="row">' . $i . '</th>
            <td>' . $d['nama_paket_sd'] . ' : ' . $d['nama_subtema'] . '</td>
            <td>' . $d['no_soal'] . '</td>
            <td>' . $d['soal_text'] . '</td>
            <td>' . $d['soal_gambar'] . '</td>
            <td>' . $d['soal_suara'] . '</td>
            <td>' . $d['jawaban_benar'] . '</td>
            <td>
                <a href="" data-toggle="modal" data-target="#updateModal' . $d['id_soal_latihan_sd'] . '" class="btn btn-warning px-3"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
                <a href="" data-toggle="modal" data-target="#deleteModal' . $d['id_soal_latihan_sd'] . '" class="btn btn-danger px-3"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
            </td>
        </tr>';
            $i++;
        }
    }
}

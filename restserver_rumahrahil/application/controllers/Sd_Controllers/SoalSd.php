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
        $data['no_soal'] = $this->db->get('tb_no_soal')->result_array();
        $data['title'] = 'Soal Jawaban Soal SD';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('SD/soal/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function createSoal()
    {
        $upload_images = $_FILES['image'];
        if ($upload_images['name'] == "") {
            $newImage = base_url() . 'assets/img/default.png';
        } else {
            if ($upload_images) {
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2000';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $getImage = $this->upload->data('file_name');
                    $newImage = base_url() . 'assets/img/' . $getImage;
                }
            }
        }
        $data = [
            'paket_latihan_sd_id' => $this->input->post('id'),
            'no_soal_id' => $this->input->post('no'),
            'soal_text' => $this->input->post('text'),
            'soal_gambar' => $newImage,
            'soal_suara' => '',
            'option_a' => $this->input->post('a'),
            'option_b' => $this->input->post('b'),
            'option_c' => $this->input->post('c'),
            'option_d' => $this->input->post('d'),
            'jawaban_benar' => $this->input->post('kunci')
        ];
        $data = $this->soal->createSoalsd($data);
        echo json_encode($data);
    }

    public function readSoal()
    {
        $data = $this->soal->getSoalSd();
        echo json_encode($data);
    }

    public function readSoalWhereId()
    {
        $id = $this->input->get('id');
        $data = $this->soal->getSoalSd($id);
        echo json_encode($data);
    }

    public function updateSoal()
    {
        $idSoal = $this->input->post('id_soal');
        $id = $this->input->post('id');
        $data = $this->soal->getSoalSd($id);

        $upload_images = $_FILES['image'];
        if ($upload_images['name'] == "") {
            $newImage = $this->input->post('urlImage');
        } else {
            if ($upload_images) {
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2000';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    foreach ($data as $d) {
                        $old_image = $d['soal_gambar'];
                        $deleteImage = explode('/', $old_image, 6);
                        unlink(FCPATH . $deleteImage[5]);
                    }


                    $getImage = $this->upload->data('file_name');
                    $newImage = base_url() . 'assets/img/' . $getImage;
                }
            }
        }
        $data = [
            'paket_latihan_sd_id' => $this->input->post('id'),
            'no_soal_id' => $this->input->post('no'),
            'soal_text' => $this->input->post('text'),
            'soal_gambar' => $newImage,
            'soal_suara' => '',
            'option_a' => $this->input->post('a'),
            'option_b' => $this->input->post('b'),
            'option_c' => $this->input->post('c'),
            'option_d' => $this->input->post('d'),
            'jawaban_benar' => $this->input->post('kunci')

        ];
        $value = $this->soal->updateSoalsd($data, $idSoal);
        echo json_encode($value);
    }

    public function deleteSoal()
    {
        $id = $this->input->post('id');
        $url = $this->input->post('url');
        if ($url != 'http://localhost/rumahrahil_restful/restserver_rumahrahil/assets/img/default.png') {
            $image = explode('/', $url, 6);
            unlink(FCPATH . $image[5]);
        }
        $data = $this->soal->deleteSoalsd($id);
        echo json_encode($data);
    }
}

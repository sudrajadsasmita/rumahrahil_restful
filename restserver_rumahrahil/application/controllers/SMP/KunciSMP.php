<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KunciSMP extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_api_model/User_model_api', 'user');
        $this->load->model('Paket_api_model/Paket_latihan_model_api', 'paket');
        $this->load->model('Kunci_api_model/Kunci_latihan_model_api', 'kunci');
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['paket'] = $this->paket->getPaketSMP();
        $data['kunci']['kunci'] = $this->kunci->getKuncismpJoinKelas();
        $data['title'] = 'Kunci';
        if ($this->input->post('kunci') == null) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('SMP/kunci/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'paket_latihan_id' => $this->input->post('paket_latihan_id'),
                'jawaban_benar' => $this->input->post('jawaban_benar')
                
            ];
            $this->kunci->createKuncilatihan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah data Berhasil</div>');
            redirect('SMP/KunciSMP/');
        }
    }

    public function updateKuncilatihan($id)
    {
        $data = [
            'paket_latihan_id' => $this->input->post('paket_latihan_id'),
            'jawaban_benar' => $this->input->post('jawaban_benar')   
        ];
        $this->kunci->updateKuncilatihan($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update data Berhasil</div>');
        redirect('SMP/KunciSMP/');
    }

    public function tableKunci($val)
    {
        if ($val == 'all') {
            $data['kunci'] = $this->kunci->getKunciJoinKelas();
        } else {
            $data['kunci'] = $this->kunci->getKunciJoinKelas($val);
        }
        $this->load->view('SMP/kunci/table-kunci', $data);
    }
    public function deleteKuncilatihan($id)
    {
        $this->kunci->deleteKuncilatihan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus data Berhasil</div>');
        redirect('SMP/KunciSMP/');
    }
}

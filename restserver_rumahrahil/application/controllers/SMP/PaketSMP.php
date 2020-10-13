<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaketSMP extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Admin_api_model/User_model_api', 'user');
        $this->load->model('Admin_api_model/Bab_model_api', 'bab');
        $this->load->model('Paket_api_model/Paket_latihan_model_api', 'paket');
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['bab'] = $this->bab->getBabSMP();
        $data['paket']['paket'] = $this->paket->getPaketJoinKelas();
        $data['title'] = 'Paket';
        if ($this->input->post('bab') == null) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('SMP/paket/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'bab_latihan_id' => $this->input->post('bab'),
                'nama_paket' => $this->input->post('nama_paket')
            ];
            $this->paket->createPaketlatihan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah data Berhasil</div>');
            redirect('SMP/PaketSMP/');
        }
    }

    public function updatePaketlatihan($id)
    {
        $data = [
            'bab_latihan_id' => $this->input->post('bab'),
            'nama_paket' => $this->input->post('nama_paket')
        ];
        $this->paket->updatePaketlatihan($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update data Berhasil</div>');
        redirect('SMP/PaketSMP/');
    }

    public function tablePaket($val)
    {
        if ($val == 'all') {
            $data['paket'] = $this->paket->getPaketJoinKelas();
        } else {
            $data['paket'] = $this->paket->getPaketJoinKelas($val);
        }
        $this->load->view('SMP/paket/table-paket', $data);
    }
    public function deletePaketlatihan($id)
    {
        $this->paket->deletePaketlatihan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus data Berhasil</div>');
        redirect('SMP/PaketSMP/');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_api_model/User_model_api', 'user');
        $this->load->model('Admin_api_model/Kelas_model_api', 'kelas');
        $this->load->model('Admin_api_model/Mapel_model_api', 'mapel');
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['kelas'] = $this->kelas->getKelasSMP();
        $data['mapel']['mapel'] = $this->mapel->getMapelJoinKelas();
        $data['title'] = 'Mapel SMP';
        if ($this->input->post('kelas') == null) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('SMP/mapel/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kelas_id' => $this->input->post('kelas'),
                'nama_mapel' => $this->input->post('nama_mapel')
            ];
            $this->mapel->createMapel($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah data Berhasil</div>');
            redirect('Mapel');
        }
    }

    public function updateMapel($id)
    {
        $data = [
            'kelas_id' => $this->input->post('kelas'),
            'nama_mapel' => $this->input->post('nama_mapel')
        ];
        $this->mapel->updateMapel($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update data Berhasil</div>');
        redirect('Mapel');
    }

    public function tableMapel($val)
    {
        if ($val == 'all') {
            $data['mapel'] = $this->mapel->getMapelJoinKelas();
        } else {
            $data['mapel'] = $this->mapel->getMapelJoinKelas($val);
        }
        $this->load->view('SMP/mapel/table-mapel', $data);
    }
    public function deleteMapel($id)
    {
        $this->mapel->deleteMapel($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus data Berhasil</div>');
        redirect('Mapel');
    }
}

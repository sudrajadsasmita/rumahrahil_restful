<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bab extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Admin_api_model/User_model_api', 'user');
        $this->load->model('Admin_api_model/Mapel_model_api', 'mapel');
        $this->load->model('Admin_api_model/Jenjang_model_api', 'jenjang');
        $this->load->model('Admin_api_model/Kelas_model_api', 'kelas');
        $this->load->model('Admin_api_model/Bab_model_api', 'bab');
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserWhereEmail($email);
        $data['mapel'] = $this->mapel->getMapelSMP();
        $data['jenjang'] = $this->jenjang->getJenjangSMP();
        $data['kelas'] = $this->kelas->getKelasSMP();
        $data['bab']['bab'] = $this->bab->getBabJoinJurusan();
        $data['title'] = 'Bab';
        if ($this->input->post('mapel') == null) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('SMP/bab/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'mapel_id' => $this->input->post('mapel'),
                'jenjang_id' => $this->input->post('jenjang'),
                'kelas_id' => $this->input->post('kelas'),
                'nama_bab' => $this->input->post('nama_bab')
            ];
            $this->bab->createBab($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah data Berhasil</div>');
            redirect('Bab');
        }
    }

    public function updateBab($id)
    {
        $data = [

            'mapel_id' => $this->input->post('mapel'),
            'jenjang_id' => $this->input->post('jenjang'),
            'kelas_id' => $this->input->post('kelas'),
            'nama_bab' => $this->input->post('nama_bab')
        ];
        $this->bab->updateBab($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update data Berhasil</div>');
        redirect('Bab');
    }

    public function tableBab($val)
    {
        if ($val == 'all') {
            $data['bab'] = $this->bab->getBabJoinJurusan();
        } else {
            $data['bab'] = $this->bab->getBabJoinJurusan($val);
        }
        $this->load->view('SMP/bab/table-bab', $data);
    }
    public function deleteBab($id)
    {
        $this->bab->deleteBab($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus data Berhasil</div>');
        redirect('Bab');
    }

    public function selectKelas($id = null)
    {
        if ($id === null) {
            echo '
            <label for="inputKelas">Kelas</label> 
            <input type="text" class="form-control" value="Kelas..." readonly>
            <div class="invalid-feedback">
                Tolong Pilih Salah Satu Kelas
            </div>
        ';
        } else {
            $data = $this->mapel->getMapelSMP($id);
            echo '
                <label for="inputKelas">Kelas</label> 
                <input type="text" class="form-control" value="' . $data['nama_kelas'] . '" readonly>
                <input type="hidden" name="kelas" value="' . $data['kelas_id'] . '">
                <div class="invalid-feedback">
                    Tolong Pilih Salah Satu Kelas
                </div>
            ';
        }
    }
}

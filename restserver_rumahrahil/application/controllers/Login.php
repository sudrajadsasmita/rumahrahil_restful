<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_api_model/User_model_api', 'user');
        $this->load->model('Admin_api_model/Role_model_api', 'role');
        $this->load->model('Admin_api_model/Kelas_model_api', 'kelas');
        $this->load->model('Admin_api_model/Jurusan_model_api', 'jurusan');
        $this->load->model('Admin_api_model/Jenjang_model_api', 'jenjang');
        $this->load->model('Admin_api_model/Mapel_model_api', 'mapel');
    }
    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email wajib di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'password wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['fixedFooter'] = 'fixed-bottom';
            $data['title'] = 'Halaman Login';
            $this->load->view('templates/login_header', $data);
            $this->load->view('login/index', $data);
            $this->load->view('templates/login_footer', $data);
        } else {
            $this->_login();
        }
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('role_id', 'Role', 'required|trim', [
            'required' => 'Status wajib di isi'
        ]);
        $this->form_validation->set_rules('jenjang_id', 'Jenjang', 'required|trim', [
            'required' => 'Jenjang wajib di isi'
        ]);
        $this->form_validation->set_rules('nama', 'Name', 'required|trim', [
            'required' => 'Nama wajib di isi'
        ]);
        $this->form_validation->set_rules('alamat', 'Address', 'required|trim', [
            'required' => 'Alamat wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'required' => 'Email wajib di isi',
            'valid_email' => 'Email harus berupa email'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password1]', [
            'required' => 'password wajib di isi',
            'min_length' => 'password harus sejumlah 8 karakter',
            'matches' => 'password harus sama'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password]');
        $this->form_validation->set_rules('asal_sekolah', 'School', 'required|trim', [
            'required' => 'Asal sekolah wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['role'] = $this->role->getRoleWhereId();
            $data['jenjang'] = $this->jenjang->getJenjang();
            $data['jurusan'] = $this->jurusan->getJurusan();
            $data['kelas'] = $this->kelas->getKelas();
            $data['mapel'] = $this->mapel->getMapel();
            $data['fixedFooter'] = 'mt-1';
            $data['title'] = 'Registrasi User';
            $this->load->view('templates/login_header', $data);
            $this->load->view('login/registrasi', $data);
            $this->load->view('templates/login_footer');
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
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('login/registrasi');
                }
            }
            $data = [
                'role_id' => $this->input->post('role_id'),
                'jurusan_id' => $this->input->post('jurusan_id'),
                'mapel_id' => $this->input->post('mapel_id'),
                'jenjang_id' => $this->input->post('jenjang_id'),
                'kelas_id' => $this->input->post('kelas_id'),
                'nama' => htmlspecialchars($this->input->post('nama')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'email' => htmlspecialchars($this->input->post('email')),
                'password' => $this->input->post('password'),
                'foto_profile' => htmlspecialchars($newImage),
                'asal_sekolah' => htmlspecialchars($this->input->post('asal_sekolah')),
            ];
            $this->user->createUser($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi Berhasil</div>');
            redirect('login');
        }
    }

    public function _login()
    {
        $email = htmlspecialchars($this->input->post('email'));
        $password = $this->input->post('password');
        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
        if ($user) {
            if ($password == $user['password']) {
                if ($user['role_id'] == 1) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    echo "halaman siswa/guru (masih tahap pengambangan)";
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password anda salah</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email anda belum terdaftar</div>');
            redirect('login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil Logout</div>');
        redirect('login');
    }
}

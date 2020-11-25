<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class User_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_api_model/User_model_api', 'api');
    }
    public function index_get()
    {
        if ($this->get('id_user')) {
            $user = $this->get('id_user');
        } elseif ($this->get('email')) {
            $user = $this->get('email');
        } elseif ($this->get('jenjang_id') && $this->get('kelas_id') && $this->get('role_id')) {
            $user = $this->get('kelas_id');
        } else {
            $user = null;
        }
        if ($user === null) {
            $getuser = $this->api->getUser();
        } elseif ($user === $this->get('id_user')) {
            $getuser = $this->api->getUser($user);
        } elseif ($user === $this->get('email')) {
            $getuser = $this->api->getUserWhereEmail($user);
        } elseif ($user === $this->get('kelas_id')) {
            $jenjang = $this->get('jenjang_id');
            $kelas = $this->get('kelas_id');
            $role = $this->get('role_id');
            $getuser = $this->api->getUserWhereJenjangAndKelas($jenjang, $kelas, $role);
        }
        if ($getuser) {
            $this->response([
                'status' => true,
                'data' => $getuser

            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $user = $this->delete('id_user');

        if (!$user) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteUser($user) > 0) {
                $this->response([
                    'status' => true,
                    'message' => 'deleted success'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'role_id' => $this->post('role_id'),
            'jurusan_id' => $this->post('jurusan_id'),
            'mapel_id' => $this->post('mapel_id'),
            'jenjang_id' => $this->post('jenjang_id'),
            'kelas_id' => $this->post('kelas_id'),
            'nama' => $this->post('nama'),
            'alamat' => $this->post('alamat'),
            'email' => $this->post('email'),
            'password' => $this->post('password'),
            'foto_profile' => $this->post('foto_profile'),
            'asal_sekolah' => $this->post('asal_sekolah')
        ];
        if ($this->api->createUser($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new user has been created'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed create data'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_put()
    {
        $user = $this->put('id_user');
        $data = [
            'role_id' => $this->put('role_id'),
            'jurusan_id' => $this->put('jurusan_id'),
            'mapel_id' => $this->put('mapel_id'),
            'jenjang_id' => $this->put('jenjang_id'),
            'kelas_id' => $this->put('kelas_id'),
            'nama' => $this->put('nama'),
            'alamat' => $this->put('alamat'),
            'email' => $this->put('email'),
            'password' => $this->put('password'),
            'foto_profile' => $this->put('foto_profile'),
            'asal_sekolah' => $this->put('asal_sekolah')
        ];
        if ($this->api->updateUser($data, $user) > 0) {
            $this->response([
                'status' => true,
                'message' => 'update success'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed update data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

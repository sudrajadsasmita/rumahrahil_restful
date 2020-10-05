<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Bab_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_api_model/Bab_model_api', 'api');
    }
    public function index_get()
    {
        $bab = $this->get('id_bab_latihan');
        if ($bab === null) {
            $getbab = $this->api->getBab();
        } else {
            $getbab = $this->api->getBab($bab);
        }
        if ($getbab) {
            $this->response([
                'status' => true,
                'data' => $getbab

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
        $bab = $this->delete('id_bab_latihan');

        if (!$bab) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteBab($bab) > 0) {
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
            'id_bab_latihan' => $this->post('id_bab_latihan'),
            'jurusan_id' => $this->post('jurusan_id'),
            'mapel_id' => $this->post('mapel_id'),
            'jenjang_id' => $this->post('jenjang_id'),
            'kelas_id' => $this->post('kelas_id'),
            'nama_bab' => $this->post('nama_bab')

        ];
        if ($this->api->createBab($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new data has been created'
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
        $bab = $this->put('id_bab_latihan');
        $data = [
            'id_bab_latihan' => $this->put('id_bab_latihan'),
            'jurusan_id' => $this->put('jurusan_id'),
            'mapel_id' => $this->put('mapel_id'),
            'jenjang_id' => $this->put('jenjang_id'),
            'kelas_id' => $this->put('kelas_id'),
            'nama_bab' => $this->put('nama_bab')
        ];
        if ($this->api->updateBab($data, $Bab) > 0) {
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

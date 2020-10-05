<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Paket_ujian_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Paket_api_model/Paket_ujian_model_api', 'api');
    }
    public function index_get()
    {
        $paketujian = $this->get('id_paket_ujian');
        if ($paketujian === null) {
            $getpaketujian = $this->api->getPaketujian();
        } else {
            $getpaketujian = $this->api->getPaketujian($paketujian);
        }
        if ($getpaketujian) {
            $this->response([
                'status' => true,
                'data' => $getpaketujian

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
        $paketujian = $this->delete('id_paket_ujian');

        if (!$paketujian) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deletePaketujian($paketujian) > 0) {
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
            'id_paket_ujian' => $this->post('id_paket_ujian'),
            'jurusan_id' => $this->post('jurusan_id'),
            'mapel_id' => $this->post('mapel_id'),
            'jenjang_id' => $this->post('jenjang_id'),
            'kelas_id' => $this->post('kelas_id'),
            'nama_paket' => $this->post('nama_paket')
            

        ];
        if ($this->api->createPaketujian($data) > 0) {
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
        $paketujian = $this->put('id_paket_ujian');
        $data = [
            'id_paket_ujian' => $this->put('id_paket_ujian'),
            'jurusan_id' => $this->put('jurusan_id'),
            'mapel_id' => $this->put('mapel_id'),
            'jenjang_id' => $this->put('jenjang_id'),
            'kelas_id' => $this->put('kelas_id'),
            'nama_paket' => $this->put('nama_paket')
        ];
        if ($this->api->updatePaketujian($data, $paketujian) > 0) {
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

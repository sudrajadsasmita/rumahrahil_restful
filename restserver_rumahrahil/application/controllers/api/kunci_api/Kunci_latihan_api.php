<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Kunci_latihan_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kunci_api_model/Kunci_latihan_model_api', 'api');
    }
    public function index_get()
    {
        $kuncilatihan = $this->get('id_kunci_jawaban_latihan');
        if ($kuncilatihan === null) {
            $getkuncilatihan = $this->api->getKuncilatihan();
        } else {
            $getkuncilatihan = $this->api->getKuncilatihan($kuncilatihan);
        }
        if ($getkuncilatihan) {
            $this->response([
                'status' => true,
                'data' => $getkuncilatihan

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
        $kuncilatihan = $this->delete('id_kunci_jawaban_latihan');

        if (!$kuncilatihan) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteKuncilatihan($kuncilatihan) > 0) {
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
            'id_kunci_jawaban_latihan' => $this->post('id_kunci_jawaban_latihan'),
            'paket_latihan_id' => $this->post('paket_latihan_id'),
            'jawaban_benar' => $this->post('jawaban_benar')
            

        ];
        if ($this->api->createKuncilatihan($data) > 0) {
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
        $kuncilatihan = $this->put('id_kunci_jawaban_latihan');
        $data = [
            'id_kunci_jawaban_latihan' => $this->put('id_kunci_jawaban_latihan'),
            'paket_latihan_id' => $this->put('paket_latihan_id'),
            'jawaban_benar' => $this->put('jawaban_benar')
        ];
        if ($this->api->updateKuncilatihan($data, $kuncilatihan) > 0) {
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

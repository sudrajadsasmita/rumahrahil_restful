<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Soal_latihan_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Soal_api_model/Soal_latihan_model_api', 'api');
    }
    public function index_get()
    {
        $soallatihan = $this->get('id_soal_latihan');
        if ($soallatihan === null) {
            $getsoallatihan = $this->api->getSoallatihan();
        } else {
            $getsoallatihan = $this->api->getSoallatihan($soallatihan);
        }
        if ($getsoallatihan) {
            $this->response([
                'status' => true,
                'data' => $getsoallatihan

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
        $soallatihan = $this->delete('id_soal_latihan');

        if (!$soallatihan) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteSoallatihan($soallatihan) > 0) {
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
            'id_soal_latihan' => $this->post('id_soal_latihan'),
            'paket_latihan_id' => $this->post('paket_latihan_id'),
            'no_soal' => $this->post('no_soal'),
            'soal_text' => $this->post('soal_text'), 
            'soal_gambar' => $this->post('soal_gambar'),
            'soal_suara' => $this->post('soal_suara')

        ];
        if ($this->api->createSoallatihan($data) > 0) {
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
        $soallatihan = $this->put('id_soal_latihan');
        $data = [
            'id_soal_latihan' => $this->put('id_soal_latihan'),
            'paket_latihan_id' => $this->put('paket_latihan_id'),
            'no_soal' => $this->put('no_soal'),
            'soal_text' => $this->put('soal_text'), 
            'soal_gambar' => $this->put('soal_gambar'),
            'soal_suara' => $this->put('soal_suara')
        ];
        if ($this->api->updateSoallatihan($data, $soallatihan) > 0) {
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

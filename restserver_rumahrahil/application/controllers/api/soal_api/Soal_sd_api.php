<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Soal_sd_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Soal_api_model/Soal_sd_model_api', 'api');
    }
    public function index_get()
    {
        $soalsd = $this->get('id_paket_latihan_sd');
        if ($soalsd === null) {
            $getsoalsd = $this->api->getSoalSdForAPI();
        } else {
            $getsoalsd = $this->api->getSoalSdForAPI($soalsd);
        }
        if ($getsoalsd) {
            $this->response([
                'status' => true,
                'data' => $getsoalsd

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
        $soalsd = $this->delete('id_soal_latihan_sd');

        if (!$soalsd) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteSoalsd($soalsd) > 0) {
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
            'id_soal_latihan_sd' => $this->post('id_soal_latihan_sd'),
            'paket_latihan_sd_id' => $this->post('paket_latihan_sd_id'),
            'soal_text' => $this->post('soal_text'),
            'soal_gambar' => $this->post('soal_gambar'),
            'soal_suara' => $this->post('soal_suara')

        ];
        if ($this->api->createSoalsd($data) > 0) {
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
        $soalsd = $this->put('id_soal_latihan_sd');
        $data = [
            'id_soal_latihan_sd' => $this->put('id_soal_latihan_sd'),
            'paket_latihan_sd_id' => $this->put('paket_latihan_sd_id'),
            'soal_text' => $this->put('soal_text'),
            'soal_gambar' => $this->put('soal_gambar'),
            'soal_suara' => $this->put('soal_suara')
        ];
        if ($this->api->updateSoalsd($data, $soalsd) > 0) {
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

<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Kunci_sd_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kunci_api_model/Kunci_sd_model_api', 'api');
    }
    public function index_get()
    {
        $kuncisd = $this->get('id_kunci_jawaban_sd');
        if ($kuncisd === null) {
            $getkuncisd = $this->api->getKuncisd();
        } else {
            $getkuncisd = $this->api->getKuncisd($kuncisd);
        }
        if ($getkuncisd) {
            $this->response([
                'status' => true,
                'data' => $getkuncisd

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
        $kuncisd = $this->delete('id_kunci_jawaban_sd');

        if (!$kuncisd) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteKuncisd($kuncisd) > 0) {
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
            'id_kunci_jawaban_sd' => $this->post('id_kunci_jawaban_sd'),
            'paket_latihan_sd_id' => $this->post('paket_latihan_sd_id'),
            'jawaban_benar' => $this->post('jawaban_benar')
            

        ];
        if ($this->api->createKuncisd($data) > 0) {
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
        $kuncisd = $this->put('id_kunci_jawaban_sd');
        $data = [
            'id_kunci_jawaban_sd' => $this->put('id_kunci_jawaban_sd'),
            'paket_latihan_sd_id' => $this->put('paket_latihan_sd_id'),
            'jawaban_benar' => $this->put('jawaban_benar')
        ];
        if ($this->api->updateKuncisd($data, $kuncisd) > 0) {
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

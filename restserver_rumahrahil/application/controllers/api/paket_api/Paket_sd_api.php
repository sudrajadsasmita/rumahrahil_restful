<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Paket_sd_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Paket_api_model/Paket_sd_model_api', 'api');
    }
    public function index_get()
    {
        $paketsd = $this->get('id_paket_latihan_sd');
        if ($paketsd === null) {
            $getpaketsd = $this->api->getPaketsd();
        } else {
            $getpaketsd = $this->api->getPaketsd($paketsd);
        }
        if ($getpaketsd) {
            $this->response([
                'status' => true,
                'data' => $getpaketsd

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
        $paketsd = $this->delete('id_paket_latihan_sd');

        if (!$paketsd) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deletePaketsd($paketsd) > 0) {
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
            'id_paket_latihan_sd' => $this->post('id_paket_latihan_sd'),
            'subtema_sd_id' => $this->post('subtema_sd_id'),
            'nama_paket_ujian' => $this->post('nama_paket_ujian')
            

        ];
        if ($this->api->createPaketsd($data) > 0) {
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
        $paketsd = $this->put('id_paket_latihan_sd');
        $data = [
            'id_paket_latihan_sd' => $this->put('id_paket_latihan_sd'),
            'subtema_sd_id' => $this->put('subtema_sd_id'),
            'nama_paket_ujian' => $this->put('nama_paket_ujian')
        ];
        if ($this->api->updatePaketsd($data, $paketsd) > 0) {
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

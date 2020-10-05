<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Paket_latihan_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Paket_api_model/Paket_latihan_model_api', 'api');
    }
    public function index_get()
    {
        $paketlatihan = $this->get('id_paket_latihan');
        if ($paketlatihan === null) {
            $getpaketlatihan = $this->api->getPaketlatihan();
        } else {
            $getpaketlatihan = $this->api->getPaketlatihan($paketlatihan);
        }
        if ($getpaketlatihan) {
            $this->response([
                'status' => true,
                'data' => $getpaketlatihan

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
        $paketlatihan = $this->delete('id_paket_latihan');

        if (!$paketlatihan) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deletePaketlatihan($paketlatihan) > 0) {
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
            'id_paket_latihan' => $this->post('id_paket_latihan'),
            'bab_latihan_id' => $this->post('bab_latihan_id'),
            'nama_paket' => $this->post('nama_paket')
            

        ];
        if ($this->api->createPaketlatihan($data) > 0) {
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
        $paketlatihan = $this->put('id_paket_latihan');
        $data = [
            'id_paket_latihan' => $this->put('id_paket_latihan'),
            'bab_latihan_id' => $this->put('bab_latihan_id'),
            'nama_paket' => $this->put('nama_paket')
        ];
        if ($this->api->updatePaketlatihan($data, $paketlatihan) > 0) {
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

<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Nilai_latihan_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_api_model/Nilai_latihan_model_api', 'api');
    }
    public function index_get()
    {
        $nilailatihan = $this->get('id_nilai_latihan'); 
        if ($nilailatihan === null) {
            $getnilailatihan = $this->api->getNilailatihan();
        } else {
            $getnilailatihan = $this->api->getNilailatihan($nilailatihan);
        }
        if ($getnilailatihan) {
            $this->response([
                'status' => true,
                'data' => $getnilailatihan

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
        $nilailatihan = $this->delete('id_nilai_latihan');

        if (!$nilailatihan) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteNilailatihan($nilailatihan) > 0) {
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
            'id_nilai_latihan' => $this->post('id_nilai_latihan'),
            'bab_latihan_id' => $this->post('bab_latihan_id'),
            'user_id' => $this->post('user_id'),
            'nilai' => $this->post('nilai')
            

        ];
        if ($this->api->createNilailatihan($data) > 0) {
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
        $nilailatihan = $this->put('id_nilai_latihan');
        $data = [
            'id_nilai_latihan' => $this->put('id_nilai_latihan'),
            'bab_latihan_id' => $this->put('bab_latihan_id'),
            'user_id' => $this->put('user_id'),
            'nilai' => $this->put('nilai')
        ];
        if ($this->api->updateNilailatihan($data, $nilailatihan) > 0) {
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

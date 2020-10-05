<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Nilai_sd_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_api_model/Nilai_sd_model_api', 'api');
    }
    public function index_get()
    {
        $nilaisd = $this->get('id_nilai_latihan_sd');
        if ($nilaisd === null) {
            $getnilaisd = $this->api->getNilaisd();
        } else {
            $getnilaisd = $this->api->getNilaisd($nilaisd);
        }
        if ($getnilaisd) {
            $this->response([
                'status' => true,
                'data' => $getnilaisd

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
        $nilaisd = $this->delete('id_nilai_latihan_sd');

        if (!$nilaisd) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteNilaisd($nilaisd) > 0) {
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
            'id_nilai_latihan_sd' => $this->post('id_nilai_latihan_sd'),
            'subtema_sd_id' => $this->post('subtema_sd_id'),
            'user_id' => $this->post('user_id'),
            'nilai' => $this->post('nilai')
            

        ];
        if ($this->api->createNilaisd($data) > 0) {
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
        $nilaisd = $this->put('id_nilai_latihan_sd');
        $data = [
            'id_nilai_latihan_sd' => $this->put('id_nilai_latihan_sd'),
            'subtema_sd_id' => $this->put('subtema_sd_id'),
            'user_id' => $this->put('user_id'),
            'nilai' => $this->put('nilai')
        ];
        if ($this->api->updateNilaisd($data, $nilaisd) > 0) {
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

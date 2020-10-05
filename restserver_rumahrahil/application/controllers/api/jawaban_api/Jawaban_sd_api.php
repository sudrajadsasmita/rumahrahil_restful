<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Jawaban_sd_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jawaban_api_model/Jawaban_sd_model_api', 'api');
    }
    public function index_get()
    {
        $jawabansd = $this->get('id_jawaban_latihan_sd');
        if ($jawabansd === null) {
            $getjawabansd = $this->api->getJawabansd();
        } else {
            $getjawabansd = $this->api->getJawabansd($jawabansd);
        }
        if ($getjawabansd) {
            $this->response([
                'status' => true,
                'data' => $getjawabansd

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
        $jawabansd = $this->delete('id_jawaban_latihan_sd');

        if (!$jawabansd) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteJawabansd($jawabansd) > 0) {
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
            'id_jawaban_latihan_sd' => $this->post('id_jawaban_latihan_sd'),
            'kunci_jawaban_sd_id' => $this->post('kunci_jawaban_sd_id'),
            'soal_latihan_sd_id' => $this->post('soal_latihan_sd_id'),
            'option_a' => $this->post('option_a'),
            'option_b' => $this->post('option_b'),
            'option_c' => $this->post('option_c'),
            'option_d' => $this->post('option_d')

        ];
        if ($this->api->createJawabansd($data) > 0) {
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
        $jawabansd = $this->put('id_jawaban_latihan_sd');
        $data = [
            'id_jawaban_latihan_sd' => $this->put('id_jawaban_latihan_sd'),
            'kunci_jawaban_sd_id' => $this->put('kunci_jawaban_sd_id'),
            'soal_latihan_sd_id' => $this->put('soal_latihan_sd_id'),
            'option_a' => $this->put('option_a'),
            'option_b' => $this->put('option_b'),
            'option_c' => $this->put('option_c'),
            'option_d' => $this->put('option_d')
        ];
        if ($this->api->updateJawabansd($data, $jawabansd) > 0) {
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

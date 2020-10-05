<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Jawaban_latihan_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jawaban_api_model/Jawaban_latihan_model_api', 'api');
    }
    public function index_get()
    {
        $jawabanlatihan = $this->get('id_jawaban_latihan');
        if ($jawabanlatihan === null) {
            $getjawabanlatihan = $this->api->getJawabanlatihan();
        } else {
            $getjawabanlatihan = $this->api->getJawabanlatihan($jawabanlatihan);
        }
        if ($getjawabanlatihan) {
            $this->response([
                'status' => true,
                'data' => $getjawabanlatihan

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
        $jawabanlatihan = $this->delete('id_jawaban_latihan');

        if (!$jawabanlatihan) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteJawabanlatihan($jawabanlatihan) > 0) {
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
            'id_jawaban_latihan' => $this->post('id_jawaban_latihan'),
            'soal_latihan_id' => $this->post('soal_latihan_id'),
            'kunci_jawaban_latihan_id' => $this->post('kunci_jawaban_latihan_id'),
            'option_a' => $this->post('option_a'), 
            'option_b' => $this->post('option_b'),
            'option_c' => $this->post('option_c'),
            'option_d' => $this->post('option_d')

        ];
        if ($this->api->createJawabanlatihan($data) > 0) {
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
        $jawabanlatihan = $this->put('id_jawaban_latihan');
        $data = [
            'id_jawaban_latihan' => $this->put('id_jawaban_latihan'),
            'soal_latihan_id' => $this->put('soal_latihan_id'),
            'kunci_jawaban_latihan_id' => $this->put('kunci_jawaban_latihan_id'),
            'option_a' => $this->put('option_a'), 
            'option_b' => $this->put('option_b'),
            'option_c' => $this->put('option_c'),
            'option_d' => $this->put('option_d')
        ];
        if ($this->api->updateJawabanlatihan($data, $jawabanlatihan) > 0) {
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

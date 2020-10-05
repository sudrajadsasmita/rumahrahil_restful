<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Soal_ujian_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Soal_api_model/Soal_ujian_model_api', 'api');
    }
    public function index_get()
    {
        $soalujian = $this->get('id_soal_ujian');
        if ($soalujian === null) {
            $getsoalujian = $this->api->getSoalujian();
        } else {
            $getsoalujian = $this->api->getSoalujian($soalujian);
        }
        if ($getsoalujian) {
            $this->response([
                'status' => true,
                'data' => $getsoalujian

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
        $soalujian = $this->delete('id_soal_ujian');

        if (!$soalujian) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteSoalujian($soalujian) > 0) {
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
            'id_soal_ujian' => $this->post('id_soal_ujian'),
            'paket_soal_id' => $this->post('paket_soal_id'),
            'no_soal' => $this->post('no_soal'),
            'soal_text' => $this->post('soal_text'), 
            'soal_gambar' => $this->post('soal_gambar'),
            'soal_suara' => $this->post('soal_suara')

        ];
        if ($this->api->createSoalujian($data) > 0) {
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
        $soalujian = $this->put('id_soal_ujian');
        $data = [
            'id_soal_ujian' => $this->put('id_soal_ujian'),
            'paket_soal_id' => $this->put('paket_soal_id'),
            'no_soal' => $this->put('no_soal'),
            'soal_text' => $this->put('soal_text'), 
            'soal_gambar' => $this->put('soal_gambar'),
            'soal_suara' => $this->put('soal_suara')
        ];
        if ($this->api->updateSoalujian($data, $soalujian) > 0) {
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

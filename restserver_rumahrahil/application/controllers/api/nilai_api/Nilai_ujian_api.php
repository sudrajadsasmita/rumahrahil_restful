<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Nilai_ujian_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_api_model/Nilai_ujian_model_api', 'api');
    }
    public function index_get()
    {
        $nilaiujian = $this->get('id_nilai_ujian');
        if ($nilaiujian === null) {
            $getnilaiujian = $this->api->getNilaiujian();
        } else {
            $getnilaiujian = $this->api->getNilaiujian($nilaiujian);
        }
        if ($getnilaiujian) {
            $this->response([
                'status' => true,
                'data' => $getnilaiujian

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
        $nilaiujian = $this->delete('id_nilai_ujian');

        if (!$nilaiujian) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteNilaiujian($nilaiujian) > 0) {
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
            'id_nilai_ujian' => $this->post('id_nilai_ujian'),
            'user_id' => $this->post('user_id'),
            'paket_ujian_id' => $this->post('paket_ujian_id'),
            'nilai' => $this->post('nilai')
            

        ];
        if ($this->api->createNilaiujian($data) > 0) {
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
        $nilaiujian = $this->put('id_nilai_ujian');
        $data = [
            'id_nilai_ujian' => $this->put('id_nilai_ujian'),
            'user_id' => $this->put('user_id'),
            'paket_ujian_id' => $this->put('paket_ujian_id'),
            'nilai' => $this->put('nilai')
        ];
        if ($this->api->updateNilaiujian($data, $nilaiujian) > 0) {
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

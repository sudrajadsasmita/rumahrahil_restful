<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Kunci_ujian_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kunci_api_model/Kunci_ujian_model_api', 'api');
    }
    public function index_get()
    {
        $kunciujian = $this->get('id_kunci_jawaban_ujian');
        if ($kunciujian === null) {
            $getkunciujian = $this->api->getKunciujian();
        } else {
            $getkunciujian = $this->api->getKunciujian($kunciujian);
        }
        if ($getkunciujian) {
            $this->response([
                'status' => true,
                'data' => $getkunciujian

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
        $kunciujian = $this->delete('id_kunci_jawaban_ujian');

        if (!$kunciujian) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteKunciujian($kunciujian) > 0) {
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
            'id_kunci_jawaban_ujian' => $this->post('id_kunci_jawaban_ujian'),
            'paket_ujian_id' => $this->post('paket_ujian_id'),
            'jawaban_benar' => $this->post('jawaban_benar')
            

        ];
        if ($this->api->createKunciujian($data) > 0) {
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
        $kunciujian = $this->put('id_kunci_jawaban_ujian');
        $data = [
            'id_kunci_jawaban_ujian' => $this->put('id_kunci_jawaban_ujian'),
            'paket_ujian_id' => $this->put('paket_ujian_id'),
            'jawaban_benar' => $this->put('jawaban_benar')
        ];
        if ($this->api->updateKunciujian($data, $kunciujian) > 0) {
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

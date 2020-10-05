<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Tema_sd_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_api_model/Tema_model_api', 'api');
    }
    public function index_get()
    {
        $tema = $this->get('id_tema_sd');
        if ($tema === null) {
            $gettema = $this->api->getTema();
        } else {
            $gettema = $this->api->getTema($tema);
        }
        if ($gettema) {
            $this->response([
                'status' => true,
                'data' => $gettema

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
        $tema = $this->delete('id_tema_sd');

        if (!$tema) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->api->deleteTema($tema) > 0) {
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
            'id_tema_sd' => $this->post('id_tema_sd'),
            'kelas_id' => $this->post('kelas_id'),
            'nama_tema' => $this->post('nama_tema')

        ];
        if ($this->api->createTema($data) > 0) {
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
        $tema = $this->put('id_tema_sd');
        $data = [
            'id_tema_sd' => $this->put('id_tema_sd'),
            'kelas_id' => $this->put('kelas_id'),
            'nama_tema' => $this->put('nama_tema')
        ];
        if ($this->api->updateTema($data, $tema) > 0) {
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

<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Kelas_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_api_model/Kelas_model_api', 'api');
    }
    public function index_get()
    {
        $kelas = $this->get('id_kelas');
        if ($kelas === null) {
            $getkelas = $this->api->getKelas();
        } else {
            $getkelas = $this->api->getKelas($kelas);
        }
        if ($getkelas) {
            $this->response([
                'status' => true,
                'data' => $getkelas

            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}

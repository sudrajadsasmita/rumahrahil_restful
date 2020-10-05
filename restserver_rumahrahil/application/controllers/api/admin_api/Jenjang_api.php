<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Jenjang_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_api_model/Jenjang_model_api', 'api');
    }
    public function index_get()
    {
        $jenjang = $this->get('id_jenjang');
        if ($jenjang === null) {
            $getjenjang = $this->api->getJenjang();
        } else {
            $getjenjang = $this->api->getJenjang($jenjang);
        }
        if ($getjenjang) {
            $this->response([
                'status' => true,
                'data' => $getjenjang

            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}

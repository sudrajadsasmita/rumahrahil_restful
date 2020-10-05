<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Mapel_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_api_model/Mapel_model_api', 'api');
    }
    public function index_get()
    {
        $mapel = $this->get('id_mapel');
        if ($mapel === null) {
            $getmapel = $this->api->getMapel();
        } else {
            $getmapel = $this->api->getMapel($mapel);
        }
        if ($getmapel) {
            $this->response([
                'status' => true,
                'data' => $getmapel

            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}

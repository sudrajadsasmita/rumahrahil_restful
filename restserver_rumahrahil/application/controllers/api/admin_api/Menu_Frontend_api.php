<?php
defined('BASEPATH') or exit('No direct script access allowed');
// import library dari REST_Controller

use chriskacerguis\RestServer\REST_Controller;
use phpDocumentor\Reflection\Types\This;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Menu_Frontend_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_api_model/Menu_frontend_Model_api', 'api');
    }
    public function index_get()
    {
        $role = $this->get('role_id');
        if ($role === null) {
            $getMenu = $this->api->getMenu();
        } else {
            $getMenu = $this->api->getMenu($role);
        }
        if ($getMenu) {
            $this->response([
                'status' => true,
                'data' => $getMenu
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}

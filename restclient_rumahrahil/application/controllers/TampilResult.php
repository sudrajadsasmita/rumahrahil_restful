<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TampilResult extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $user = $this->user->getAllUser();
        var_dump($user);
    }
}

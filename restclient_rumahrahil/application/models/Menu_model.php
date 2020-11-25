<?php

use GuzzleHttp\Client;

class Menu_model extends CI_model
{
    private $_client;
    public function __construct()
    {
        parent::__construct();
        $this->_client = new Client([
            'base_uri' => 'http://localhost/rumahrahil_restful/restserver_rumahrahil/api/Admin_api/'
        ]);
    }
    public function getMenuWhereRoleId($id)
    {
        $response = $this->_client->request('GET', 'Menu_Frontend_api', [
            'query' => [
                'rahil_key' => 'rumahrahileducation',
                'role_id' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }
}

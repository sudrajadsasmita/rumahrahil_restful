<?php

use GuzzleHttp\Client;

class Profile_model extends CI_model
{
    private $_client;
    private $key = 'rumahrahileducation';
    public function __construct()
    {
        parent::__construct();
        $this->_client = new Client([
            'base_uri' => 'http://localhost/rumahrahil_restful/restserver_rumahrahil/api/Admin_api/'
        ]);
    }
    public function getAllUser()
    {
        $response = $this->_client->request('GET', 'User_api', [
            'query' => [
                'rahil_key' => $this->key
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function getUserWhereId($id)
    {
        $response = $this->_client->request('GET', 'User_api', [
            'query' => [
                'rahil_key' => $this->key,
                'id_user' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }
    public function getUserWhereEmail($id)
    {
        $response = $this->_client->request('GET', 'User_api', [
            'query' => [
                'rahil_key' => $this->key,
                'email' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }
}

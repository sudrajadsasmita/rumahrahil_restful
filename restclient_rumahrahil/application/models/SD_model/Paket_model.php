<?php

use GuzzleHttp\Client;

class Paket_model extends CI_model
{
    public $_client;

    public function __construct()
    {
        $this->_client = new Client(
            [
                'base_uri' => 'http://localhost/rumahrahil_restful/restserver_rumahrahil/api/paket_api/'
            ]
        );
    }

    //get data soal
    public function getPaket()
    {
        $response = $this->_client->request('GET', 'Paket_sd_api', [
            'query' => [
                'rahil_key' => 'rumahrahileducation'
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
}

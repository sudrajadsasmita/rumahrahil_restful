<?php

use GuzzleHttp\CLient;

class Soal_model extends CI_model
{
    public $_client;

    public function __construct() 
    {
        $this->_client = new Client(
            [
                'base_uri' => 'http://localhost/RumahRahil/restserver_rumahrahil/api//'
            ]
        );
    }

    //get data soal
    public function getSoal()
    {
        $response = $this->_client->request('GET', 'Soal', [
            'query' => [
                'rahil_key' => 'rumahrahileducation' 
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    //create data soal
    public function createSoal()
    {
        $data = [
            
        ];
    }

    //delete data soal
    public function deleteSoal($id) 
    {
        $response = $this->_client->request('DELETE', 'Soal', [
            'form_params' => [
                'id_soal_latihan' => $id,
                'rahil_key' => 'rumahrahileducation'
            ] 
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}

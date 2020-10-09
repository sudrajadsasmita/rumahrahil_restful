<?php

use GuzzleHttp\CLient;

class Kunci_model extends CI_model
{
    public $_client;

    public function __construct() 
    {
        $this->_client = new Client(
            [
                'base_uri' => 'http://localhost/rumahrahil_restful/restserver_rumahrahil/api/kunci_api/'
            ]
        );
    }

    //get data kunci
    public function getKunci()
    {
        $response = $this->_client->request('GET', 'Kunci_latihan_api', [
            'query' => [
                'rahil_key' => 'rumahrahileducation' 
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    //create data kunci
    public function createKunci()
    {
        $data = [
            "paket_latihan_id" => $this->input->post('paket_latihan_id', true),
            "jawaban_benar" => $this->input->post('jawaban_benar', true),
            'rahil_key' => 'rumahrahileducation'
        ];
        $response = $this->_client->request('POST', 'Kunci_latihan_api', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    //edit data kunci
    public function updateKunci()
    {
        $data = [
            "paket_latihan_id" => $this->input->post('paket_latihan_id', true),
            "jawaban_benar" => $this->input->post('jawaban_benar', true),
            "id_kunci_jawaban_latihan" => $this->input->post('id_kunci_jawaban_latihan', true),
            'rahil_key' => 'rumahrahileducation'
        ];
        $response = $this->_client->request('PUT', 'Jawaban_latihan_api', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    //delete data kunci
    public function deleteKunci($id) 
    {
        $response = $this->_client->request('DELETE', 'Kunci_latihan_api', [
            'form_params' => [
                'id_kunci_jawaban_latihan' => $id,
                'rahil_key' => 'rumahrahileducation'
            ] 
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}

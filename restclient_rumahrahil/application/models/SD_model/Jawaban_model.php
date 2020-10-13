<?php

use GuzzleHttp\CLient;

class Jawaban_model extends CI_model
{
    public $_client;

    public function __construct() 
    {
        $this->_client = new Client(
            [
                'base_uri' => 'http://localhost/rumahrahil_restful/restserver_rumahrahil/api/jawaban_api/'
            ]
        );
    }

    //get data jawaban
    public function getJawaban()
    {
        $response = $this->_client->request('GET', 'Jawaban_latihan_api', [
            'query' => [
                'rahil_key' => 'rumahrahileducation' 
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    
    //create data jawaban
    public function createJawaban()
    {
        $data = [
            "soal_latihan_id" => $this->input->post('soal', true),
            "option_a" => $this->input->post('option_a', true),
            "option_b" => $this->input->post('option_b', true),
            "option_c" => $this->input->post('option_c', true),
            "option_d" => $this->input->post('option_d', true),
            'rahil_key' => 'rumahrahileducation'
        ];
        $response = $this->_client->request('POST', 'Jawaban_latihan_api', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    //edit data jawaban
    public function updateJawaban()
    {
        $data = [
            "soal_latihan_id" => $this->input->post('soal', true),
            "option_a" => $this->input->post('option_a', true),
            "option_b" => $this->input->post('option_b', true),
            "option_c" => $this->input->post('option_c', true),
            "option_d" => $this->input->post('option_d', true),
            "id_jawaban_latihan" => $this->input->post('id_jawaban_latihan', true),
            'rahil_key' => 'rumahrahileducation'
        ];
        $response = $this->_client->request('PUT', 'Jawaban_latihan_api', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    //delete data jawaban
    public function deleteJawaban($id) 
    {
        $response = $this->_client->request('DELETE', 'Jawaban_latihan_api', [
            'form_params' => [
                'id_jawaban_latihan' => $id,
                'rahil_key' => 'rumahrahileducation'
            ] 
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}

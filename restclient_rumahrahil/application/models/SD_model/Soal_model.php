<?php

use GuzzleHttp\Client;

class Soal_model extends CI_model
{
    public $_client;

    public function __construct()
    {
        $this->_client = new Client(
            [
                'base_uri' => 'http://localhost/rumahrahil_restful/restserver_rumahrahil/api/soal_api/'
            ]
        );
    }

    //get data soal
    public function getSoal($id)
    {
        $response = $this->_client->request('GET', 'Soal_sd_api', [
            'query' => [
                'rahil_key' => 'rumahrahileducation',
                'paket_latihan_sd_id' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }


    //create data soal
    public function createSoal()
    {
        $data = [
            "paket_latihan_id" => $this->input->post('paket_latihan_id', true),
            "no_soal" => $this->input->post('no_soal', true),
            "soal_text" => $this->input->post('soal_text', true),
            "soal_gambar" => $this->input->post('soal_gambar', true),
            "soal_suara" => $this->input->post('soal_suara', true),
            'rahil_key' => 'rumahrahileducation'
        ];
        $response = $this->_client->request('POST', 'Soal_latihan_api', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    //edit data soal
    public function updateSoal()
    {
        $data = [
            "paket_latihan_id" => $this->input->post('paket_latihan_id', true),
            "no_soal" => $this->input->post('no_soal', true),
            "soal_text" => $this->input->post('soal_text', true),
            "soal_gambar" => $this->input->post('soal_gambar', true),
            "soal_suara" => $this->input->post('soal_suara', true),
            "id_soal_latihan" => $this->input->post('id_soal_latihan', true),
            'rahil_key' => 'rumahrahileducation'
        ];
        $response = $this->_client->request('PUT', 'Soal_latihan_api', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    //delete data soal
    public function deleteSoal($id)
    {
        $response = $this->_client->request('DELETE', 'Soal_latihan_api', [
            'form_params' => [
                'id_soal_latihan' => $id,
                'rahil_key' => 'rumahrahileducation'
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}

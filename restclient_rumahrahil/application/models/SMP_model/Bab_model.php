<?php

use GuzzleHttp\CLient;

class Bab_model extends CI_model
{

    public $_client;

    public function __construct()
    {
        $this->_client = new Client(
            [
                'base_uri' => 'http://localhost/RumahRahil/restserver_rumahrahil/api/Admin_api/',
            ]
        );
    }

    public function getAllBab()
    {
        $response = $this->_client->request('GET', 'Bab_api', [
            'query' => [
                'rahil_key' => 'rumahrahileducation'
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    public function createBab()
    {
        $data = [
            'id_bab_latihan' => $this->input->post('id_bab_latihan', true),
            'jurusan_id' => $this->input->post('jurusan_id', true),
            'mapel_id' => $this->input->post('mapel_id', true),
            'jenjang_id' => $this->input->post('jenjang_id', true),
            'kelas_id' => $this->input->post('kelas_id', true),
            'nama_bab' => $this->input->post('nama_bab', true),
            'rahil_key' => 'rumahrahileducation'
        ];

        $response = $this->_client->request('POST', 'Bab_api', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function updateBab()
    {
        $data = [
            'id_bab_latihan' => $this->input->post('id_bab_latihan', true),
            'jurusan_id' => $this->input->post('jurusan_id', true),
            'mapel_id' => $this->input->post('mapel_id', true),
            'jenjang_id' => $this->input->post('jenjang_id', true),
            'kelas_id' => $this->input->post('kelas_id', true),
            'nama_bab' => $this->input->post('nama_bab', true),
            'rahil_key' => 'rumahrahileducation'
        ];

        $response = $this->_client->request('PUT', 'Bab_api', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function deleteBab($id)
    {
        $response = $this->_client->request('DELETE', 'Bab_api', [
            'form_params' => [
                'id' => $id,
                'rahil_key' => 'rumahrahileducation'
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

}

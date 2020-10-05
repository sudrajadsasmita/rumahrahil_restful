<?php

use GuzzleHttp\CLient;

class User_model extends CI_model
{
    public function getAllUser()
    {
        $client = new Client();

        $response = $client->request('GET', 'http://localhost/RumahRahil/api/Admin_api/User_api', [
            'query' => [
                'rahil_key' => 'rumahrahileducation'
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }
}

<?php

class Nilai_latihan_model_api extends CI_Model
{
    public function getNilailatihan($nilailatihan = null)
    {
        if ($nilailatihan === null) {
            return $this->db->get('tb_nilai_latihan')->result_array();
        } else {
            return $this->db->get_where('tb_nilai_latihan', ['id_nilai_latihan' => $nilailatihan])->result_array();
        }
    }

    public function deleteNilailatihan($nilailatihan)
    {
        $this->db->delete('tb_nilai_latihan', ['id_nilai_latihan' => $nilailatihan]);
        return $this->db->affected_rows();
    }
    public function createNilailatihan($data)
    {
        $this->db->insert('tb_nilai_latihan', $data);
        return $this->db->affected_rows();
    }
    public  function updateNilailatihan($data, $nilailatihan)
    {
        $this->db->update('tb_nilai_latihan', $data, ['id_nilai_latihan' => $user]);
        return $this->db->affected_rows();
    }
}

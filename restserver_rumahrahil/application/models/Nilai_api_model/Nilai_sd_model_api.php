<?php

class Nilai_sd_model_api extends CI_Model
{
    public function getNilaisd($nilaisd = null)
    {
        if ($nilaisd === null) {
            return $this->db->get('tb_nilai_latihan_sd')->result_array();
        } else {
            return $this->db->get_where('tb_nilai_latihan_sd', ['id_nilai_latihan_sd' => $nilaisd])->result_array();
        }
    }

    public function deleteNilaisd($nilaisd)
    {
        $this->db->delete('tb_nilai_latihan_sd', ['id_nilai_latihan_sd' => $nilaisd]);
        return $this->db->affected_rows();
    }
    public function createNilaisd($data)
    {
        $this->db->insert('tb_nilai_latihan_sd', $data);
        return $this->db->affected_rows();
    }
    public  function updateNilaisd($data, $nilaisd)
    {
        $this->db->update('tb_nilai_latihan_sd', $data, ['id_nilai_latihan_sd' => $user]);
        return $this->db->affected_rows();
    }
}

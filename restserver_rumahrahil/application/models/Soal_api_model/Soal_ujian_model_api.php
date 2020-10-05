<?php

class Soal_ujian_model_api extends CI_Model
{
    public function getSoalujian($soalujian = null)
    {
        if ($soalujian === null) {
            return $this->db->get('tb_soal_ujian')->result_array();
        } else {
            return $this->db->get_where('tb_soal_ujian', ['id_soal_ujian' => $soalujian])->result_array();
        }
    }

    public function deleteSoalujian($soalujian)
    {
        $this->db->delete('tb_soal_ujian', ['id_soal_ujian' => $soalujian]);
        return $this->db->affected_rows();
    }
    public function createSoalujian($data)
    {
        $this->db->insert('tb_soal_ujian', $data);
        return $this->db->affected_rows();
    }
    public  function updateSoalujian($data, $soalujian)
    {
        $this->db->update('tb_soal_ujian', $data, ['id_soal_ujian' => $user]);
        return $this->db->affected_rows();
    }
}

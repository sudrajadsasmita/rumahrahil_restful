<?php

class Nilai_ujian_model_api extends CI_Model
{
    public function getNilaiujian($nilaiujian = null)
    {
        if ($nilaiujian === null) {
            return $this->db->get('tb_nilai_ujian')->result_array();
        } else {
            return $this->db->get_where('tb_nilai_ujian', ['id_nilai_ujian' => $nilaiujian])->result_array();
        }
    }

    public function deleteNilaiujian($nilaiujian)
    {
        $this->db->delete('tb_nilai_ujian', ['id_nilai_ujian' => $nilaiujian]);
        return $this->db->affected_rows();
    }
    public function createNilaiujian($data)
    {
        $this->db->insert('tb_nilai_ujian', $data);
        return $this->db->affected_rows();
    }
    public  function updateNilaiujian($data, $nilaiujian)
    {
        $this->db->update('tb_nilai_ujian', $data, ['id_nilai_ujian' => $user]);
        return $this->db->affected_rows();
    }
}

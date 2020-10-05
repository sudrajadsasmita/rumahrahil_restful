<?php

class Kunci_ujian_model_api extends CI_Model
{
    public function getKunciujian($kunciujian = null)
    {
        if ($kunciujian === null) {
            return $this->db->get('tb_kunci_jawaban_ujian')->result_array();
        } else {
            return $this->db->get_where('tb_kunci_jawaban_ujian', ['id_kunci_jawaban_ujian' => $kunciujian])->result_array();
        }
    }

    public function deleteKunciujian($kunciujian)
    {
        $this->db->delete('tb_kunci_jawaban_ujian', ['id_kunci_jawaban_ujian' => $kunciujian]);
        return $this->db->affected_rows();
    }
    public function createKunciujian($data)
    {
        $this->db->insert('tb_kunci_jawaban_ujian', $data);
        return $this->db->affected_rows();
    }
    public  function updateKunciujian($data, $kunciujian)
    {
        $this->db->update('tb_kunci_jawaban_ujian', $data, ['id_kunci_jawaban_ujian' => $user]);
        return $this->db->affected_rows();
    }
}

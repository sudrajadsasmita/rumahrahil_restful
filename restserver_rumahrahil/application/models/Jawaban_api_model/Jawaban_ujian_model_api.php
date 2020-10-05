<?php

class Jawaban_ujian_model_api extends CI_Model
{
    public function getJawabanujian($jawabanujian = null)
    {
        if ($jawabanujian === null) {
            return $this->db->get('tb_jawaban_ujian')->result_array();
        } else {
            return $this->db->get_where('tb_jawaban_ujian', ['id_jawaban_ujian' => $jawabanujian])->result_array();
        }
    }

    public function deleteJawabanujian($jawabanujian)
    {
        $this->db->delete('tb_jawaban_ujian', ['id_jawaban_ujian' => $jawabanujian]);
        return $this->db->affected_rows();
    }
    public function createJawabanujian($data)
    {
        $this->db->insert('tb_jawaban_ujian', $data);
        return $this->db->affected_rows();
    }
    public  function updateJawabanujian($data, $jawabanujian)
    {
        $this->db->update('tb_jawaban_ujian', $data, ['id_jawaban_ujian' => $jawabanujian]);
        return $this->db->affected_rows();
    }
}

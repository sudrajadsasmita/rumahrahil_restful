<?php

class Jawaban_latihan_model_api extends CI_Model
{
    public function getJawabanlatihan($jawabanlatihan = null)
    {
        if ($jawabanlatihan === null) {
            return $this->db->get('tb_jawaban_latihan')->result_array();
        } else {
            return $this->db->get_where('tb_jawaban_latihan', ['id_jawaban_latihan' => $jawabanlatihan])->result_array();
        }
    }

    public function getJawabanJoinKelas($kelasId = null)
    {
        if ($kelasId === null) {
            return $this->db->query("SELECT tb_jawaban_latihan.id_jawaban_latihan, tb_soal_latihan.id_soal_latihan, tb_soal_latihan.soal_text, tb_jawaban_latihan.soal_latihan_id, tb_jawaban_latihan.option_a,  tb_jawaban_latihan.option_b, tb_jawaban_latihan.option_c, tb_jawaban_latihan.option_d
                                        FROM tb_soal_latihan JOIN tb_jawaban_latihan
                                        ON tb_soal_latihan.id_soal_latihan = tb_jawaban_latihan.soal_latihan_id")->result_array();
        } else {
            return $this->db->query("SELECT tb_jawaban_latihan.id_jawaban_latihan, tb_soal_latihan.id_soal_latihan, tb_soal_latihan.soal_text, tb_jawaban_latihan.soal_latihan_id, tb_jawaban_latihan.option_a,  tb_jawaban_latihan.option_b, tb_jawaban_latihan.option_c, tb_jawaban_latihan.option_d
                                        FROM tb_soal_latihan JOIN tb_jawaban_latihan
                                        ON tb_soal_latihan.id_soal_latihan = tb_jawaban_latihan.soal_latihan_id
                                        WHERE tb_jawaban_latihan.soal_latihan_id = $kelasId")->result_array();
        }
    }

    public function deleteJawabanlatihan($jawabanlatihan)
    {
        $this->db->delete('tb_jawaban_latihan', ['id_jawaban_latihan' => $jawabanlatihan]);
        return $this->db->affected_rows();
    }
    public function createJawabanlatihan($data)
    {
        $this->db->insert('tb_jawaban_latihan', $data);
        return $this->db->affected_rows();
    }
    public  function updateJawabanlatihan($data, $jawabanlatihan)
    {
        $this->db->update('tb_jawaban_latihan', $data, ['id_jawaban_latihan' => $user]);
        return $this->db->affected_rows();
    }
}

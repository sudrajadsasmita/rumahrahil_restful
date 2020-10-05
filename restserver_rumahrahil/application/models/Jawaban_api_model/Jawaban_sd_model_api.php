<?php

class Jawaban_sd_model_api extends CI_Model
{
    public function getJawabansd($jawabansd = null)
    {
        if ($jawabansd === null) {
            return $this->db->get('tb_jawaban_latihan_sd')->result_array();
        } else {
            return $this->db->get_where('tb_jawaban_latihan_sd', ['id_jawaban_latihan_sd' => $jawabansd])->result_array();
        }
    }

    public function getJawabanSdJoinWithAllItems($id = null)
    {
        if ($id === null) {
            return $this->db->query("SELECT jls.id_jawaban_latihan_sd, jls.option_a, jls.option_b, jls.option_c, jls.option_d, sls.paket_latihan_sd_id, sls.kunci_jawaban_sd_id, sls.no_soal_id, sls.soal_text, sls.soal_gambar, sls.soal_suara, pls.nama_paket_sd, pls.subtema_sd_id, ns.no_soal, kjs.jawaban_benar, ss.nama_subtema 
                                    FROM tb_soal_latihan_sd sls 
                                    JOIN tb_jawaban_latihan_sd jls ON sls.id_soal_latihan_sd = jls.soal_latihan_sd_id 
                                    JOIN tb_paket_latihan_sd pls ON pls.id_paket_latihan_sd = sls.paket_latihan_sd_id 
                                    JOIN tb_no_soal ns ON ns.id_no_soal = sls.no_soal_id 
                                    JOIN tb_kunci_jawaban_sd kjs ON kjs.id_kunci_jawaban_sd = sls.kunci_jawaban_sd_id 
                                    JOIN tb_subtema_sd ss ON ss.id_subtema_sd = pls.subtema_sd_id")->result_array();
        } else {
            return $this->db->query("SELECT jls.id_jawaban_latihan_sd, jls.option_a, jls.option_b, jls.option_c, jls.option_d, sls.paket_latihan_sd_id, sls.kunci_jawaban_sd_id, sls.no_soal_id, sls.soal_text, sls.soal_gambar, sls.soal_suara, pls.nama_paket_sd, pls.subtema_sd_id, ns.no_soal, kjs.jawaban_benar, ss.nama_subtema 
                                    FROM tb_soal_latihan_sd sls 
                                    JOIN tb_jawaban_latihan_sd jls ON sls.id_soal_latihan_sd = jls.soal_latihan_sd_id 
                                    JOIN tb_paket_latihan_sd pls ON pls.id_paket_latihan_sd = sls.paket_latihan_sd_id 
                                    JOIN tb_no_soal ns ON ns.id_no_soal = sls.no_soal_id 
                                    JOIN tb_kunci_jawaban_sd kjs ON kjs.id_kunci_jawaban_sd = sls.kunci_jawaban_sd_id 
                                    JOIN tb_subtema_sd ss ON ss.id_subtema_sd = pls.subtema_sd_id
                                    WHERE sls.paket_latihan_sd_id = $id")->result_array();
        }
    }

    public function deleteJawabansd($jawabansd)
    {
        $this->db->delete('tb_jawaban_latihan_sd', ['id_jawaban_latihan_sd' => $jawabansd]);
        return $this->db->affected_rows();
    }
    public function createJawabansd($data)
    {
        $this->db->insert('tb_jawaban_latihan_sd', $data);
        return $this->db->affected_rows();
    }
    public  function updateJawabansd($data, $jawabansd)
    {
        $this->db->update('tb_jawaban_latihan_sd', $data, ['id_jawaban_latihan_sd' => $jawabansd]);
        return $this->db->affected_rows();
    }
}

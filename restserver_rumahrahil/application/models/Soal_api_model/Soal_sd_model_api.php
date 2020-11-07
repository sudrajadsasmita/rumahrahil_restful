<?php

class Soal_sd_model_api extends CI_Model
{
    public function getSoalSd($soalsd = null)
    {
        if ($soalsd === null) {
            return $this->db->query("SELECT sls.id_soal_latihan_sd, pls.id_paket_latihan_sd, pls.nama_paket_sd, pls.subtema_sd_id, ss.nama_subtema, sls.no_soal_id, sls.soal_text, sls.soal_gambar, sls.soal_suara, sls.option_a, sls.option_b, sls.option_c, sls.option_d, sls.jawaban_benar
                                        FROM tb_subtema_sd ss
                                        JOIN tb_paket_latihan_sd pls ON ss.id_subtema_sd = pls.subtema_sd_id 
                                        JOIN tb_soal_latihan_sd sls ON sls.paket_latihan_sd_id = pls.id_paket_latihan_sd
                                    ORDER BY pls.nama_paket_sd ASC")->result_array();
        } else {
            return $this->db->query("SELECT sls.id_soal_latihan_sd, pls.id_paket_latihan_sd, pls.nama_paket_sd, pls.subtema_sd_id, ss.nama_subtema, sls.no_soal_id, sls.soal_text, sls.soal_gambar, sls.soal_suara, sls.option_a, sls.option_b, sls.option_c, sls.option_d, sls.jawaban_benar
                                        FROM tb_subtema_sd ss
                                        JOIN tb_paket_latihan_sd pls ON ss.id_subtema_sd = pls.subtema_sd_id 
                                        JOIN tb_soal_latihan_sd sls ON sls.paket_latihan_sd_id = pls.id_paket_latihan_sd
                                    WHERE sls.id_soal_latihan_sd = $soalsd")->result_array();
        }
    }

    public function getSoalSdForAPI($soalsd = null)
    {
        if ($soalsd === null) {
            return $this->db->query("SELECT sls.id_soal_latihan_sd, pls.id_paket_latihan_sd, pls.nama_paket_sd, pls.subtema_sd_id, ss.nama_subtema, sls.no_soal_id, sls.soal_text, sls.soal_gambar, sls.soal_suara, sls.option_a, sls.option_b, sls.option_c, sls.option_d, sls.jawaban_benar
                                        FROM tb_subtema_sd ss
                                        JOIN tb_paket_latihan_sd pls ON ss.id_subtema_sd = pls.subtema_sd_id 
                                        JOIN tb_soal_latihan_sd sls ON sls.paket_latihan_sd_id = pls.id_paket_latihan_sd
                                    ORDER BY pls.nama_paket_sd ASC")->result_array();
        } else {
            return $this->db->query("SELECT sls.id_soal_latihan_sd, pls.id_paket_latihan_sd, pls.nama_paket_sd, pls.subtema_sd_id, ss.nama_subtema, sls.no_soal_id, sls.soal_text, sls.soal_gambar, sls.soal_suara, sls.option_a, sls.option_b, sls.option_c, sls.option_d, sls.jawaban_benar
                                        FROM tb_subtema_sd ss
                                        JOIN tb_paket_latihan_sd pls ON ss.id_subtema_sd = pls.subtema_sd_id 
                                        JOIN tb_soal_latihan_sd sls ON sls.paket_latihan_sd_id = pls.id_paket_latihan_sd
                                    WHERE pls.id_paket_latihan_sd = $soalsd")->result_array();
        }
    }

    public function deleteSoalsd($soalsd)
    {
        $this->db->delete('tb_soal_latihan_sd', ['id_soal_latihan_sd' => $soalsd]);
        return $this->db->affected_rows();
    }
    public function createSoalsd($data)
    {
        $this->db->insert('tb_soal_latihan_sd', $data);
        return $this->db->affected_rows();
    }
    public function updateSoalsd($data, $soalsd)
    {
        $this->db->update('tb_soal_latihan_sd', $data, ['id_soal_latihan_sd' => $soalsd]);
        return $this->db->affected_rows();
    }
}

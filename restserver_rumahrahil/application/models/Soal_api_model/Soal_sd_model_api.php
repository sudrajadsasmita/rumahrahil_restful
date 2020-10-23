<?php

class Soal_sd_model_api extends CI_Model
{
    public function getSoalsd($soalsd = null)
    {
        if ($soalsd === null) {
            return $this->db->get('tb_soal_latihan_sd')->result_array();
        } else {
            return $this->db->get_where('tb_soal_latihan_sd', ['id_paket_latihan_sd' => $soalsd])->result_array();
        }
    }

    public function getSoalSdForAPI($soalsd = null)
    {
        if ($soalsd === null) {
            return $this->db->query("SELECT sls.id_soal_latihan_sd, tkj.jawaban_benar, 
                                        sls.no_soal_id, sls.soal_text, sls.soal_gambar, sls.soal_suara, jls.option_a, jls.option_b, jls.option_c, jls.option_d 
                                        FROM tb_kunci_jawaban_sd tkj 
                                        JOIN tb_soal_latihan_sd sls ON tkj.id_kunci_jawaban_sd = sls.kunci_jawaban_sd_id 
                                        JOIN tb_jawaban_latihan_sd jls ON sls.id_soal_latihan_sd = jls.soal_latihan_sd_id")->result_array();
        } else {
            return $this->db->query("SELECT sls.id_soal_latihan_sd, tkj.jawaban_benar, 
                                        sls.no_soal_id, sls.soal_text, sls.soal_gambar, sls.soal_suara, jls.option_a, jls.option_b, jls.option_c, jls.option_d 
                                        FROM tb_kunci_jawaban_sd tkj 
                                        JOIN tb_soal_latihan_sd sls ON tkj.id_kunci_jawaban_sd = sls.kunci_jawaban_sd_id 
                                        JOIN tb_jawaban_latihan_sd jls ON sls.id_soal_latihan_sd = jls.soal_latihan_sd_id
                                        WHERE sls.paket_latihan_sd_id = $soalsd")->result_array();
        }
    }

    public function getSoalSdJoinWithAllItem($id = null)
    {
        if ($id === null) {
            return $this->db->query("SELECT kjs.jawaban_benar, ns.no_soal, pls.nama_paket_sd, ss.nama_subtema, sls.id_soal_latihan_sd, sls.paket_latihan_sd_id, sls.kunci_jawaban_sd_id, sls.no_soal_id, sls.soal_text, sls.soal_gambar, sls.soal_suara 
                                        FROM tb_kunci_jawaban_sd kjs 
                                        JOIN tb_soal_latihan_sd sls ON kjs.id_kunci_jawaban_sd = sls.kunci_jawaban_sd_id 
                                        JOIN tb_no_soal ns ON ns.id_no_soal = sls.no_soal_id
                                        JOIN tb_paket_latihan_sd pls ON pls.id_paket_latihan_sd = sls.paket_latihan_sd_id
                                        JOIN tb_subtema_sd ss ON ss.id_subtema_sd = pls.subtema_sd_id
                                        ORDER BY pls.nama_paket_sd ASC")->result_array();
        } else {
            return $this->db->query("SELECT kjs.jawaban_benar, ns.no_soal, pls.nama_paket_sd, ss.nama_subtema, sls.id_soal_latihan_sd, sls.paket_latihan_sd_id, sls.kunci_jawaban_sd_id, sls.no_soal_id, sls.soal_text, sls.soal_gambar, sls.soal_suara 
                                        FROM tb_kunci_jawaban_sd kjs 
                                        JOIN tb_soal_latihan_sd sls ON kjs.id_kunci_jawaban_sd = sls.kunci_jawaban_sd_id 
                                        JOIN tb_no_soal ns ON ns.id_no_soal = sls.no_soal_id
                                        JOIN tb_paket_latihan_sd pls ON pls.id_paket_latihan_sd = sls.paket_latihan_sd_id
                                        JOIN tb_subtema_sd ss ON ss.id_subtema_sd = pls.subtema_sd_id
                                        WHERE sls.paket_latihan_sd_id = $id")->result_array();
        }
    }
    public function getSoalSdWhereIdSoal($id)
    {
        return $this->db->query("SELECT kjs.jawaban_benar, ns.no_soal, pls.nama_paket_sd, ss.nama_subtema, sls.id_soal_latihan_sd, sls.paket_latihan_sd_id, sls.kunci_jawaban_sd_id, sls.no_soal_id, sls.soal_text, sls.soal_gambar, sls.soal_suara 
                                    FROM tb_kunci_jawaban_sd kjs 
                                    JOIN tb_soal_latihan_sd sls ON kjs.id_kunci_jawaban_sd = sls.kunci_jawaban_sd_id 
                                    JOIN tb_no_soal ns ON ns.id_no_soal = sls.no_soal_id
                                    JOIN tb_paket_latihan_sd pls ON pls.id_paket_latihan_sd = sls.paket_latihan_sd_id
                                    JOIN tb_subtema_sd ss ON ss.id_subtema_sd = pls.subtema_sd_id
                                    WHERE sls.id_soal_latihan_sd = $id")->result_array();
    }

    public function getSoalWithNumber($no, $paket)
    {
        return $this->db->query("SELECT kjs.jawaban_benar, ns.no_soal, pls.nama_paket_sd, ss.nama_subtema, sls.id_soal_latihan_sd, sls.paket_latihan_sd_id, sls.kunci_jawaban_sd_id, sls.no_soal_id, sls.soal_text, sls.soal_gambar, sls.soal_suara 
                            FROM tb_kunci_jawaban_sd kjs 
                            JOIN tb_soal_latihan_sd sls ON kjs.id_kunci_jawaban_sd = sls.kunci_jawaban_sd_id 
                            JOIN tb_no_soal ns ON ns.id_no_soal = sls.no_soal_id
                            JOIN tb_paket_latihan_sd pls ON pls.id_paket_latihan_sd = sls.paket_latihan_sd_id
                            JOIN tb_subtema_sd ss ON ss.id_subtema_sd = pls.subtema_sd_id
                            WHERE sls.paket_latihan_sd_id = $paket AND ns.no_soal = $no")->result_array();
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

<?php

class Kunci_sd_model_api extends CI_Model
{
    public function getKuncisd($kuncisd = null)
    {
        if ($kuncisd === null) {
            return $this->db->get('tb_kunci_jawaban_sd')->result_array();
        } else {
            return $this->db->get_where('tb_kunci_jawaban_sd', ['id_kunci_jawaban_sd' => $kuncisd])->result_array();
        }
    }

    public function getKunciSdJoinPaketAndNoSoalOrderASC()
    {
        return $this->db->query("SELECT ns.id_no_soal, ns.no_soal, kjs.id_kunci_jawaban_sd, kjs.paket_latihan_sd_id, kjs.no_soal_id, kjs.jawaban_benar, pls.subtema_sd_id, pls.nama_paket_sd, ss.nama_subtema
                                        FROM tb_no_soal ns 
                                        JOIN tb_kunci_jawaban_sd kjs ON ns.id_no_soal = kjs.no_soal_id 
                                        JOIN tb_paket_latihan_sd pls ON pls.id_paket_latihan_sd = kjs.paket_latihan_sd_id
                                        JOIN tb_subtema_sd ss ON ss.id_subtema_sd = pls.subtema_sd_id
                                        ORDER BY pls.nama_paket_sd ASC")->result_array();
    }

    public function getKunciSdJoinPaketAndNoSoal($id = null)
    {
        if ($id === null) {
            return $this->db->query("SELECT ns.id_no_soal, ns.no_soal, kjs.id_kunci_jawaban_sd, kjs.paket_latihan_sd_id, kjs.no_soal_id, kjs.jawaban_benar, pls.subtema_sd_id, pls.nama_paket_sd, ss.nama_subtema
                                        FROM tb_no_soal ns 
                                        JOIN tb_kunci_jawaban_sd kjs ON ns.id_no_soal = kjs.no_soal_id 
                                        JOIN tb_paket_latihan_sd pls ON pls.id_paket_latihan_sd = kjs.paket_latihan_sd_id
                                        JOIN tb_subtema_sd ss ON ss.id_subtema_sd = pls.subtema_sd_id")->result_array();
        } else {
            return $this->db->query("SELECT ns.id_no_soal, ns.no_soal, kjs.id_kunci_jawaban_sd, kjs.paket_latihan_sd_id, kjs.no_soal_id, kjs.jawaban_benar, pls.subtema_sd_id, pls.nama_paket_sd, ss.nama_subtema
                                        FROM tb_no_soal ns 
                                        JOIN tb_kunci_jawaban_sd kjs ON ns.id_no_soal = kjs.no_soal_id 
                                        JOIN tb_paket_latihan_sd pls ON pls.id_paket_latihan_sd = kjs.paket_latihan_sd_id
                                        JOIN tb_subtema_sd ss ON ss.id_subtema_sd = pls.subtema_sd_id
                                        WHERE kjs.paket_latihan_sd_id = $id")->result_array();
        }
    }

    public function getNumberSoal($no, $paket)
    {
        return $this->db->query("SELECT ns.id_no_soal, ns.no_soal, kjs.id_kunci_jawaban_sd, kjs.paket_latihan_sd_id, kjs.no_soal_id, kjs.jawaban_benar, pls.subtema_sd_id, pls.nama_paket_sd, ss.nama_subtema
                                    FROM tb_no_soal ns 
                                    JOIN tb_kunci_jawaban_sd kjs ON ns.id_no_soal = kjs.no_soal_id 
                                    JOIN tb_paket_latihan_sd pls ON pls.id_paket_latihan_sd = kjs.paket_latihan_sd_id
                                    JOIN tb_subtema_sd ss ON ss.id_subtema_sd = pls.subtema_sd_id
                                    WHERE ns.no_soal = $no AND kjs.paket_latihan_sd_id = $paket")->result_array();
    }

    public function deleteKuncisd($kuncisd)
    {
        $this->db->delete('tb_kunci_jawaban_sd', ['id_kunci_jawaban_sd' => $kuncisd]);
        return $this->db->affected_rows();
    }
    public function createKuncisd($data)
    {
        $this->db->insert('tb_kunci_jawaban_sd', $data);
        return $this->db->affected_rows();
    }
    public  function updateKuncisd($data, $kuncisd)
    {
        $this->db->update('tb_kunci_jawaban_sd', $data, ['id_kunci_jawaban_sd' => $kuncisd]);
        return $this->db->affected_rows();
    }
}

<?php

class Soal_latihan_model_api extends CI_Model
{
    public function getSoallatihan($soallatihan = null)
    {
        if ($soallatihan === null) {
            return $this->db->get('tb_soal_latihan')->result_array();
        } else {
            return $this->db->get_where('tb_soal_latihan', ['id_soal_latihan' => $soallatihan])->result_array();
        }
    }

    public function getSoalJoinKelas($kelasId = null)
    {
        if ($kelasId === null) {
            return $this->db->query("SELECT tb_soal_latihan.id_soal_latihan, tb_soal_latihan.soal_text, tb_soal_latihan.soal_gambar, tb_soal_latihan.soal_suara, tb_paket_latihan.id_paket_latihan ,tb_paket_latihan.nama_paket , tb_kunci_jawaban_latihan.id_kunci_jawaban_latihan , tb_kunci_jawaban_latihan.jawaban_benar
                                        FROM tb_paket_latihan 
                                        JOIN tb_soal_latihan ON tb_paket_latihan.id_paket_latihan = tb_soal_latihan.paket_latihan_id
                                        JOIN tb_kunci_jawaban_latihan ON tb_kunci_jawaban_latihan.id_kunci_jawaban_latihan = tb_soal_latihan.kunci_jawaban_latihan_id")->result_array();
        } else {
            return $this->db->query("SELECT tb_soal_latihan.id_soal_latihan, tb_soal_latihan.soal_text, tb_soal_latihan.soal_gambar, tb_soal_latihan.soal_suara, tb_paket_latihan.id_paket_latihan ,tb_paket_latihan.nama_paket , tb_kunci_jawaban_latihan.id_kunci_jawaban_latihan , tb_kunci_jawaban_latihan.jawaban_benar
                                        FROM tb_paket_latihan 
                                        JOIN tb_soal_latihan ON tb_paket_latihan.id_paket_latihan = tb_soal_latihan.paket_latihan_id
                                        JOIN tb_kunci_jawaban_latihan ON tb_kunci_jawaban_latihan.id_kunci_jawaban_latihan = tb_soal_latihan.kunci_jawaban_latihan_id
                                        WHERE tb_soal_latihan.paket_latihan_id = $kelasId")->result_array();
        }
    }

    public function deleteSoallatihan($soallatihan)
    {
        $this->db->delete('tb_soal_latihan', ['id_soal_latihan' => $soallatihan]);
        return $this->db->affected_rows();
    }
    public function createSoallatihan($data)
    {
        $this->db->insert('tb_soal_latihan', $data);
        return $this->db->affected_rows();
    }
    public  function updateSoallatihan($data, $soallatihan)
    {
        $this->db->update('tb_soal_latihan', $data, ['id_soal_latihan' => $user]);
        return $this->db->affected_rows();
    }
    public function getSoalSMP()
    {
        return $this->db->query("SELECT*FROM tb_soal_latihan WHERE id_soal_latihan > 0")->result_array();
    }
}

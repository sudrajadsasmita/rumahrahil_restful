<?php

class Kunci_latihan_model_api extends CI_Model
{
    public function getKuncilatihan($kuncilatihan = null)
    {
        if ($kuncilatihan === null) {
            return $this->db->get('tb_kunci_jawaban_latihan')->result_array();
        } else {
            return $this->db->get_where('tb_kunci_jawaban_latihan', ['id_kunci_jawaban_latihan' => $kuncilatihan])->result_array();
        }
    }

    public function getKuncismpJoinKelas($kelasId = null)
    {
        if ($kelasId === null) {
            return $this->db->query("SELECT tb_paket_latihan.id_paket_latihan, tb_kunci_jawaban_latihan.paket_latihan_id, tb_kunci_jawaban_latihan.jawaban_benar 
                                        FROM tb_paket_latihan JOIN tb_kunci_jawaban_latihan
                                        ON tb_paket_latihan.id_paket_latihan = tb_kunci_jawaban_latihan.paket_latihan_id")->result_array();
        } else {
            return $this->db->query("SELECT tb_paket_latihan.id_paket_latihan, tb_kunci_jawaban_latihan.paket_latihan_id, tb_kunci_jawaban_latihan.jawaban_benar
                                        FROM tb_paket_latihan JOIN tb_kunci_jawaban_latihan
                                        ON tb_paket_latihan.id_paket_latihan = tb_kunci_jawaban_latihan.paket_latihan_id
                                        WHERE tb_kunci_jawaban_latihan.paket_latihan_id = $kelasId")->result_array();
        }
    }

    public function deleteKuncilatihan($kuncilatihan)
    {
        $this->db->delete('tb_kunci_jawaban_latihan', ['id_kunci_jawaban_latihan' => $kuncilatihan]);
        return $this->db->affected_rows();
    }
    public function createKuncilatihan($data)
    {
        $this->db->insert('tb_kunci_jawaban_latihan', $data);
        return $this->db->affected_rows();
    }
    public  function updateKuncilatihan($data, $kuncilatihan)
    {
        $this->db->update('tb_kunci_jawaban_latihan', $data, ['id_kunci_jawaban_latihan' => $user]);
        return $this->db->affected_rows();
    }
    public function getKunciSMP()
    {
        return $this->db->query("SELECT*FROM tb_kunci_jawaban_latihan WHERE id_kunci_jawaban_latihan > 0")->result_array();
    }
}

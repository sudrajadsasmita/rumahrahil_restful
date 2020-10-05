<?php

class Paket_latihan_model_api extends CI_Model
{
    public function getPaketlatihan($paketlatihan = null)
    {
        if ($paketlatihan === null) {
            return $this->db->get('tb_paket_latihan')->result_array();
        } else {
            return $this->db->get_where('tb_paket_latihan', ['id_paket_latihan' => $paketlatihan])->result_array();
        }
    }

    public function getPaketJoinKelas($kelasId = null)
    {
        if ($kelasId === null) {
            return $this->db->query("SELECT tb_paket_latihan.id_paket_latihan, tb_bab_latihan.id_bab_latihan, tb_bab_latihan.nama_bab, tb_paket_latihan.bab_latihan_id,tb_paket_latihan.nama_paket 
                                        FROM tb_bab_latihan JOIN tb_paket_latihan
                                        ON tb_bab_latihan.id_bab_latihan = tb_paket_latihan.bab_latihan_id")->result_array();
        } else {
            return $this->db->query("SELECT tb_paket_latihan.id_paket_latihan, tb_bab_latihan.id_bab_latihan, tb_bab_latihan.nama_bab, tb_paket_latihan.bab_latihan_id,tb_paket_latihan.nama_paket 
                                        FROM tb_bab_latihan JOIN tb_paket_latihan
                                        ON tb_bab_latihan.id_bab_latihan = tb_paket_latihan.bab_latihan_id
                                        WHERE tb_paket_latihan.bab_latihan_id = $kelasId")->result_array();
        }
    }

    public function deletePaketlatihan($paketlatihan)
    {
        $this->db->delete('tb_paket_latihan', ['id_paket_latihan' => $paketlatihan]);
        return $this->db->affected_rows();
    }
    public function createPaketlatihan($data)
    {
        $this->db->insert('tb_paket_latihan', $data);
        return $this->db->affected_rows();
    }
    public  function updatePaketlatihan($data, $paketlatihan)
    {
        $this->db->update('tb_paket_latihan', $data, ['id_paket_latihan' => $user]);
        return $this->db->affected_rows();
    }
    public function getPaketSMP()
    {
        return $this->db->query("SELECT*FROM tb_paket_latihan WHERE id_paket_latihan > 0")->result_array();
    }
}

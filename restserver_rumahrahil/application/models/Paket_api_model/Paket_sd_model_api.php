<?php

use phpDocumentor\Reflection\Types\This;

class Paket_sd_model_api extends CI_Model
{
    public function getPaketsd($paketsd = null)
    {
        if ($paketsd === null) {
            return $this->db->get('tb_paket_latihan_sd')->result_array();
        } else {
            return $this->db->get_where('tb_paket_latihan_sd', ['id_paket_latihan_sd' => $paketsd])->result_array();
        }
    }

    public function getPaketsdJoinSubtema($id = null)
    {
        if ($id === null) {
            return $this->db->query("SELECT tb_subtema_sd.id_subtema_sd, tb_subtema_sd.nama_subtema, tb_paket_latihan_sd.id_paket_latihan_sd, tb_paket_latihan_sd.subtema_sd_id, tb_paket_latihan_sd.nama_paket_sd
                                    FROM tb_subtema_sd JOIN tb_paket_latihan_sd 
                                    ON tb_subtema_sd.id_subtema_sd = tb_paket_latihan_sd.subtema_sd_id
                                    ORDER BY tb_paket_latihan_sd.nama_paket_sd ASC")->result_array();
        } else {
            return $this->db->query("SELECT tb_subtema_sd.id_subtema_sd, tb_subtema_sd.nama_subtema, tb_paket_latihan_sd.id_paket_latihan_sd, tb_paket_latihan_sd.subtema_sd_id, tb_paket_latihan_sd.nama_paket_sd
                                    FROM tb_subtema_sd JOIN tb_paket_latihan_sd 
                                    ON tb_subtema_sd.id_subtema_sd = tb_paket_latihan_sd.subtema_sd_id
                                    WHERE tb_paket_latihan_sd.subtema_sd_id = $id")->result_array();
        }
    }

    public function deletePaketsd($paketsd)
    {
        $this->db->delete('tb_paket_latihan_sd', ['id_paket_latihan_sd' => $paketsd]);
        return $this->db->affected_rows();
    }
    public function createPaketsd($data)
    {
        $this->db->insert('tb_paket_latihan_sd', $data);
        return $this->db->affected_rows();
    }
    public  function updatePaketsd($data, $paketsd)
    {
        $this->db->update('tb_paket_latihan_sd', $data, ['id_paket_latihan_sd' => $paketsd]);
        return $this->db->affected_rows();
    }
}

<?php

class Paket_ujian_model_api extends CI_Model
{
    public function getPaketujian($paketujian = null)
    {
        if ($paketujian === null) {
            return $this->db->get('tb_paket_ujian')->result_array();
        } else {
            return $this->db->get_where('tb_paket_ujian', ['id_paket_ujian' => $paketujian])->result_array();
        }
    }

    public function deletePaketujian($paketujian)
    {
        $this->db->delete('tb_paket_ujian', ['id_paket_ujian' => $paketujian]);
        return $this->db->affected_rows();
    }
    public function createPaketujian($data)
    {
        $this->db->insert('tb_paket_ujian', $data);
        return $this->db->affected_rows();
    }
    public  function updatePaketujian($data, $paketujian)
    {
        $this->db->update('tb_paket_ujian', $data, ['id_paket_ujian' => $user]);
        return $this->db->affected_rows();
    }
}

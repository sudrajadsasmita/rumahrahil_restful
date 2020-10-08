<?php

class Kelas_model_api extends CI_Model
{
    public function getKelas($kelas = null)
    {
        if ($kelas === null) {
            return $this->db->get('tb_kelas')->result_array();
        } else {
            return $this->db->get_where('tb_kelas', ['id_kelas' => $kelas])->result_array();
        }
    }
    public function getKelasSD()
    {
        return $this->db->query("SELECT*FROM tb_kelas WHERE id_kelas < 7")->result_array();
    }
    public function getKelasSMP()
    {
        return $this->db->query("SELECT*FROM tb_kelas WHERE id_kelas >= 7 AND id_Kelas <=9")->result_array();
    }
}

<?php

class Mapel_model_api extends CI_Model
{
    public function getMapel($mapel = null)
    {
        if ($mapel === null) {
            return $this->db->get('tb_mapel')->result_array();
        } else {
            return $this->db->get_where('tb_mapel', ['id_mapel' => $mapel])->result_array();
        }
    }


    public function getMapelJoinKelas($kelasId = null)
    {
        if ($kelasId === null) {
            return $this->db->query("SELECT tb_mapel.id_mapel, tb_kelas.id_kelas, tb_kelas.nama_kelas, tb_mapel.kelas_id,tb_mapel.nama_mapel 
                                        FROM tb_kelas JOIN tb_mapel
                                        ON tb_kelas.id_kelas = tb_mapel.kelas_id")->result_array();
        } else {
            return $this->db->query("SELECT tb_mapel.id_mapel, tb_kelas.id_kelas, tb_kelas.nama_kelas, tb_mapel.kelas_id,tb_mapel.nama_mapel 
                                        FROM tb_kelas JOIN tb_mapel
                                        ON tb_kelas.id_kelas = tb_mapel.kelas_id
                                        WHERE tb_mapel.kelas_id = $kelasId")->result_array();
        }
    }
    public function deleteMapel($mapel)
    {
        $this->db->delete('tb_mapel', ['id_mapel' => $mapel]);
        return $this->db->affected_rows();
    }
    public function createMapel($data)
    {
        $this->db->insert('tb_mapel', $data);
        return $this->db->affected_rows();
    }
    public function updateMapel($data, $mapel)
    {
        $this->db->update('tb_mapel', $data, ['id_mapel' => $mapel]);
        return $this->db->affected_rows();
    }

    public function getMapelSMP($id = null)
    {
        if ($id === null) {
            return $this->db->query("SELECT tb_mapel.id_mapel, tb_mapel.kelas_id, tb_kelas.id_kelas, tb_kelas.nama_kelas, tb_mapel.nama_mapel
                                    FROM tb_kelas JOIN tb_mapel 
                                    ON tb_kelas.id_kelas = tb_mapel.kelas_id
                                    WHERE tb_mapel.kelas_id < 10")->result_array();
        } else {
            return $this->db->query("SELECT tb_mapel.id_mapel, tb_mapel.kelas_id, tb_kelas.id_kelas, tb_kelas.nama_kelas, tb_mapel.nama_mapel
                                    FROM tb_kelas JOIN tb_mapel 
                                    ON tb_kelas.id_kelas = tb_mapel.kelas_id
                                    WHERE tb_mapel.kelas_id < 10 AND tb_mapel.id_mapel = $id")->row_array();
        }
    }
    public function getMapelSMA($id = null)
    {
        if ($id === null) {
            return $this->db->query("SELECT tb_mapel.id_mapel, tb_mapel.kelas_id, tb_kelas.id_kelas, tb_kelas.nama_kelas, tb_mapel.nama_mapel
                                    FROM tb_kelas JOIN tb_mapel 
                                    ON tb_kelas.id_kelas = tb_mapel.kelas_id
                                    WHERE tb_mapel.kelas_id >= 10")->result_array();
        } else {
            return $this->db->query("SELECT tb_mapel.id_mapel, tb_mapel.kelas_id, tb_kelas.id_kelas, tb_kelas.nama_kelas, tb_mapel.nama_mapel
                                    FROM tb_kelas JOIN tb_mapel 
                                    ON tb_kelas.id_kelas = tb_mapel.kelas_id
                                    WHERE tb_mapel.kelas_id >= 10 AND tb_mapel.id_mapel = $id")->row_array();
        }
    }
}

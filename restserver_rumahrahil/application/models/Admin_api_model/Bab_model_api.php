<?php

class Bab_model_api extends CI_Model
{
    public function getBab($bab = null)
    {
        if ($bab === null) {
            return $this->db->get('tb_bab_latihan')->result_array();
        } else {
            return $this->db->get_where('tb_bab_latihan', ['id_bab_latihan' => $bab])->result_array();
        }
    }

    public function getBabJoinJurusan($kelasId = null)
    {
        if ($kelasId === null) {
            return $this->db->query("SELECT tb_bab_latihan.id_bab_latihan, tb_bab_latihan.nama_bab, tb_mapel.id_mapel ,tb_mapel.nama_mapel , tb_jenjang.id_jenjang , tb_jenjang.nama_jenjang, tb_kelas.id_kelas ,tb_kelas.nama_kelas 
                                        FROM tb_mapel 
                                        JOIN tb_bab_latihan ON tb_mapel.id_mapel = tb_bab_latihan.mapel_id
                                        JOIN tb_jenjang ON tb_jenjang.id_jenjang = tb_bab_latihan.jenjang_id
                                        JOIN tb_kelas ON tb_kelas.id_kelas = tb_bab_latihan.kelas_id")->result_array();
        } else {
            return $this->db->query("SELECT tb_bab_latihan.id_bab_latihan, tb_bab_latihan.nama_bab, tb_mapel.id_mapel ,tb_mapel.nama_mapel , tb_jenjang.id_jenjang ,tb_jenjang.nama_jenjang, tb_kelas.id_kelas ,tb_kelas.nama_kelas 
                                        FROM tb_mapel 
                                        JOIN tb_bab_latihan ON tb_mapel.id_mapel = tb_bab_latihan.mapel_id
                                        JOIN tb_jenjang ON tb_jenjang.id_jenjang = tb_bab_latihan.jenjang_id
                                        JOIN tb_kelas ON tb_kelas.id_kelas = tb_bab_latihan.kelas_id
                                        WHERE tb_bab_latihan.jurusan_id = $kelasId")->result_array();
        }
    }

    public function deleteBab($bab)
    {
        $this->db->delete('tb_bab_latihan', ['id_bab_latihan' => $bab]);
        return $this->db->affected_rows();
    }
    public function createBab($data)
    {
        $this->db->insert('tb_bab_latihan', $data);
        return $this->db->affected_rows();
    }
    public  function updateBab($data, $bab)
    {
        $this->db->update('tb_bab_latihan', $data, ['id_bab_latihan' => $user]);
        return $this->db->affected_rows();
    }
    public function getBabSMP()
    {
        return $this->db->query("SELECT*FROM tb_bab_latihan WHERE id_bab_latihan > 0")->result_array();
    }
}

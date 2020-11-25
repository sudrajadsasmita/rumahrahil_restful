<?php


class User_model_api extends CI_Model
{


    public function __construct()
    {
    }

    public function getUser($user = null)
    {

        if ($user === null) {
            return $this->db->get('tb_user')->result_array();
        } else {
            return $this->db->get_where('tb_user', ['id_user' => $user])->result_array();
        }
    }
    public function getUserWhereEmail($email)
    {
        return $this->db->get_where('tb_user', ['email' => $email])->row_array();
    }
    public function userFullJoin()
    {
        return $this->db->query("SELECT r.nama_role, ju.nama_jurusan, m.nama_mapel, je.nama_jenjang, k.nama_kelas, u.nama, u.nama, u.alamat, u.email, u.password, u.foto_profile, u.asal_sekolah 
                                    FROM tb_role r 
                                    JOIN tb_user u ON r.id_role = u.role_id 
                                    JOIN tb_jurusan ju ON ju.id_jurusan = u.jurusan_id
                                    JOIN tb_mapel m ON m.id_mapel = u.mapel_id
                                    JOIN tb_jenjang je ON je.id_jenjang = u.jenjang_id
                                    JOIN tb_kelas k ON k.id_kelas = u.kelas_id")->result_array();
    }
    public function getUserWhereJenjangAndKelas($jenjang, $kelas, $role)
    {
        return $this->db->get_where('tb_user', ['jenjang_id' => $jenjang, 'kelas_id' => $kelas, 'role_id' => $role])->result_array();
    }
    public function deleteUser($user)
    {
        $this->db->delete('tb_user', ['id_user' => $user]);
        return $this->db->affected_rows();
    }
    public function createUser($data)
    {
        $this->db->insert('tb_user', $data);
        return $this->db->affected_rows();
    }
    public  function updateUser($data, $user)
    {
        $this->db->update('tb_user', $data, ['id_user' => $user]);
        return $this->db->affected_rows();
    }
}

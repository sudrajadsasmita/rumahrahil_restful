<?php

class Role_model_api extends CI_Model
{
    public function getRole($role = null)
    {
        if ($role === null) {
            return $this->db->get('tb_role')->result_array();
        } else {
            return $this->db->get_where('tb_role', ['id_role' => $role])->result_array();
        }
    }
    public function getRoleWhereId()
    {
        return $this->db->query("SELECT*FROM tb_role WHERE id_role > 1")->result_array();
    }
}

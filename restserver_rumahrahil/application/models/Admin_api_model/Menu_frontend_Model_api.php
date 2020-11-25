<?php

class Menu_frontend_Model_api extends CI_Model
{
    public function getMenu($role = null)
    {
        if ($role === null) {
            return $this->db->get('tb_menu_frontend')->result_array();
        } else {
            return $this->db->get_where('tb_menu_frontend', ['role_id' => $role])->result_array();
        }
    }
}

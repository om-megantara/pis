<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    // ROLE SECTION
    public function getRole()
    {
        return $this->db->get('user_role')->result_array();
    }

    public function addRole($data)
    {
        $this->db->insert('user_role', $data);
    }

    public function deleteRole($id)
    {
        $this->db->delete('user_role', ['id' => $id]);
    }
    public function deleteUser($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }


    public function edit_user($id, $name, $username, $password, $role_id, $is_active)
    {
        $hasil = $this->db->query("UPDATE user SET name='$name', username='$username', password='$password', role_id='$role_id', is_active='$is_active' WHERE id='$id'");
        return $hasil;
    }


    public function editRole($id, $role)
    {
        $hasil = $this->db->query("UPDATE user_role SET role='$role' WHERE id='$id'");
        return $hasil;
    }


    function getUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function getUserByUsername($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }


}

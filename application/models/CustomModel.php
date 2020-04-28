<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CustomModel extends ci_model
{
    // function to extrcat records from database with where condition
    public function getAllfromWhere($condition = null, $table = null, $orderBy = null)
    {
        $this->db->order_by($orderBy, "asc");
        $result = $this->db->get_where($condition, $table)->result_array();
        return $this->db->affected_rows() ? $result : FALSE;
    }


    public function getAllUsers()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function insert($user)
    {
        $this->db->insert('leads', $user);
        return $this->db->insert_id();
    }

    public function getUser($id)
    {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }

    public function checkUser($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->row_array();
    }

    public function activate($data, $id)
    {
        $this->db->where('users.id', $id);
        return $this->db->update('users', $data);
    }
}


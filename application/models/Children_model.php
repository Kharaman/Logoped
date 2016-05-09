<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Children_model extends MY_model
{
    protected static $table = 'children';

    public function get_all()
    {
        $this->db->order_by('full_name');
        $query = $this->db->get(self::$table);
        return $query->result();
    }

    public function get_children_full_names()
    {
        $this->db->select('id, full_name');
        $query = $this->db->get(self::$table);
        return $query->result();
    }

    public function get_child_full_name($id)
    {
        $this->db->select('id, full_name');
        $query = $this->db->get_where(self::$table, ['id' => $id]);
        return $query->row();
    }
}
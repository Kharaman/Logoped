<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Children_model extends MY_model
{
    protected static $table = 'children';

    public function get_all()
    {
        $this->db->select('children.*, children_groups.name AS group_name');
        $this->db->join('children_groups', 'children_groups.id = children.group_number');
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

    public function search($q, $field = 'full_name')
    {
        $this->db->select('children.*, children_groups.name AS group_name');
        $this->db->join('children_groups', 'children_groups.id = children.group_number');
        $this->db->like($field, $q);
        $query = $this->db->get(self::$table);
        return $query->result();
    }

    public function get_photo($id)
    {
        $this->db->select('photo');
        $query = $this->db->get_where(self::$table, ['id' => $id]);
        return $query->row();
    }

    public function get_report_data()
    {
        $this->db->select('
            children.full_name,
            children.date,
            children.address,
            children.date_PMPC,
            children.protocol_number,
            children_groups.id AS group_number
        ');
        $this->db->join('children_groups', 'children_groups.id = children.group_number');
        $this->db->order_by('full_name');
        $query = $this->db->get(self::$table);
        return $query->result();
    }

   /* public function get_one($id)
    {
        $this->db->select('children.*, children_groups.name AS group_name');
        $this->db->join('children_groups', 'children_groups.id = children.group_number');
        $this->db->order_by('full_name');
        $query = $this->db->get_where(self::$table, ['id' => $id]);
        return $query->row();
    }*/
}
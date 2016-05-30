<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class MY_model extends CI_Model
{
    protected static $table;

    public function get_all()
    {
        $query = $this->db->get(static::$table);
        return $query->result();
    }

    public function get_one($id)
    {
        $query = $this->db->get_where(static::$table, ['id' => $id]);
        return $query->row();
    }

    public function edit($id, $data)
    {
        return $this->db->update(static::$table, $data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete(static::$table, ['id' => $id]);
    }

    public function create($data)
    {
        $this->db->insert(static::$table, $data);
        return $this->db->insert_id();
    }

    public function get_not_added_children()
    {
        $this->db->select('
            children.id AS id,
            children.full_name AS full_name,
            children.photo AS photo
        ');
        $this->db->join(static::$table, static::$table . '.children_id = children.id', 'left');
        $this->db->where(static::$table . '.id IS NULL');
        $query = $this->db->get('children');
        return $query->result();
    }
}
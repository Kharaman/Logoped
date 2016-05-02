<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Children_model extends CI_Model
{

    public function get_all()
    {
        $query = $this->db->get('children');
        return $query->result();
    }

    public function get_one($id)
    {
        $query = $this->db->get_where('children', ['id' => $id]);
        return $query->row();
    }

    public function edit($id, $data)
    {
        return $this->db->update('children', $data, ['id' => $id]);
    }

}
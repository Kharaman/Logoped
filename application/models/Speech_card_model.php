<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speech_card_model extends MY_model
{
    protected static $table = 'speech_card';

    public function get_added_children()
    {
        $this->db->select('
            speech_card.id AS id,
            speech_card.children_id AS children_id,
            children.full_name AS full_name
        ');
        $this->db->join(self::$table, 'speech_card.children_id = children.id');
        $query = $this->db->get('children');
        return $query->result();
    }

    public function get_one($id)
    {
        $this->db->select('
            children.full_name AS full_name,
            speech_card.*
        ');
        $this->db->join('children', 'children.id = speech_card.children_id', 'left');
        $this->db->where('speech_card.id', $id);
        $query = $this->db->get(self::$table);
        return $query->row();
    }
}
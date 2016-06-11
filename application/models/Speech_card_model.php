<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speech_card_model extends MY_model
{
    protected static $table = 'speech_card';

    public function get_added_children($limit = 10)
    {
        $page = $this->uri->segment(3, 0);
        $offset = ($page == 0) ? 0 : ($limit * $page) - $limit;

        $this->db->select('
            speech_card.id AS id,
            speech_card.children_id AS children_id,
            children.full_name AS full_name,
            children.photo AS children_photo
        ');
        $this->db->join(self::$table, 'speech_card.children_id = children.id');
        $this->db->limit($limit, $offset);
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

    /*public function ajax_search($q, $field = 'full_name')
    {
        $this->db->select('
            speech_card.id AS id,
            children.full_name AS full_name,
            children.photo AS children_photo
        ');
        $this->db->join(self::$table, 'speech_card.children_id = children.id');
        $this->db->order_by('children.full_name', 'asc');
        $this->db->like($field, $q);
        $query = $this->db->get('children');
        return $query->result();
    }*/

    public function search($q, $field = 'full_name')
    {
        $this->db->select('
            speech_card.id AS id,
            children.full_name AS full_name,
            children.photo AS children_photo
        ');
        $this->db->join(self::$table, 'speech_card.children_id = children.id');
        $this->db->order_by('children.full_name', 'asc');
        $this->db->like($field, $q);
        $query = $this->db->get('children');
        return $query->result();
    }
}
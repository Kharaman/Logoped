<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Individual_card_model extends MY_model
{
    protected static $table = 'individual_card';
    public function get_not_added_children()
    {
        $query = $this->db->query('
            SELECT
            children.id AS id,
            children.full_name,
            children.photo
            FROM children
            LEFT JOIN individual_card
            ON individual_card.children_id = children.id
            GROUP BY children.full_name
            HAVING COUNT(individual_card.is_beginning) < 2
        ');
        return $query->result();
    }

    public function check_period ($children_id, $is_beginning = '')
    {
        $this->db->select('is_beginning');
        $query = $this->db->get_where(self::$table, ['children_id' => $children_id]);
        return $query->row();
    }

    public function get_added_children($limit = 10)
    {
        $page = $this->uri->segment(3, 0);
        $offset = ($page == 0) ? 0 : ($limit * $page) - $limit;

        $this->db->select('
            individual_card.id AS id,
            individual_card.children_id AS children_id,
            children.full_name AS full_name,
            children.photo AS children_photo
        ');
        $this->db->join(self::$table, 'individual_card.children_id = children.id');
        $this->db->limit($limit, $offset);
        $this->db->group_by('children.full_name');
        $query = $this->db->get('children');
        return $query->result();
    }

    public function get_child_cards($children_id)
    {
        $this->db->order_by('is_beginning DESC');
        $query = $this->db->get_where(self::$table, ['children_id' => $children_id]);
        return $query->result();
    }

    public function get_one($id)
    {
        $this->db->select('
            individual_card.*,
            children.full_name AS full_name
        ');
        $this->db->join('children', 'children.id = individual_card.children_id', 'left');
        $query = $this->db->get_where(self::$table, ['individual_card.id' => $id]);
        return $query->row();
    }

    public function delete_all($children_id)
    {
        return $this->db->delete(self::$table, ['children_id' => $children_id]);
    }
}
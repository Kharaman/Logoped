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
            children.full_name
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
}
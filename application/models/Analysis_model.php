<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analysis_model extends MY_model
{
    protected static $table = 'result_analysis';

    public function get_added_children()
    {
        $query = $this->db->query('
            SELECT children.id, children.full_name, children.photo AS children_photo
            FROM children
            WHERE children.id IN (
                SELECT children_id
                FROM result_analysis
            )
        ');

        return $query->result();
    }

    public function get_children_analysis($id)
    {
        $this->db->order_by('date DESC');
        $query = $this->db->get_where(self::$table, ['children_id' => $id]);
        return $query->result();
    }

    public function delete_all($children_id)
    {
        return $this->db->delete(self::$table, ['children_id' => $children_id]);
    }



}


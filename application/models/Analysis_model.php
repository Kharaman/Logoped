<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analysis_model extends MY_model
{
    protected static $table = 'result_analysis';

    public function get_added_children($limit = 10)
    {
        $page = $this->uri->segment(3, 0);
        $offset = ($page == 0) ? 0 : ($limit * $page) - $limit;

        $query = $this->db->query('
            SELECT children.id, children.full_name, children.photo AS children_photo
            FROM children
            WHERE children.id IN (
                SELECT children_id
                FROM result_analysis
            )
            LIMIT ' . $offset . ', ' . $limit
        );

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

    public function count()
    {
        $query = $this->db->query('
            SELECT *
            FROM result_analysis
            GROUP BY children_id
        ');
        return count($query->result());
    }



}


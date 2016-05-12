<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes_schedule_model extends MY_model
{
    protected static $table = 'classes_schedule';

    public function get_all()
    {
        $this->db->select('
            classes_schedule.*,
            children.full_name AS full_name,
            children_groups.name AS group_name
        ');
        $this->db->join('children', 'children.id = classes_schedule.children_id', 'left');
        $this->db->join('children_groups', 'children_groups.id = classes_schedule.group_number', 'left');
        $this->db->order_by('time', 'ASC');
        $query = $this->db->get(self::$table);
        return $query->result();
    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_schedule_model extends MY_model
{
    protected static $table = 'work_schedule';

    public function get_days()
    {
        $this->db->select('day');
        $query = $this->db->get(self::$table);
        return $query->result();
    }

    public function get_all()
    {
        $this->db->order_by('day ASC');
        $query = $this->db->get(self::$table);
        return $query->result();
    }
}
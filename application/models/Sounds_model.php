<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sounds_model extends MY_model
{
    protected static $table = 'sounds';

    public function get_screen_sounds()
    {
        $this->db->select('id, name');
        $query = $this->db->get_where('sounds', ['is_screen' => 1]);
        return $query->result();
    }

    public function get_plan_sounds()
    {
        $this->db->select('id, name');
        $query = $this->db->get_where('sounds', ['is_screen' => 0]);
        return $query->result();
    }
}
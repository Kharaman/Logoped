<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generic
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function get_post($fields)
    {

        $fields = str_replace(' ', '', $fields);
        foreach (explode(',',$fields) as $field)
        {
            $result[$field] = $this->CI->input->post($field);
        }
        return $result;
    }
}
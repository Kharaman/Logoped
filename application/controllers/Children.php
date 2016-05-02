<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Children extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Children_model', 'children');
    }

    public function index()
    {
        $data['children'] = $this->children->get_all();
        $this->load->view('children/index', $data);
    }

    public function edit($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        if ($this->form_validation->run() == FALSE) {
            $data['child'] = $this->children->get_one($id);
            $this->load->view('children/edit', $data);
        }
        else
        {
            //$data =
            $this->children->edit($id, $data);
        }
    }
}
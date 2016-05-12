<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Children extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login');
            exit;
        }
    }

    public function index()
    {
        $data['children'] = $this->children->get_all();
        $this->load->view('children/index', $data);
    }

    public function edit($id)
    {
        if ($this->form_validation->run('children') == FALSE)
        {
            $data['child'] = $this->children->get_one($id);
            $this->load->view('children/edit', $data);
        }
        else
        {
            $data = $this->generic->get_post('full_name, date, address, date_PMPC, protocol_number, group_number');
            $this->children->edit($id, $data);
            header('Location: /children/');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->children->delete($id))
        {
            header('Location: /children/');
            exit;
        }
        else
        {
            // Exception
            echo 'error';
        }
    }

    public function create()
    {
        if ($this->form_validation->run('children') == FALSE)
        {
            $this->load->view('children/add');
        }
        else
        {
            $data = $this->generic->get_post('full_name, date, address, date_PMPC, protocol_number, group_number');
            if ($id = $this->children->create($data))
            {
                header('Location: /children/edit/' . $id);
                exit;
            }
        }
    }
}
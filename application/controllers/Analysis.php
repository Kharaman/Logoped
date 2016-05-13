<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analysis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            exit;
        }
        $this->load->model('analysis_model', 'analysis');
    }

    public function index()
    {
        $data['children'] = $this->analysis->get_added_children();
        $this->load->view('analysis/index', $data);
    }

    public function view($children_id)
    {
        $data['analysis'] = $this->analysis->get_children_analysis($children_id);
        $data['child'] = $this->children->get_child_full_name($children_id);
        $this->load->view('analysis/view', $data);
    }

    public function create()
    {
        if ($this->form_validation->run('analysis') == FALSE)
        {
            $data['children'] = $this->children->get_children_full_names();
            $this->load->view('analysis/add', $data);
        }
        else
        {
            $data = $this->generic->get_post('children_id, description');
            $data['date'] = date('Y-m-h');
            $children_id = $data['children_id'];
            if ($this->analysis->create($data))
            {
                redirect('/analysis/view/' . $children_id);
                exit;
            }
        }
    }

    public function edit($id)
    {
        if ($this->form_validation->run('analysis') == FALSE)
        {
            $data['analysis'] = $this->analysis->get_one($id);
            $this->load->view('analysis/edit', $data);
        }
        else
        {
            $data = $this->generic->get_post('description');
            $children_id = $this->generic->get_post('children_id');
            if ($this->analysis->edit($id, $data))
            {
                header('Location: /analysis/view/' . $children_id['children_id']);
                exit;
            }
        }
    }

    public function delete($children_id, $id)
    {
        if ($this->analysis->delete($id))
        {
            redirect('/analysis/view/' . $children_id);
            exit;
        }
    }

    public function delete_all($children_id)
    {
        if ($this->analysis->delete_all($children_id))
        {
            redirect('/analysis');
            exit;
        }
    }


}
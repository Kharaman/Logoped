<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Individual_plan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('individual_plan_model', 'plan');
        $this->load->model('sounds_model', 'sounds');
    }

    public function index()
    {
        $data['plans'] = $this->plan->get_added_children();
        $this->load->view('individual_plan/index', $data);
    }

    public function create()
    {
        if ($this->form_validation->run('individual_plan') == FALSE)
        {
            $data['children'] = $this->plan->get_not_added_children();
            $data['sounds'] = $this->sounds->get_plan_sounds();
            $this->load->view('individual_plan/add', $data);
        }
        else
        {
            $sounds = $this->plan->prepare_addition($this->input->post());
            $insert_id = $this->plan->create($this->plan->plan_data);

            foreach ($sounds as &$item) {
                $item['individual_plan_id'] = $insert_id;
            }

            if ($this->plan->insert_sounds($sounds))
            {
                header('Location: /');
                exit;
            }
        }
    }

    public function edit($id)
    {
        if ($this->form_validation->run('individual_plan') == FALSE)
        {
            $tmp = $this->plan->get_one($id);
            $data['plan'] = $this->plan->convert_data_row($tmp);
            $data['sounds'] = $this->sounds->get_plan_sounds();
            $this->load->view('individual_plan/edit', $data);
        }
        else
        {
            $sounds = $this->plan->prepare_addition($this->input->post());
            $this->plan->edit($this->plan->plan_id, $this->plan->plan_data);

            if ($this->plan->edit_sounds($this->plan->plan_id, $sounds))
            {
                echo 'success!';die;
                header('Location: /');
                exit;
            }
        }
    }

    public function delete($id)
    {
        if ($this->plan->delete($id))
        {
            header('Location: /individual_plan/');
            exit;
        }
    }

}
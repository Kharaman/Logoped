<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes_schedule extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('classes_schedule_model', 'classes_schedule');
        $this->load->model('groups_model', 'groups');
    }

    public function index()
    {
        $this->load->view('classes_schedule/index');
    }


    public function create()
    {
        if ($this->form_validation->run('classes_schedule') == FALSE)
        {
            $data['children'] = $this->children->get_children_full_names();
            $data['groups'] = $this->groups->get_all();
            $this->load->view('classes_schedule/add', $data);
        }
        else
        {
            if ($this->input->post('children_id'))
            {
                $data = $this->generic->get_post('day, time, children_id');
            }
            else
            {
                $data = $this->generic->get_post('day, time, group_number');
            }
            if ($this->classes_schedule->create($data))
            {
                header('Location: /classes_schedule');
                exit;
            }



        }


//        if ($this->form_validation->run() == FALSE)
//        {
//            $this->load->view('classes_schedule/add');
//        }
//        else
//        {
//            $sounds = $this->plan->prepare_addition($this->input->post());
//            $insert_id = $this->plan->create($this->plan->plan_data);
//
//            foreach ($sounds as &$item) {
//                $item['individual_plan_id'] = $insert_id;
//            }
//
//            if ($this->plan->insert_sounds($sounds))
//            {
//                header('Location: /');
//                exit;
//            }
//        }
    }
}